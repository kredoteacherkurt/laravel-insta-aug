@extends('layouts.app')

@section('title', 'Admin:users')

@section('content')
    <table class="table table-hover align-middle bg-white border text-secondary">
        <thead class="small table-success text-secondary">
            <td></td>
            <td>NAME</td>
            <td>EMAIL</td>
            <td>CREATED AT</td>
            <td>STATUS</td>
            <th></th>
        </thead>
        <tbody>
            @foreach ($all_users->except(Auth::user()->id) as $user)
                <tr>
                    <td>
                        @if ($user->avatar)
                            <img src="{{ $user->avatar }}" alt="" class="rounded-circle avatar-sm d-block mx-auto">
                        @else
                            <i class="fa-solid fa-circle-user text-secondary text-center icon-sm"></i>
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
                            <button class="btn btn-sm" data-bs-toggle="dropdown">
                                <i class="fa-solid fa-ellipsis"></i>
                            </button>

                            <div class="dropdown-menu">
                                @if ($user->trashed())
                                    <button class="dropdown-item text-success" data-bs-toggle="modal"
                                        data-bs-target="#activate-user-{{ $user->id }}">
                                        <i class="fa-solid fa-user-check">Activate user {{ $user->name }}</i>
                                    </button>
                                @else
                                    <button class="dropdown-item text-danger" data-bs-toggle="modal"
                                        data-bs-target="#deactivate-user-{{ $user->id }}">
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
@endsection
