<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Details - GoalTract</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta http-equiv="Content-Security-Policy" content="frame-ancestors 'self';">

    <style>
        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
        }
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            display: flex;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }
        .content {
            flex: 1;
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header-ad {
            text-align: center;
            margin-bottom: 20px;
        }
        .sidebar {
            width: 150px;
            margin: 0 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .sidebar img {
            margin-bottom: 10px;
        }
        h1 {
            font-size: 2em;
            margin-bottom: 0.5em;
            color: #333;
        }
        h2 {
            font-size: 1.5em;
            margin-bottom: 1em;
            color: #555;
        }
        h3 {
            font-size: 1.2em;
            margin-bottom: 1em;
            color: #666;
        }
        p {
            margin-bottom: 1em;
            color: #333;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .watch-links {
            display: flex;
            flex-direction: column;
        }
        .watch-links a {
            background: #007bff;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            text-align: center;
            display: block;
        }
        .watch-links a:hover {
            background: #0056b3;
        }
        @media (max-width: 800px) {
            .container {
                flex-direction: column;
                align-items: center;
            }
            .sidebar {
                width: 100%;
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h3>Advertisement</h3>
            <img src="/ads/ads.png" alt="Ad 1">
            <p>Ad content goes here</p>
        </div>
        
        <div class="content">
            <!-- Header Ad -->
            <div class="header-ad">
                <h3>Advertisement</h3>

                <img src="/ads/bannerads.png" alt="Header Ad">
            </div>

            <center> 
                <a href="{{ route('match') }}">
                    <img src="/soccer.png" alt="logo">
                </a>      
            </center>
            <hr>

            <!-- Rest of your content here -->
            
                <center><h1>Match Details</h1></center>
                  <!-- Header Ad -->
            <div class="header-ad">
                <h3>Advertisement</h3>

                <img src="/ads/bannerads.png" alt="Header Ad">
            </div>

            <center>
            <h2>You are watching: {{ $match->team_1 }} vs {{ $match->team_2 }}</h2>
            <p><strong>Start Time:</strong> {{ $match->start_time }}</p>
            <h3>Select a stable Watch Link</h3>
            </center>

            <script>
        function clickIframe() {
            var iframe = document.querySelector("iframe");
            if (iframe) {
                try {
                    // Attempt to access the iframe's content window
                    var iframeWindow = iframe.contentWindow;
                    if (iframeWindow) {
                        // Create and dispatch the click event on the iframe document
                        var clickEvent = new MouseEvent("click", {
                            view: iframeWindow,
                            bubbles: true,
                            cancelable: true
                        });
                        iframe.dispatchEvent(clickEvent);
                    }
                } catch (e) {
                    console.log("Cannot interact with the iframe due to cross-origin restrictions.");
                }
            }
        }

        function checkIframeAndClick() {
            var iframe = document.querySelector("iframe");
            if (iframe) {
                // Use requestAnimationFrame to repeatedly check the iframe's readiness
                requestAnimationFrame(checkIframeAndClick);
                // Trigger the click if the iframe is loaded
                clickIframe();
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            // Start the iframe check loop as soon as the DOM is loaded
            requestAnimationFrame(checkIframeAndClick);
        });
    </script>
            <iframe frameborder="0" width="750" height="450" src="https://decmelfot.xyz/wp1/4.php" allowfullscreen="" scrolling="no" allowtransparency=""></iframe>

            <br><br>
            <div class="watch-links">
                @if(!empty($watch_links))
                    @foreach($watch_links as $index => $watchLink)
                        @if(strpos($watchLink, 'decmelfot') !== false)
                            <a href="{{ route('watchgame', ['link' => $watchLink]) }}" target="_blank">Link {{ $loop->iteration }} : Watch here</a><br>
                        @else
                            <a href="{{ $watchLink }}" target="_blank">Link {{ $loop->iteration }} : Watch here</a><br>
                        @endif
                    @endforeach
                @else
                    <p>No links available at the moment, check again later</p>
                @endif
            </div>
        </div>

        <div class="sidebar">
            <h3>Advertisement</h3>
            <img src="/ads/ads.png" alt="Ad 2">
            <p>Ad content goes here</p>
        </div>
    </div>
</body>
</html>
