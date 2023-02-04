<h1>Edytuj użytkownika</h1>

    <form method="POST" action="/edit-user/{{$user[0] -> id }}">
        @csrf
        <input type="text" name="fname" placeholder="imię" value="{{$user[0]->f_name}}">
        <input type="text" name="lname" placeholder="nazwisko" value="{{$user[0] ->l_name}}">
        <input type="text" name="rfid"  placeholder="numer rfid" value="{{$user[0]-> code}}">
        <button type="submit" name="submit">Zapisz</button>
    </form>
