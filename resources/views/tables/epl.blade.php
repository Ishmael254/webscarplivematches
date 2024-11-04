<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EPL Standings</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
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
            white-space: nowrap;
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
        /* Responsive styles */
        @media (max-width: 600px) {
            table {
                font-size: 0.9em;
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }
            th, td {
                padding: 8px;
                text-align: center;
            }
            h1 {
                font-size: 1.5em;
            }
        }
    </style>
</head>
<body>
    <style>
         img {
            max-width: 100%;
            height: auto;
            display: block; /* Remove any inline spacing */
            margin: 0 auto; /* Center the image horizontally */
        }
         a {
            color: blue;
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
    </style>
    <div class="container">
    <center> <a href="{{route('match')}}"><img src="/soccer.png" alt="logo"></a>      
    </center>
        <a href="" ><h1 style="color:blue">EPL Standings</h1></a>
        <hr>
        <center>
        <a href="{{route('match')}}">Go Back Home</a> &nbsp;&nbsp;&nbsp;<a href="">Match Details</a> &nbsp;&nbsp;&nbsp;  <a href="{{route('tables.epl')}}" target="_blank"> EPL Table Standings</a>

        </center><hr>
        <table>
            <thead>
                <tr>
                    <th>Position</th>
                    <th>Team</th>
                    <th>Played</th>
                    <th>Won</th>
                    <th>Drawn</th>
                    <th>Lost</th>
                    <th>GF</th>
                    <th>GA</th>
                    <th>GD</th>
                    <th>Points</th>
                </tr>
            </thead>
            <tbody>
                @foreach($standings as $standing)
                    <tr>
                        <td>{{ $standing['position'] }}</td>
                        <td>{{ $standing['team'] }}</td>
                        <td>{{ $standing['played'] }}</td>
                        <td>{{ $standing['won'] }}</td>
                        <td>{{ $standing['drawn'] }}</td>
                        <td>{{ $standing['lost'] }}</td>
                        <td>{{ $standing['gf'] }}</td>
                        <td>{{ $standing['ga'] }}</td>
                        <td>{{ $standing['gd'] }}</td>
                        <td>{{ $standing['points'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
