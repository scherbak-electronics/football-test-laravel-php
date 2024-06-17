<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Matches</title>
</head>
<body>
<h1>Upcoming Matches</h1>
<ul>
    @foreach($matches as $match)
        <li>
            <div>
                <strong>{{ $match['teams']['home']['name'] }} vs {{ $match['teams']['away']['name'] }}</strong>
                <p>{{ date('d/m/Y H:i', strtotime($match['fixture']['date'])) }}</p>
                <img src="{{ $match['teams']['home']['logo'] }}" alt="Home Team Logo">
                <img src="{{ $match['teams']['away']['logo'] }}" alt="Away Team Logo">
                <p>Betting Odds: 1 - {{ $match['odds'][0] }}, X - {{ $match['odds'][1] }}, 2 - {{ $match['odds'][2] }}</p>
            </div>
        </li>
    @endforeach
</ul>
</body>
</html>
