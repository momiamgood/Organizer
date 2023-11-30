<x-nav></x-nav>
<h1>{{ $number->title }}</h1>
<p>{{ $number->number }}</p>

<form action="{{ action([\App\Http\Controllers\NumberController::class, 'destroy']) }}">
    @csrf
    @method('delete')
    <input type="submit" placeholder="Удалить">
</form>
