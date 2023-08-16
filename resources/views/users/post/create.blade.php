@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
{{-- Activity - create UI for create post --}}

{{-- <div class="row justify-content-center">
    <div class="col-5"> --}}
        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">  
                <label for="category" class="form-label fw-bold d-block">
                    Category
                </label>
                @foreach($all_categories as $category)
                    <div class="form-check form-check-inline">
                        <input type="checkbox" name="category[]" value="{{ $category->id }}" id="{{ $category->name }}" class="form-check-input">
                        <label for="{{ $category->name }}" class="form-check-label">{{ $category->name }}</label>
                    </div>
             
                @endforeach

            </div>
                {{-- @error('category')
                <p class="text-danger small">{{ $message }}</p>
                @enderror --}}

           

            <div class="mb-3">
                <label for="discription" class="form-label fw-bold">Description</label>
                <textarea name="description" id="description" row="3" class="form-control" placeholder="What's on your mind"></textarea>
                {{-- @error('description')
                <p class="text-danger small">{{ $message }}</p>
                @enderror --}}
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" id="image" class="form-control mt-2" aria-describedby="image-info">
                <div class="form-text text-danger">
                    Acceptable formats: jpg,gif,png,jpeg, <br>
                    Maximum file size: 1024 mb
                </div>
                {{-- @error('avatar')
                <p class="text-danger small">{{ $message }}</p>
                @enderror --}}
            </div>

            <button type="submit" class="btn btn-primary px-5">Post</button>

        </form>
    {{-- </div>
</div> --}}
@endsection