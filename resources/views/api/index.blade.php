<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Population Data in United States</title>
</head>
<body>
    @include('layouts.header')
    <h1>Population Data in United States</h1>

    <!-- Debugging: Print API response -->
    {{-- <pre>{{ print_r($data, true) }}</pre> --}}

    <!-- Population Data Table -->
    <table id="populationTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Year</th>
                <th>Nation</th>
                <th>Population</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($data) && is_array($data))
                @foreach ($data as $index => $record)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $record['Year'] ?? 'N/A' }}</td>
                        <td>{{ $record['Nation'] ?? 'N/A' }}</td>
                        <td>{{ isset($record['Population']) ? number_format((int) $record['Population']) : 'N/A' }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">No data available</td>
                </tr>
            @endif
        </tbody>
    </table>
    
    @include('layouts.footer')

    <!-- Include DataTables -->
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#populationTable').DataTable();
        });
    </script>

</body>
</html>