<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WatchController extends Controller
{
    public function watch($id)
    {
        // Fetch the watch link from the database or other source
        $watchLink = $this->getWatchLink($id); // Implement this method based on your data source

        return view('matches.watch', ['watchLink' => $watchLink]);
    }

    private function getWatchLink($id)
    {
        // Example placeholder function
        // Fetch the actual watch link from the database or other source
        return "https://newsarena24h.com/soccer/stream2/"; // Example link
    }
}

