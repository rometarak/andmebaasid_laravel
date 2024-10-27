<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Statistics</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Weather Statistics</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Statistic</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Total Days</td>
                    <td>{{ $totalDays }}</td>
                </tr>
                <tr>
                    <td>Average Temperature</td>
                    <td>{{ $avgTemp }} °C</td>
                </tr>
                <tr>
                    <td>Total Precipitation</td>
                    <td>{{ $totalPrecipitation }} mm</td>
                </tr>
                <tr>
                    <td>Maximum Temperature</td>
                    <td>{{ $maxTemp }} °C</td>
                </tr>
                <tr>
                    <td>Minimum Temperature</td>
                    <td>{{ $minTemp }} °C</td>
                </tr>
                <tr>
                    <td>Average Air Pressure</td>
                    <td>{{ $avgPressure }} hPa</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ url('/weather') }}" class="btn btn-primary">View data</a>
    </div>
</body>
</html>
