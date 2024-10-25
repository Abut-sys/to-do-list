<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks List PDF</title>
    <style>
        /* Embed the Lato font */
        @font-face {
            font-family: 'Lato';
            font-weight: 400;
            src: url('{{ public_path('fonts/Lato-Regular.ttf') }}') format('truetype');
        }

        @font-face {
            font-family: 'Lato';
            font-weight: 700;
            src: url('{{ public_path('fonts/Lato-Bold.ttf') }}') format('truetype');
        }

        body {
            font-family: 'Lato', sans-serif;
            margin: 20px;
            color: #333;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #000000;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #e0e0e0;
        }

        th {
            background-color: #007bff;
            color: white;
            font-weight: 700;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .badge {
            padding: 5px 10px;
            color: white;
            border-radius: 3px;
            font-size: 0.9em;
        }

        .bg-danger {
            background-color: #dc3545;
        }

        .bg-warning {
            background-color: #ffc107;
        }

        .bg-success {
            background-color: #28a745;
        }

        .bg-secondary {
            background-color: #6c757d;
        }
    </style>
</head>

<body>
    <h1>Tasks List</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Status</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $item => $task)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $task->list }}</td>
                    <td>
                        @php
                            $statusClasses = [
                                'Pending' => 'bg-danger',
                                'In Progress' => 'bg-warning',
                                'Completed' => 'bg-success',
                            ];
                            $statusClass = $statusClasses[$task->status] ?? 'bg-secondary';
                        @endphp
                        <span class="badge {{ $statusClass }}">{{ $task->status }}</span>
                    </td>
                    <td>{{ $task->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
