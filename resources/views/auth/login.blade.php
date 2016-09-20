    <form method="post" action="{{ route('login.store') }}">
        {{ csrf_field() }}
        <input type="text" id="username" name="username" placeholder="gebruikersnaam">
        <input type="password" id="password" name="password" placeholder="password">
        <input type="submit">
    </form>
