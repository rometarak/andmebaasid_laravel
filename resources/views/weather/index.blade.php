<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viljandi Weather Data</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container my-5">
        <h1 class="text-center mb-4">Viljandi Weather Data</h1>
        <a href="{{ url('/statistics') }}" class="btn btn-primary">View Statistics</a>

        <table class="table table-bordered table-hover table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Date</th>
                    <th>Avg Temperature (°C)</th>
                    <th>Min Temperature (°C)</th>
                    <th>Max Temperature (°C)</th>
                    <th>Precipitation (mm)</th>
                    <th>Snow (mm)</th>
                    <th>Wind Direction</th>
                    <th>Wind Speed (m/s)</th>
                    <th>Peak Gust (m/s)</th>
                    <th>Air Pressure (hPa)</th>
                    <th>Sunlight Duration (hrs)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($weatherData as $data)
                    <tr>
                        <td>{{ $data->date }}</td>
                        <td>{{ $data->temperature->tavg ?? 'N/A' }}</td>
                        <td>{{ $data->temperature->tmin ?? 'N/A' }}</td>
                        <td>{{ $data->temperature->tmax ?? 'N/A' }}</td>
                        <td>{{ $data->precipitation->prcp ?? 'N/A' }}</td>
                        <td>{{ $data->precipitation->snow ?? 'N/A' }}</td>
                        <td>{{ $data->wind->wdir ?? 'N/A' }}</td>
                        <td>{{ $data->wind->wspd ?? 'N/A' }}</td>
                        <td>{{ $data->wind->wpgt ?? 'N/A' }}</td>
                        <td>{{ $data->pressure->pres ?? 'N/A' }}</td>
                        <td>{{ $data->sunlight->tsun ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-4">
            {{ $weatherData->links('pagination::bootstrap-5') }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
