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
        <div class="col-4 bg-secondary">
            {{-- profile overview --}}
            Profile overview

            {{-- suggested users --}}
            Suggested Users
        </div>
    </div>
</div>
@endsection
