@extends("templates.default")

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <h3>Ваши друзья</h3>

            @if (!$friends->count())
                <p>У вас нет друзей</p>
            @else
                @foreach($friends as $user)
                    @include('user.partials.userBlock')
                @endforeach
            @endif
        </div>

        <div class="col-lg-6">
            <h5>Запросы на друзья</h5>

            @if (!$requests->count())
                <p>У вас нет завросов в друзья</p>
            @else
                @foreach($requests as $user)
                    @include('user.partials.userBlock')
                @endforeach
            @endif
        </div>
    </div>
@endsection
