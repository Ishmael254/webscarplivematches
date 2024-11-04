<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Symfony\Component\DomCrawler\Crawler;
use App\Models\Stream;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;
class ScraperController extends Controller
{

       public function welcome() {
        $matches = Stream::where('start_time', '!=', 'Time not found')->orderby('id','DESC')->get();
        $matchescount = Stream::where('start_time', '!=', 'Time not found')->count();

        return view('welcome', ['matches' => $matches], ['matchescount' => $matchescount]);
    }

   

    public function index1()
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





        // Fetch matches from the database to pass Eloquent models to the view
        $matches = Stream::where('start_time', '!=', 'Time not found')->orderby('id','DESC')->get();

        return view('matches.index', ['matches' => $matches]);
    } catch (RequestException $e) {
        Log::error('Request failed: ' . $e->getMessage());
        dd('Error fetching the URL.');
    }
}



public function index()
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
        $matches = Stream::where('start_time', '!=', 'Time not found')->orderby('id', 'DESC')->get();

        return view('matches.index', ['matches' => $matches]);
    } catch (RequestException $e) {
        Log::error('Request failed: ' . $e->getMessage());
        dd('Error fetching the URL.');
    }
}

    public function show($id)
    {
        try {
            $match = Stream::findOrFail($id);

            $client = new Client();
            $watchLinks = $this->getWatchLinks($client, $match->link);

            return view('matches.show', [
                'match' => $match,
                'watch_links' => $watchLinks
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching match details: ' . $e->getMessage());
            abort(404);
        }
    }

    private function getWatchLinks($client, $matchLink)
    {
        try {
            $response = $client->request('GET', $matchLink);
            $html = (string) $response->getBody();
            $crawler = new Crawler($html);

            return $crawler->filter('div.col-md-12.data-row a.nocolor')->each(function (Crawler $node) {
                return $node->attr('href');
            });
        } catch (RequestException $e) {
            Log::error('Error fetching watch links: ' . $e->getMessage());
            return [];
        }
    }





//epl table


public function eplTable()
    {
        $client = new Client();
        $url = 'https://www.eurosport.com/football/premier-league/standings.shtml';

        // Fetch the content of the page
        $response = $client->request('GET', $url);

        // Initialize the Crawler with the HTML content
        $crawler = new Crawler((string) $response->getBody());

        // Check if the HTML content is loaded correctly
        if (strpos((string) $response->getBody(), '<table') === false) {
            return abort(404, 'Table not found on the page.');
        }

        // Scrape the table data
        $standings = $crawler->filter('table[data-testid="table"] tbody tr')->each(function ($node) {
            // Extract text from table cells based on their CSS class
            return [
                'position' => $node->filter('td[data-testid="table-cell-value"]')->text(),
                'team' => $node->filter('td[data-testid="table-cell-team"]')->text(),
                'played' => $node->filter('td:nth-child(6)')->text(),
                'won' => $node->filter('td:nth-child(7)')->text(),
                'drawn' => $node->filter('td:nth-child(8)')->text(),
                'lost' => $node->filter('td:nth-child(9)')->text(),
                'gf' => $node->filter('td:nth-child(10)')->text(),
                'ga' => $node->filter('td:nth-child(11)')->text(),
                'gd' => $node->filter('td:nth-child(12)')->text(),
                'points' => $node->filter('td:nth-child(13)')->text(), // Adjust index if needed
            ];
        });

        // Return the view with the standings data
        return view('tables.epl', compact('standings'));
    }


    //get iframe for watch blade

    public function watchgame(Request $request)
    {
        $link = $request->query('link');

        $client = new Client();
        
        try {
            $response = $client->request('GET', $link);
            $html = (string) $response->getBody();
            $crawler = new Crawler($html);
    
            $iframe = $crawler->filter('iframe')->first();
    
            if ($iframe->count() > 0) {
                $iframeSrc = $iframe->attr('src');
            } else {
                $iframeSrc = null;
            }
    
            return view('matches.watch', ['iframeSrc' => $iframeSrc]);
        } catch (\Exception $e) {
            Log::error('Failed to fetch the page: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to fetch the page.'], 500);
        }
    }


//livescpore


   

}