<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>the notes</title>
</head>
<body>
    <form method="POST" action="{{ route('notes.update', ['note'=>$singleNote->id]) }}">
        @csrf
        @method('PUT')
        <label for="noteTitle">Note Title:</label>
        <input type="text" id="noteTitle" name="noteTitle" value="{{$singleNote->title}}" required><br><br>

        <label for="notecontent">Note Content:</label>
        <textarea id="noteContent" name="noteContent"  required>{{$singleNote->note}}</textarea><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
