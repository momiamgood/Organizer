<h1>Добавить номер</h1>

<form method="post" action="{{ action([\App\Http\Controllers\AddressController::class, 'update']) }}">
    @csrf
    <label for="title">Имя\Название организации</label>
    <input name="title" id="title" type="text">
    <label for="address">Адрес</label>
    <input name="address" id="address" type="text">

    <input type="submit" placeholder="Изменить">
</form>
