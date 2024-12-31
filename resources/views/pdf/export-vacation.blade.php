<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> <!-- Tailwind CSS CDN -->
    <style>
        @media print {
            body {
                -webkit-print-color-adjust: exact; /* Ensures colors are printed correctly */
                font-family: Arial, sans-serif; /* Set a clean font for printing */
            }
            h1 {
                text-align: center; /* Center the title */
                margin-bottom: 20px; /* Space below the title */
                font-size: 2.5rem; /* Increase font size for the title */
            }
            table {
                width: 100%; /* Full width for the table */
                border-collapse: collapse; /* Collapse borders */
                margin-bottom: 20px; /* Space below the table */
            }
            th, td {
                border: 1px solid #ddd; /* Add borders for table cells */
                padding: 12px; /* Add padding for table cells */
                text-align: left; /* Align text to the left */
            }
            th {
                background-color: #FFB790; /* Light orange background for headers */
                color: #333; /* Darker text for headers */
                font-weight: bold; /* Bold text for headers */
            }
            tr:nth-child(even) {
                background-color: #f9f9f9; /* Zebra striping for rows */
            }
            .footer {
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
                text-align: center;
                font-size: 0.8rem; /* Smaller font for footer */
                color: #777; /* Gray color for footer */
            }
        }
    </style>
</head>
<body class="bg-gray-50" style="text-align: center; margin-bottom: 20px;">
    <div class="flex items-center justify-center mb-4">
        <h1 class="text-3xl font-extrabold text-orange-600">Vacation</h1>
    </div>

    @if(session('success'))
    <div class="bg-green-500 text-white p-4 rounded-md mb-4">
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Employee Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Reason</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vacations as $vacation)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $vacation->employee->name }}</td>
                        <td>{{ $vacation->start_date }}</td>
                        <td>{{ $vacation->end_date }}</td>
                        <td>{{ $vacation->reason }}</td>
                        <td>{{ $vacation->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
