@extends('layouts.app')

@section('title', 'Admin Posts')

@section('content')
<div class="container">
    <form action="{{ route('admin.posts.search') }}" method="get">
        @csrf
        <input type="text" class="form-control w-25 float-end mb-4" name="search" id="search" placeholder="Search">
    </form>  

    <table class="table table-hover bg-white align-middle border text-secondary">
        <thead class="small table-primary text-secondary">
            <th></th>
            <th></th>
            <th>CATEGORY</th>
            <th>OWNER</th>
            <th>CREATED AT</th>
            <th>STATUS</th>
            <th></th>
        </thead>
        <tbody>
            
                @forelse($all_posts as $post)
                    <li class="list-group-item">
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td><img src="{{ $post->image }}"  class="d-block mx-auto image-sm" alt="{{ $post->image }}"></td>
                            <td>
                                @forelse ($post->categoryPost as $category_post)
                                    <span class="badge bg-primary bg-opacity-50">
                                        {{ $category_post->category->name }}
                                    </span>
                                @empty
                                    <span class="badge bg-primary bg-opacity-50">
                                        Uncategorized
                                    </span>
                                @endforelse
                            </td>
                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>
                                @if ($post->trashed())
                                    <i class="fa-solid fa-circle-minus text-secondary" title="Hidden"></i>&nbsp; Hidden
                                @else
                                    <i class="fa-solid fa-circle text-primary" title="Visible"></i>&nbsp; Visible
                                @endif
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-sm" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>

                                    @if($post->trashed())
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item text-primary" data-bs-toggle="modal" data-bs-target="#unhide-post-{{ $post->id }}">
                                                <i class="fa-solid fa-eye"></i> Unhide Post {{ $post->id }}
                                            </button>
                                        </div>
                                    @else
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#hide-post-{{ $post->id }}">
                                                <i class="fa-solid fa-eye-slash"></i> Hide Post {{ $post->id }}
                                            </button>
                                        </div>
                                    @endif
                                    
                                </div>
                                @include('admin.posts.modal.status')
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="lead text-muted text-center">No Posts Found.</td>
                        </tr>
                @endforelse 
        </tbody>
    </table> 
    {{ $all_posts->links() }}
       
</div>
@endsection