@extends('layouts.app')

@section('title', 'Followers Profile')
@section('content')

    @include('users.profile.header')


    <div class="card-body w-50 mx-auto">
        <div class="col-auto">
            <ul>
                <h2 class="text-center">Followers</h2>
            </ul>
        </div>
        @if ($user->followers->isNotEmpty())
            @foreach ($user->followers as $follower)
            <div class="row justify-content-center">
                <div class="col-auto">
                        <a href="{{ route('profile.show', $follower->follower->id) }}">
                            @if ($follower->follower->avatar)
                                <img src="{{ $follower->follower->avatar }}" alt="{{ $follower->follower->avatar }}"
                                    class="rounded-circle avatar-sm">
                            @else
                                <i class="fa-solid fa-circle-user text-secondary d-block text-center icon-sm"></i>
                            @endif
                        </a>
                    </div>
                    {{-- follower check btn --}}
                    <div class="col">
                        {{ $follower->follower->name }}
                    </div>
                    <div class="col-auto text-end">
                        @if ($follower->follower->isFollowed())
                            <form action="{{ route('follow.destroy', $follower->follower->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-secondary btn-sm fw-bold">
                                    Following
                                </button>
                            </form>
                        @else
                            <form action="{{ route('follow.store', $follower->follower->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm fw-bold">Follow</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
    </div>

@endsection
