<x-nav></x-nav>
<h1>Результаты поиска</h1>

@isset($results)
    @foreach($results as $result)
        <p>{{ $result->title }}</p>
    @endforeach
@endisset
