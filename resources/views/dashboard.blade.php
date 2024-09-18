<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2>Helpdesk Dashboard</h2>

    <a href="{{ route('calls.create') }}">Log New Call</a> |
    <a href="{{ route('problems.assign') }}">Assign Problem to Specialist</a> |
    <a href="{{ route('calls.index') }}">View All Calls</a>

    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif
</body>
</html>
