<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoalTract Today's Matches</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
         img {
            max-width: 100%;
            height: auto;
            display: block; /* Remove any inline spacing */
            margin: 0 auto; /* Center the image horizontally */
        }
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
        }
        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 2em;
            margin-bottom: 0.5em;
            color: #333;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
        @media (max-width: 600px) {
            table {
                font-size: 0.9em;
            }
            th, td {
                padding: 8px;
            }
        }
        .h3-container a {
            display: inline-block;
            margin-right: 15px;
        }
        .h3-container a:last-child {
            margin-right: 0;
        }
        .h3-container h3 {
            display: inline;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <center> <a href="{{route('match')}}"><img src="/soccer.png" alt="logo"></a>      
        </center>
        <h1>GoalTract Today's Matches</h1>
        <hr>
        <div class="h3-container">
            <a href="{{route('tables.epl')}}" target="_blank"><h3>| EPL Table Standings</h3></a>
            <a href=""><h3>| EPL News</h3></a> 
            <a href="{{route('login')}}" target="_blank"><h3>| Login </h3></a>

        </div>
        <hr>

        <br>
        @if(empty($matches))
            <p>No matches found.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Team 1</th>
                        <th>Team 2</th>
                        <th>Start Time</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($matches as $match)
                        <tr>
                            <td>{{ $match['team_1'] }}</td>
                            <td>{{ $match['team_2'] }}</td>
                            <td>
                                @if ($match['start_time'] === 'Time not found')
                                    Match Ended
                                @else
                                    {{ $match['start_time'] }} EAT
                                @endif
                            </td>
                            <td>
                                <a target="_blank" href="{{ route('matches.show', ['id' => $match['id']]) }}" >View Watch Links</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>
