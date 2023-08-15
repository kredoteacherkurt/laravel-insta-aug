@extends('layouts.app')

@section('title', 'Show Profile')

@section('content')
    @include('users.profile.header')
    


    @if ($user->posts->isNotEmpty())
        <div class="" style="margin-top:100px">
            <div class="row">
                @foreach ($user->posts as $post)
                    <div class="col-4">
                        <img src="{{ $post->image }}" alt="{{ $post->image }}" class="img-thumbnail">
                    </div>
                @endforeach
            </div>
        </div>
    @endif



@endsection