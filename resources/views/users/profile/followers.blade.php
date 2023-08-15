@extends('layouts.app')


@section('title','Follower')

@section('content')
    @include('users.profile.header')

    <div style="margin-top: 100px">
        @if ($user->followers->isNotEmpty())
            <div class="row justify-content-center">
                <div class="col-4 text-muted">
                   <p class="text-center">
                    Followers
                   </p>

                    @foreach ($user->followers->except(Auth::user()->id) as $follower)
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <a href="{{route('profile.show',$follower->follower->id)}}">
                                @if ($follower->follower->avatar)
                                    <img src="{{$follower->follower->avatar}}" alt="" class="rounded-circle avatar-sm">
                                @else
                                    <i class="fa-solid fa-circle-user icon-sm text-secondary"></i>
                                @endif
                            </a>
                        </div>
                        <div class="col ps-0 text-truncate">
                            <a class="text-dark text-decoration-none" href="{{route('profile.show',$follower->follower->id)}}">{{ $follower->follower->name }}</a>
                        </div>
                        <div class="col-auto text-end">
                            @if ($follower->follower->isFollowed())
                                <form action="{{route('follow.destroy',$follower->follower->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn text-danger btn-sm">Following</button>
                                </form>
                            @else
                            <form action="{{route('follow.store')}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="user_id" value="{{$follower->follower->id}}">
                                <button type="submit" class="btn text-danger btn-sm">Following</button>
                            </form>
                            @endif
                        </div>

                    </div>
                @endforeach
                </div>

            </div>
        @endif
    </div>
@endsection
