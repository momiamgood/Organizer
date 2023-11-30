<x-nav></x-nav>
<h1>Добавить номер</h1>

<form method="post" action="{{ action([\App\Http\Controllers\MeetController::class, 'update']) }}">
    @csrf
    <label for="title">Название встречи</label>
    <input name="title" id="title" type="text">
    <label for="date">Дата</label>
    <input name="date" id="date" type="date">
    <label for="time">Время</label>
    <input name="time" id="time" type="time">
    <label for="desc">Описание встречи</label>
    <textarea name="desc" id="desc" type="text">
    </textarea>

    <input type="submit" placeholder="Изменить">
</form>
