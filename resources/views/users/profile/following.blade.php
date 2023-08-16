@extends('layouts.app')


@section('title','following')

@section('content')
    @include('users.profile.header')

    <div style="margin-top: 100px">
        @if ($user->following->isNotEmpty())
            <div class="row justify-content-center">
                <div class="col-4 text-muted">
                   <p class="text-center">
                    following
                   </p>

                    @foreach ($user->following->except(Auth::user()->id) as $following)
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <a href="{{route('profile.show',$following->following->id)}}">
                                @if ($following->following->avatar)
                                    <img src="{{$following->following->avatar}}" alt="" class="rounded-circle avatar-sm">
                                @else
                                    <i class="fa-solid fa-circle-user icon-sm text-secondary"></i>
                                @endif
                            </a>
                        </div>
                        <div class="col ps-0 text-truncate">
                            <a class="text-dark text-decoration-none" href="{{route('profile.show',$following->following->id)}}">{{ $following->following->name }}</a>
                        </div>
                        <div class="col-auto text-end">
                            @if ($following->following->isFollowed())
                                <form action="{{route('follow.destroy',$following->following->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn text-danger btn-sm">Following</button>
                                </form>
                            @else
                            <form action="{{route('follow.store')}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="user_id" value="{{$following->following->id}}">
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
