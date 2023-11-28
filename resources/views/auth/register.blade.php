<h2>Регистрация</h2>
<form action="{{ route('register') }}" method="post">
    @csrf
    <label for="username">Имя</label>
    <input name="username" type="text" id="username">
    <label for="password">Пароль</label>
    <input name="password" type="password" id="password">

    <input type="submit">
</form>
