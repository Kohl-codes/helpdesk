<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log New Call</title>
</head>
<body>
    <h2>Log New Call</h2>
    <form action="{{ route('calls.store') }}" method="POST">
        @csrf
        <label for="caller">Caller Name</label>
        <input type="text" name="caller" id="caller" required>

        <label for="operator">Operator Name</label>
        <input type="text" name="operator" id="operator" required>

        <label for="serial_number">Equipment Serial Number</label>
        <input type="text" name="serial_number" id="serial_number" required>

        <label for="description">Problem Description</label>
        <textarea name="description" id="description" required></textarea>

        <button type="submit">Log Call</button>
    </form>
</body>
</html>
