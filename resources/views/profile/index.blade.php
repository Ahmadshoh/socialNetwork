@extends("templates.default")

@section('content')
    <div class="row">
        <div class="col-lg-6">
            @include('user.partials.userBlock')
        </div>

        <div class="col-lg-4 col-lg-offset-3">
            <h3>{{ $user->getFirstNameOrUsername() }} друзья</h3>

            @if (!$user->friends()->count())
                <p>{{ $user->getFirstNameOrUsername() }} нет друзей</p>
            @else
                @foreach($user->friends() as $user)
                    @include('user.partials.userBlock')
                @endforeach
            @endif
        </div>
    </div>
@endsection
