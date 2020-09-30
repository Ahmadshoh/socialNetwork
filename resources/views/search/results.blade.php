@extends("templates.default")

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <h3>Результати поиска: {{ Request::input('query') }}</h3>

            @if (!$users->count())
                <p>Пользователь не найден!</p>
            @else
                <div class="row">
                    @foreach($users as $user)
                        <div class="col-lg-6">
                            @include('user.partials.userBlock')
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
