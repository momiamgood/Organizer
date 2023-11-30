<x-nav></x-nav>
<h1>Встречи</h1>
@if ($meets->isNotEmpty())
    @foreach($meets as $meet)
        <a href="meet/{{$meet->id}}">{{ $meet->title }}</a>
        <p>Дата:{{ $meet->date }}</p>
        <p>Время:{{ $meet->time }}</p>
        <p>Описание:{{ $meet->desc }}</p>
    @endforeach
@else
    <h2>У вас нет встреч</h2>
    <a href="meet/create">Добавить встречу</a>
@endif

