<div class="media">
    <a href="{{ route('profile.index', $user->username) }}">
        <img src="{{ $user->getAvatarUrl() }}" class="mr-3" alt="{{ $user->getNameOrUsername() }}">
    </a>
    <div class="media-body">
        <h5 class="mt-0">
            <a href="{{ route('profile.index', $user->username) }}">{{ $user->getNameOrUsername() }}</a>
        </h5>

        @if ($user->location)
            <p>{{ $user->location }}</p>
        @endif
    </div>
</div>
