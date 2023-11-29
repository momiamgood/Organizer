<h1>Добавить номер</h1>

<form method="post" action="{{ action([\App\Http\Controllers\NumberController::class, 'update']) }}">
    @csrf
    <label for="title">Имя\Название организации</label>
    <input name="title" id="title" type="text" placeholder="{{$number->title}}">
    <label for="number">Номер</label>
    <input name="number" id="number" type="text" placeholder="{{$number->number}}">

    <input type="submit" placeholder="Изменить">
</form>
