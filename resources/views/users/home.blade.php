@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
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
            {{-- profile overview --}}
            Profile overview

            {{-- suggested users --}}

            <div>
                <div class="row">
                    <div class="col-auto">
                        <p class="text-secondary fw-bold">
                            Suggestion For You
                        </p>
                    </div>
                    <div class="col text-end">
                        <a href="#" class="text-decoration-none text-dark">See all</a>
                    </div>
                </div>

                @foreach($suggested_users as $user)
               
                    <div class="row align-items-center mb-3">
                        <div class="col-auto">
                                @if($user->avatar)
                                    <img src="{{ $user->avatar }}" alt="" class="rounded-circle avatar-sm">
                                @else
                                    <i class="fa-solid fa-circle-user icon-sm text-secondary"></i>
                                @endif
                        </div>
                        <div class="col ps-0 text-truncate">
                            <a href="{{ route('profile.show', $user->id) }}" class="text-dark text-decoration-none fw-bold">{{ $user->name }}</a>
                        </div>
                        <div class="col-auto text-end">
                            <form action="{{ route('follow.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->id}}">
                                <button type="submit" class="btn text-primary btn-sm">Follow</button>
                            </form>

                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection
