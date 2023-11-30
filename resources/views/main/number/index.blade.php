<x-nav></x-nav>
<h1>Номера</h1>
@if ($numbers->isNotEmpty())
    <form method="get" action="{{ route('search') }}">
        <label for="q">Поиск</label>
        <input type="text" name="q" id="q" placeholder="я ищу...">
        <input type="submit">
    </form>
    @foreach($numbers as $number)
        <a href="number/{{$number->id}}">{{ $number->title }}</a>
        <p>Номер:{{ $number->number }}</p>
    @endforeach
@else
    <h2>У вас нет номеров</h2>
    <a href="number/create">Добавить номер</a>
@endif

