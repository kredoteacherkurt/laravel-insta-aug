@extends('layouts.app')
@section('title', 'Edit Post')

@section('content')
    {{-- Actity - create UI for create post --}}
    <form action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="" class="form-label fw-bold d-block">
                Categories
            </label>
            @foreach ($all_categories as $category)
                @if (in_array($category->id, $selected_categories))
                    <div class="form-check form-check-inline">
                        <input type="checkbox" name="category[]" value="{{ $category->id }}" id="{{ $category->name }}"
                            class="form-check-input" checked>
                        <label for="{{ $category->name }}" class="form-check-label">{{ $category->name }}</label>

                    </div>
                @else
                    <div class="form-check form-check-inline">
                        <input type="checkbox" name="category[]" value="{{ $category->id }}" id="{{ $category->name }}"
                            class="form-check-input">
                        <label for="{{ $category->name }}" class="form-check-label">{{ $category->name }}</label>

                    </div>
                @endif
            @endforeach
        </div>
        <div class="mb-3">
            <label for="description" class="form-label fw-bold">Description</label>
            <textarea name="description" id="description" rows="3" class="form-control">
               {{ $post->description }}
            </textarea>
        </div>
        <div class="mb-3">
            <img src="{{ $post->image }}" alt="" class="img-thumbnail d-block"
                style="height
            150px;width:150px; object-fit:cover">
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
