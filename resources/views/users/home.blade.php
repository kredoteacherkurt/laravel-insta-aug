@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
          @foreach ($all_posts as $post)
            <img src="{{$post->image}}" alt="">
          @endforeach
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
