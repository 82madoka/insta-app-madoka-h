@extends('layouts.app')

@section('title', 'Following Profile')
@section('content')

    @include('users.profile.header')


    <div class="card-body w-50 mx-auto">
        <div class="col-auto">
            <ul>
                <h2 class="text-center">Following</h2>
            </ul>
        </div>
        @if ($user->followings->isNotEmpty())
            @foreach ($user->followings as $following)
            <div class="row justify-content-center">
                <div class="col-auto">
                        <a href="{{ route('profile.show', $following->following->id) }}">
                            @if ($following->following->avatar)
                                <img src="{{ $following->following->avatar }}" alt="{{ $following->following->avatar }}"
                                    class="rounded-circle avatar-sm">
                            @else
                                <i class="fa-solid fa-circle-user text-secondary d-block text-center icon-sm"></i>
                            @endif
                        </a>
                    </div>
                    {{-- following check btn --}}
                    <div class="col">
                        {{ $following->following->name }}
                    </div>
                    <div class="col-auto text-end">
                        @if ($following->following->isFollowed())
                            <form action="{{ route('follow.destroy', $following->following->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-secondary btn-sm fw-bold">
                                    Following
                                </button>
                            </form>
                        @else
                            <form action="{{ route('follow.store', $following->following->id) }}" method="post">
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
