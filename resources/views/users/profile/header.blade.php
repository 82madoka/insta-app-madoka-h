<div class="row">
    <div class="col-4">
        @if ($user->avatar)
            <img src="{{ $user->avatar }}" alt="{{ $user->name }}"
                class="img-thumbnail rounded-circle d-block mx-auto avatar-lg">
        @else
            <i class="fa-solid fa-circle-user text-secondary d-block text-center icon-lg"></i>
        @endif
    </div>
    <div class="col">
        <div class="row mb-3">
            <div class="col-auto">
                <h2 class="display-6 mb-0">{{ $user->name }}</h2>
            </div>
            <div class="col-auto p-2">
                @if (Auth::user()->id === $user->id)
                    <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-outline-secondary btn-sm fw-bold">Edit
                        Profile</a>
                @else
                  @if ($user->isFollowed())
                    <form action="{{route('follow.destroy', $user->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                         <button type="submit" class="btn btn-outline-secondary btn-sm fw-bold">
                            Following
                        </button>
                    </form>
                    @else

                    <form action="{{route('follow.store', $user->id)}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-sm fw-bold">Follow</button>
                    </form>
                  @endif
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-auto">
                <a href="{{ route('profile.show', $user->id) }}" class="text-decoration-none text-dark"><Strong
                        class="me-1">{{ $user->posts->count() }}</Strong>
                    {{ $user->posts->count() > 1 ? 'posts' : 'post' }}
                </a>
            </div>
            <div class="col-auto">
                <a href="{{ route('profile.followers', $user->id)}}" class="text-decoration-none text-dark"><Strong class="me-1">
                    {{ $user->followers->count() }}</Strong>
                    {{ $user->followers->count() > 1 ? 'followers' : 'follower' }}
                </a>
            </div>
            <div class="col-auto">
                <a href="{{ route('profile.following', $user->id)}}" class="text-decoration-none text-dark"><Strong class="me-1">
                    {{ $user->followings->count() }}</Strong>
                    {{ $user->followings->count() > 1 ? 'followings' : 'following' }}
                </a>
            </div>
        </div>

        <p class="fw-bold">{{$user->introduction}}</p>

    </div>
</div>
