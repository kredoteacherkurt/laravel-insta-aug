@extends('layouts.app')

@section('title', 'Show Post')

@section('content')
<div class="row border shadow">
        <div class="col p-0 border-end">
            <img src="{{ $post->image }}" class="w-100" alt="{{ $post->image }}">
        </div>
        <div class="col px-0 bg-white">

            <div class="card border-0">
                <div class="card-header bg-white py-3">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            @if ($post->user->avatar)
                                <img src="{{ $post->user->avatar }}" class="rounded-circle avatar-sm" alt="">
                            @else
                                <i class="fa-solid fa-circle-user icon-sm"></i>
                            @endif
                        </div>
                        <div class="col ps-0">
                            <a href="#" class="text-decoration-none text-dark">{{ $post->user->name }}</a>
                            {{-- IF YOU ARE NOT THE OWNER OF THE POST, SHOW FOLLOW AND UNFOLLOW BUTTON --}}

                            @if ($post->user->isFollowed())
                                <form action="{{ route('follow.destroy', $post->user->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                    <button type="submit" class="btn btn-primary btn-sm fw-bold">Following</button>
                                </form>
                            @else
                                <form action="{{ route('follow.store') }}" method="post">
                                @csrf
                                   <input type="hidden" name="user_id" value="{{ $post->user->id }}">
                                   <button type="submit" class="btn btn-primary btn-sm fw-bold">Follow</button>
                                </form>
                            @endif
                        
                        </div>
                        <div class="col-auto">
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>
    
                                @if ($post->user->id === Auth::user()->id)
                                    <div class="dropdown-menu">
                                        <a href="{{ route('post.edit', $post->id) }}" class="dropdown-item">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </a>
                                        <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#delete-post-{{ $post->id }}">
                                            <i class="fa-solid fa-trash"></i> Delete
                                        </button>
                                    </div>
                                @else
                                
                                @endif

                            </div>
                            @include('users.post.contents.modals.delete')
                        </div>
                    </div>
                </div>
                <div class="card-body w-100">
                    <div class="row align-items-center">
                        <div class="col-auto">
                        {{-- heart button --}}
                        <form action="#" method="post">
                            @csrf
                            <button type="submit" class="btn">
                                <i class="fa-regular fa-heart icon-sm"></i>
                            </button>
                        </form>
                    </div>
                    <div class="col p-0">
                        <strong>3</strong>
                    </div>
                    <div class="col text-end">
                        @foreach ($post->categoryPost as $category_post)
                            <span class="badge bg-primary bg-opacity-50">
                                {{ $category_post->category->name }}
                            </span>
                        @endforeach
                    </div>
                </div>

                <div class="mt-3">
                    @if ($post->comments->isNotEmpty())
                        <ul class="list-group">
                            @foreach ($post->comments as $comment)
                                <li class="list-group-item border-0 mb-2">
                                    <a href="#" class="text-decoration-none text-dark fw-bold">{{ $comment->user->name }}</a>
                                    &nbsp;
                                    <p class="d-inline fw-light">{{ $comment->body }}</p>
                                    <form action="{{ route('comment.destroy', $comment->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                
                                        <span class="text-muted small">{{ $comment->created_at->diffForHumans() }}</span>
                                        @if ($comment->user->id == Auth::user()->id)
                                            &middot;
                                            <button type="submit" class="border-0 btn text-danger p-0 xsmall">Delete</button>
                                        @endif
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <form action="{{ route('comment.store') }}" method="post">
                        @csrf
                        <div class="input-group">
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <textarea name="body" id="" cols="" rows="1" class="form-control" placeholder="Add a comment"></textarea>
                            <button type="submit" class="btn btn-outline-secondary btn-sm"><i class="fa-regular fa-paper-plane"></i></button>
                        </div>
                    </form>
                    </div>

            </div>
        </div>
        
</div>
    
@endsection