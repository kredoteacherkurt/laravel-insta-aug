@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            {{-- @forelse ($all_posts as $post) --}}
            @forelse ($home_posts as $post)
                <div class="card mb-4">
                    @include('users.post.contents.title')
                    @include('users.post.contents.body')
                </div>
            @empty
            <div class="text-center">
                <h2>Share Photes</h2>
                <p class="text-muted">When you share a photo they'll appear on your profile</p>
                <a href="{{ route('post.create') }}" class="text-decoration-none">Share a photo</a>
            </div>
            @endforelse
        </div>
        <div class="col-4">
            <div class="row align-items-center mb-5 bg-white shadow-sm rounded-3 py-3">

            </div>
            @if ($suggested_users)
                <div class="row">
                    <div class="col-auto">
                        <p class="fw-bold text-secondary">
                            Suggestions for you
                        </p>
                    </div>
                    <div class="col text-end">
                        <a href="#" class="text-decoration-none">See all</a>
                    </div>
                </div>

                @foreach ($suggested_users as $user)
                    <div class="row align-items-center mb-3">
                        <div class="col-auto">
                            @if ($user->avatar)
                                <img src="{{$user->avatar}}" alt="" class="rounded-circle avatar-sm ">
                            @else
                                <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
                            @endif
                        </div>
                        <div class="col ps-0 text-truncate">
                            <a href="{{route('profile.show',$user->id)}}" class="text-decoration-none fw-bold text-dark">
                                {{$user->name}}
                            </a>
                        </div>
                        <div class="col-auto">
                            <form action="{{route('follow.store')}}" method="post">
                            @csrf
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                <button class="btn text-primary btn-sm">Follow</button>
                        </form>
                        </div>

                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
asdasd
