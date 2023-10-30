<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create note</title>
</head>
<body>
    <form method="POST" action="{{ route('create.note') }}">
        @csrf
        <label for="note_title">Note Title:</label>
        <input type="text" id="note_title" name="note_title" required><br><br>

        <label for="note_content">Note Content:</label>
        <textarea id="note_content" name="note_content" required></textarea><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
