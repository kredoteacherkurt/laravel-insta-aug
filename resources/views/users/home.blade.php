@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
    <div class="row gx-5">
        <div class="col-8">
            @forelse ($all_posts as $post)
                <div class="card mb-4">
                    @include('users.post.contents.title')
                    @include('users.post.contents.body')
                </div>
            @empty
                {{-- IF the site does not have any posts yet. --}}
                <div class="text-center">
                    <h2>Share Photos</h2>
                    <p class="text-muted">
                        When you share photos, they'll appear on your profile.
                    </p>
                    <a href="{{ route('post.create') }}" class="text-decoration-none">Share your first photo</a>
                </div>
            @endforelse
        </div>
        <div class="col-4 bg-secondary bg-opacity-50">
            PROFILE OVERVIEW + SUGGESTIONS
        </div>
    </div>
@endsection
