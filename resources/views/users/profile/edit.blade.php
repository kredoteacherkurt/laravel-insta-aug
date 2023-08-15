@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
   
        <div class="card bg-white p-5">
            <div class="card-body">
                <div class="container m-2">
                <div class="row">
                    <h3 class="text-muted">Update Profile</h3>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        @if ($user->avatar)
                            <img src="{{ $user->avatar }}" alt="" class="img-thumbnail rounded-circle d-block mx-auto avatar-lg">
                        @else
                            <i class="fa-solid fa-circle-user d-block icon-lg text-secondary"></i>
                        @endif
                    </div>
                    <div class="col-8 p-3">
                        <form action="{{ route('profile.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                        <input type="file" name="avatar" id="avatar" class="form-control mt-2 w-75" aria-describedby="image-info">
                        <div class="form-text text-muted">
                            Acceptable formats: jpg,gif,png,jpeg, <br>
                            Maximum file size: 1024 mb
                        </div>

                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <label for="name" class="form-label fw-bold">Name</label>
                    </div>
                    <div class="row">
                        <input type="text" id="name" name="name" class="form-coltrol border border-muted text-muted" value="{{ $user->name }}">
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <label for="email" class="form-label fw-bold">Email Address</label>
                    </div>
                    <div class="row">
                        <input type="text" id="email" name="email" class="form-coltrol border border-muted text-muted" value="{{ $user->email }}">
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <label for="introduction" class="form-label fw-bold">Introduction</label>
                    </div>
                    <div class="row">
                        <textarea name="introduction" id="introduction" cols="" rows="4" class="form-control border border-muted text-muted" placeholder="Describe yourself">{{ $user->introduction }}</textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-warning w-25">Save</button>


            </div>
            </div>
        </div>

    </form>
    
@endsection