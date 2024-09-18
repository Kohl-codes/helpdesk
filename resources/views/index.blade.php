<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Call List</title>
</head>
<body>
    <h2>All Helpdesk Calls</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Caller</th>
                <th>Operator</th>
                <th>Equipment Serial</th>
                <th>Description</th>
                <th>Call Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach($calls as $call)
                <tr>
                    <td>{{ $call->id }}</td>
                    <td>{{ $call->caller->name }}</td>
                    <td>{{ $call->operator->name }}</td>
                    <td>{{ $call->equipment->serial_number }}</td>
                    <td>{{ $call->description }}</td>
                    <td>{{ $call->call_time }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

