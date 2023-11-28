<h2>Логин</h2>
<form action="/login" method="post">
    @csrf
    <label for="username">Имя</label>
    <input name="username" type="text" id="username">
    <label for="password">Пароль</label>
    <input name="password" type="password" id="password">

    <input type="submit">
</form>
