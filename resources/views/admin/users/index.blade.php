@extends('layouts.app')


@section('title', 'Admin:users')


@section('content')
    <table class="table -hover table-bordered align-middle">
        <thead class="table-sm table-success">
            <td></td>
            <td>NAME</td>
            <td>EMAIL</td>
            <td>CREATED AT</td>
            <td>STATUS</td>
            <td></td>
        </thead>
        <tbody>
            @foreach ($all_users as $user)
                <tr>
                    <td>
                        @if ($user->avatar)
                            <img src="{{ $user->avatar }}" alt="" class="rounded-circle avatar-md d-block mx-auto">
                        @else
                            <i class="fa-solid fa-circle-user text-dark icon-md text-center d-block "></i>
                        @endif
                    </td>
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                    <td>
                        <i class="fa-solid fa-circle text-success"></i>
                    </td>
                    <td>
                        @if (Auth::user()->id != $user->id)
                            <button type="button" class="btn btn-sm" data-bs-toggle="dropdown">
                                <i class="fa-solid fa-ellipsis"></i>
                            </button>

                            <div class="dropdown-menu">
                                <button type="button" class=" btn dropown-item text-danger" data-bs-toggle="modal" data-bs-target="#deactivate-user-{{$user->id}}">
                                     <i class="fa-solid fa-user-slash"></i> Deactivate {{$user->name}}
                                </button>
                            </div>

                        @endif
                        @include('admin.users.modal.status')
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

@endsection
