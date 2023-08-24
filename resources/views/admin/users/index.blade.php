@extends('layouts.app')

@section('title', 'Admin Users')

@section('content')
    <div class="container">
        <form action="{{ route('admin.users.search') }}" method="get">
            @csrf
            <input type="text" class="form-control w-25 float-end mb-4" name="search" id="search" placeholder="Search">
        </form>   
                <table class="table table-hover bg-white align-middle border text-secondary">
                    <thead class="small table-success text-secondary">
                        <th></th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>CREATED AT</th>
                        <th>STATUS</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($all_users->except(Auth::user()->id) as $user)
                            <tr>
                                <td>
                                    @if ($user->avatar)
                                    <img src="{{ $user->avatar }}" alt="" class="img-thumbnail rounded-circle d-block mx-auto avatar-sm">
                                @else
                                    <i class="fa-solid fa-circle-user icon-sm text-center text-secondary"></i>
                                @endif
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    @if ($user->trashed())
                                        <i class="fa-solid fa-circle text-danger" title="deactivated"></i>
                                    @else
                                        <i class="fa-solid fa-circle text-success" title="active"></i>
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm" data-bs-toggle="dropdown">
                                            <i class="fa-solid fa-ellipsis"></i>
                                        </button>

                                        <div class="dropdown-menu">
                                            @if($user->trashed())
                                                <button class="dropdown-item text-success" data-bs-toggle="modal" data-bs-target="#activate-user-{{$user->id}}">
                                                    <i class="fa-solid fa-user-slash">Activate user {{ $user->name }}</i>
                                                </button>
                                            @else
                                                <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#deactivate-user-{{$user->id}}">
                                                    <i class="fa-solid fa-user-slash">Deactivate user {{ $user->name }}</i>
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                @include('admin.users.modal.status')
                            </tr>
                        @endforeach
                    </tbody>
                </table>
    </div>

    
@endsection