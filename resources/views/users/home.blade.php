@extends('layouts.app')

@section('title','Homepage')

@section('content')
    <div class="row gx-5">
        <div class="col-8 bg-warning">
            <div class="text-center">
                <h2>Share Photos</h2>
                <p class="text-secondary">
                    When you share photos, they'll appear on your own profile
                </p>
                <a href="#" class="text-decoration-none">Share your first photo</a>
            </div>
        </div>
        <div class="col-4 bg-secondary bg-opacity-50">
            PROFILE OVERVIEW + SUGGESTIONS
        </div>
    </div>
@endsection
