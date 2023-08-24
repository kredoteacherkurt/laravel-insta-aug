@extends('layouts.app')

@section('title', 'Admin Categories')

@section('content')
    <div class="container">
        
        <form action="{{ route('admin.categories.store') }}" method="post">
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <input type="text" name="name" class="form-control" placeholder="Add a category..">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-plus"></i> ADD</button>
                </div>
            </form>
            <form action="{{ route('admin.categories.search') }}" method="get">
                <div class="col">
                    <input type="search" class="form-control w-25 float-end" name="search" id="search" placeholder="Search">
                </div>
            </form>   
        </div>  
        
    </div>

    <table class="table tble-hover bg-white align-middle border text-secondary">
        <thead class="small table-warning text-secondary">
            <th>#</th>
            <th>NAME</th>
            <th>COUNT</th>
            <th>LAST UPDATED</th>
            <th></th>
        </thead>
        <tbody>
            @foreach($all_categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        {{ $category->categoryPost->count() }}
                    </td>
                    <td>{{ $category->updated_at }}</td>
                    <td>
                            <button class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit-category-{{ $category->id }}"><i class="fa-solid fa-pen"></i></button>
                            <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-category-{{ $category->id }}"><i class="fa-solid fa-trash-can"></i></button>

                            @include('admin.categories.modal')
                    </td>

                </tr>
            @endforeach
                <tr>
                    <td></td>
                    <td>Uncategorized</td>
                    <td>
                        {{ $uncategorized }}
                    </td>
                </tr>
        </tbody>
    </table>
@endsection