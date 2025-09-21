<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>AICS Assistance Report</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        h2 { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background: #f0f0f0; }
    </style>
</head>
<body>
    <h2>
        AICS Assistance Report
        @if($dateFrom && $dateTo)
            ({{ \Carbon\Carbon::parse($dateFrom)->format('M d, Y') }} - {{ \Carbon\Carbon::parse($dateTo)->format('M d, Y') }})
        @elseif($dateFrom)
            (From {{ \Carbon\Carbon::parse($dateFrom)->format('M d, Y') }})
        @elseif($dateTo)
            (Until {{ \Carbon\Carbon::parse($dateTo)->format('M d, Y') }})
        @endif
    </h2>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Barangay</th>
                <th>Purpose</th>
                <th>Assistance Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($records as $record)
                <tr>
                    <td>{{ $record->first_name }} {{ $record->last_name }}</td>
                    <td>{{ $record->barangay }}</td>
                    <td>{{ $record->purpose }}</td>
                    <td>{{ \Carbon\Carbon::parse($record->assistance_date)->format('M d, Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align:center;">No records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
