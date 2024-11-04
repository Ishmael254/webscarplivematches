<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use App\Models\Stream;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;

class ScrapeMatches extends Command
{
    protected $signature = 'matches:scrape';
    protected $description = 'Scrape matches and update the database';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle1()
    {
        try {
            $client = new Client();
            $response = $client->request('GET', 'https://totalsportek.pro/date/today30/');
            $html = (string) $response->getBody();

            $crawler = new Crawler($html);

            $matches = $crawler->filter('a.text-decoration-none.nav-link2')->each(function (Crawler $node) {
                $link = $node->attr('href');

                $teams = $node->filter('div.row.my-auto img')->each(function (Crawler $teamNode) {
                    return $teamNode->attr('alt');
                });

                $timeNode = $node->filter('div.col-3.fs-8.px-2.text-center.my-auto span');
                $start_time = $timeNode->count() ? $timeNode->first()->text() : 'Time not found';

                if (count($teams) < 2) {
                    return null;
                }

                return [
                    'team_1' => $teams[0],
                    'team_2' => $teams[1],
                    'link' => $link,
                    'start_time' => $start_time,
                ];
            });

            $matches = array_filter($matches);

            foreach ($matches as $match) {
                Stream::updateOrCreate(
                    ['link' => $match['link']],
                    [
                        'team_1' => $match['team_1'],
                        'team_2' => $match['team_2'],
                        'start_time' => $match['start_time'],
                    ]
                );
            }

            $this->info('Matches have been scraped and updated.');
        } catch (\Exception $e) {
            Log::error('Request failed: ' . $e->getMessage());
            $this->error('Error fetching the URL.');
        }
    }

    public function handle()
    {
    try {
        $client = new Client();
        $response = $client->request('GET', 'https://totalsportek.pro/date/today30/');
        $html = (string) $response->getBody();

        $crawler = new Crawler($html);

        $matches = $crawler->filter('a.text-decoration-none.nav-link2')->each(function (Crawler $node) use ($client) {
            $link = $node->attr('href');

            $teams = $node->filter('div.row.my-auto img')->each(function (Crawler $teamNode) {
                return $teamNode->attr('alt');
            });

            $timeNode = $node->filter('div.col-3.fs-8.px-2.text-center.my-auto span');
            $relativeTime = $timeNode->count() ? $timeNode->first()->text() : 'Time not found';

            // Convert relative time to absolute time
            $start_time = 'Time not found';
            if ($relativeTime !== 'Time not found') {
                try {
                    // Example relative time: "8 hours 40 minutes from now"
                    $now = Carbon::now();
                    
                    // Parse the time string into hours and minutes
                    if (preg_match('/(\d+) hours? and (\d+) minutes?/', $relativeTime, $matches)) {
                        $hours = (int) $matches[1];
                        $minutes = (int) $matches[2];
                        $start_time = $now->copy()->addHours($hours)->addMinutes($minutes)->format('h:i A');
                    } elseif (preg_match('/(\d+) hours?/', $relativeTime, $matches)) {
                        $hours = (int) $matches[1];
                        $start_time = $now->copy()->addHours($hours)->format('h:i A');
                    } elseif (preg_match('/(\d+) minutes?/', $relativeTime, $matches)) {
                        $minutes = (int) $matches[1];
                        $start_time = $now->copy()->addMinutes($minutes)->format('h:i A');
                    }
                } catch (\Exception $e) {
                    $start_time = 'Time not found';
                }
            }

            if (count($teams) < 2) {
                return null;
            }

            return [
                'team_1' => $teams[0],
                'team_2' => $teams[1],
                'link' => $link,
                'start_time' => $start_time,
            ];
        });

        $matches = array_filter($matches);

        foreach ($matches as $match) {
            Stream::updateOrCreate(
                ['link' => $match['link']],
                [
                    'team_1' => $match['team_1'],
                    'team_2' => $match['team_2'],
                    'start_time' => $match['start_time'],
                ]
            );
        }

        // Fetch matches from the database to pass Eloquent models to the view
        // $matches = Stream::where('start_time', '!=', 'Time not found')->orderby('id', 'DESC')->get();

        $this->info('Matches have been scraped and updated.');
    } catch (\Exception $e) {
        Log::error('Request failed: ' . $e->getMessage());
        $this->error('Error fetching the URL.');
    }
}

}
