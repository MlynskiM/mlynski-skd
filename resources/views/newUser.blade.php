<h1>New User</h1>

    <form method="POST" action="/add-user">
        @csrf
        <input type="text" name="fname" placeholder="imię">
        <input type="text" name="lname" placeholder="nazwisko">
        <input type="text" name="rfid"  placeholder="numer rfid">
        <button type="submit" name="submit">submit</button>
    </form>
