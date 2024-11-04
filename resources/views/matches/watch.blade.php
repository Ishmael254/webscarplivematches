<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch Match - GoalTract</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta http-equiv="Content-Security-Policy" content="frame-ancestors 'self';">

    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .main-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin: 20px auto;
            padding: 20px;
            max-width: 1200px; /* Allows space for sidebars */
        }
        .container {
            width: 800px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        iframe {
            width: 100%;
            height: 450px;
        }
        .sidebar {
            width: 160px;
            background: #fff;
            padding: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }
        .ad {
            background-color: #eaeaea;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            height: 300px; /* Adjust as needed */
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="sidebar">
        <img src="/ads/ads.png" alt="Ad 1">
        <!-- <div class="ad">Ad 2</div> -->
        </div>

        <div class="container">
          <center>  <h1>Watch the Match</h1></center>
            <br>
            <center>                <img src="/ads/bannerads.png" alt="Header Ad">
            </center><br>
            <iframe frameborder="0" src="{{ $iframeSrc }}" allowfullscreen="" scrolling="no" allowtransparency=""></iframe>
        </div>

        <div class="sidebar">
        <img src="/ads/ads.png" alt="Ad 1">
        <!-- <div class="ad">Ad 4</div> -->
        </div>
    </div>
</body>
</html>
