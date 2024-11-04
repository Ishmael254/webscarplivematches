<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Scores - GoalTract</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 2em;
            margin-bottom: 0.5em;
        }
        .score {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
            margin-bottom: 10px;
        }
        .team {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Live Scores</h1>
        @if(!empty($scores))
            @foreach($scores as $score)
                <div class="score">
                    <span class="team">{{ $score['team1'] }}</span> vs <span class="team">{{ $score['team2'] }}</span>
                    <br>
                    Score: {{ $score['score'] }}
                </div>
            @endforeach
        @else
            <p>No live scores available at the moment.</p>
        @endif
    </div>
</body>
</html>
