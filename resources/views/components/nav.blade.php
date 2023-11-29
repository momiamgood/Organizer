@section('nav')
    @guest
        <div>
            <a href="/login">Логин</a>
            <a href="/register">Регистрация</a>
        </div>
    @endguest
    @auth
        <div>
            <a href="/meet">Встречи</a>
            <a href="/address">Адреса</a>
            <a href="/number">Номера</a>
        </div>
    @endauth
@endsection
