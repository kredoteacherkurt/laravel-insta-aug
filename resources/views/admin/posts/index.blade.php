@extends('layouts.app')

@section('title', 'Admin: Posts')


@section('content')
    <table class="table table-hover align-middle bg-white border text-secondary">
        <thead class="small table-success text-secondary">
            <td></td>
            <td>CATEGORIES</td>
            <td>DESCRIPTION</td>
            <td>CREATED AT</td>
            <td>STATUS</td>
            <th></th>
        </thead>
        <tbody>
            @foreach ($all_posts as $post)
                <tr>
                    <td>
                        <img src="{{ $post->image }}" style="height:150px; width:150px" class="img-thumbnail" alt="">
                    </td>
                    <td>
                        @foreach ($post->categoryPost as $category_post)
                            <span class="badge bg-secondary bg-opacity-50">
                                {{ $category_post->category->name }}
                            </span>
                        @endforeach
                    </td>
                    <td>{{ $post->description }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>

                            <i class="fa-solid fa-circle text-primary" title="hidden"></i> Hidden

                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm" data-bs-toggle="dropdown">
                                <i class="fa-solid fa-ellipsis"></i>
                            </button>

                        </div>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


