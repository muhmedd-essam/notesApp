<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create note</title>
</head>
<body>
    <form method="POST" action="{{ route('notes.store') }}">
        @csrf
        <label for="noteTitle">Note Title:</label>
        <input type="text" id="noteTitle" name="noteTitle" required><br><br>

        <label for="notecontent">Note Content:</label>
        <textarea id="noteContent" name="noteContent" required></textarea><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
