@extends('layouts.app')
@section('title', 'Create Post')

@section('content')
    {{-- Actity - create UI for create post --}}
    <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label fw-bold d-block">
                Categories
            </label>
            @foreach ($all_categories as $category)
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="category[]" value="{{ $category->id }}" id="{{ $category->name }}"
                        class="form-check-input">
                    <label for="{{ $category->name }}" class="form-check-label">{{ $category->name }}</label>

                </div>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="description" class="form-label fw-bold">Description</label>
            <textarea name="description" id="description" rows="3" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            <div class="form-text text-danger">
                Acceptable formats: jpg, gif, png, jpeg, <br>
                Maximum file size: 1024 mb
            </div>
        </div>

        <button type="submit" class="btn btn-primary px-5">Post</button>

    </form>
@endsection
