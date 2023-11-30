<x-nav></x-nav>
<h1>Адреса</h1>
@if ($addresses->isNotEmpty())
    <form method="get" action="{{ route('search') }}">
        <label for="q">Поиск</label>
        <input type="text" name="q" id="q" placeholder="я ищу...">
        <input type="submit">
    </form>
    @foreach($addresses as $address)
        <a href="address/{{$address->id}}">{{ $address->title }}</a>
        <p>Адрес:{{ $address->address }}</p>
    @endforeach
@else
    <h2>У вас нет адресов</h2>
    <a href="address/create">Добавить адрес</a>
@endif

