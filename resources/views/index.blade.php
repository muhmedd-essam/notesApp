<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>the notes</title>
</head>
<body>
    <table>
        @csrf


    <tr>
        <th>title</th>
        <th>the note</th>
    </tr>
    @foreach($notes as $note)
    <tr>
        <td>{{$note->title}}</td>
        <td>{{$note->note}}</td>
        <td><a href="{{route('notes.show', ['note'=>$note->id])}}" name="{{$note->id}}" value="{{$note->id}}">view</a></td>
        <td><a href="{{route('notes.edit', ['note'=>$note->id])}}" name="{{$note->id}}" value="{{$note->id}}">update</a></td>
        <td>
            <form action="{{route('notes.destroy', ['note'=>$note->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" >delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
</body>
</html>
