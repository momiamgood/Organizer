<h1>Добавить номер</h1>

<form method="post" action="{{ action([\App\Http\Controllers\NumberController::class, 'store']) }}">
    @csrf
    <label for="title">Имя\Название организации</label>
    <input name="title" id="title" type="text">
    <label for="number">Номер</label>
    <input name="number" id="number" type="text">

    <input type="submit" placeholder="Добавить">
</form>
