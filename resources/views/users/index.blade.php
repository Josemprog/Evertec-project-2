@extends('layouts.app')

@section('content')
<div class="container1">

    <!--  ADMINISTRADOR MENU -->
    <div class="menu-admin">

        <div class="d-flex flex-column mb-3">
            <a href="{{ route('users.create') }}" class="mb-2 btn btn-info" type="button">+ Create a new user</a>
        </div>

        <!--  SEARCH FILTER -->
        <div class="border rounded-3 p-2 bg-light ">
            <h1 class="text-info">Filter</h1>
            <form class="form-group" method="GET" action="{{route('users.index')}}">
                @csrf
                <small class="form-text text-info">Search by name</small>
                <input type="text" class="form-control border" name="name" placeholder="Name ...">

                <small class="form-text text-info">Search byemail</small>
                <input type="text" class="form-control border" name="email" placeholder="Email ...">

                <div class="form-check pt-2">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="enabled" value="checkedValue">
                        <p class="text-info">Search for disabled users</p>
                    </label>
                </div>

                <button type="submit" class="btn btn-outline-light btn-block mt-2">Search</button>
            </form>
        </div>

    </div>


    <!--  USERS TABLE -->
    <div class="table-users table-responsive ml-3">
        <h1 class="text-info text-center mb-3">List of Users</h1>
        <table class="table table-sm table1 rounded text-center">
            <caption>List of users</caption>
            <thead class="bg-info">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Creation date</th>
                    <th>Modification date</th>
                    <th>Type</th>
                    <th>State</th>
                    <th>Set up</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td scope="row">{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                    <td>{{ $user->updated_at->diffForHumans() }}</td>
                    <td>
                        @if ($user->admin)
                        <button class="btn btn-outline-success">Admin</button>
                        @else
                        <button class="btn btn-outline-secondary">User</button>
                        @endif
                    </td>
                    <td>
                        @if ($user->enabled)
                        <button class="btn btn-outline-success">Enabled</button>
                        @else
                        <button class="btn btn-outline-secondary">Disabled</button>
                        @endif
                    </td>
                    <td>
                        <div class="btn-group">
                            <a class="btn" href="{{ route('users.edit', $user) }}">
                                <i class="fas fa-pencil-alt text-info"></i>
                            </a>
                            <form method="POST" action="{{ route('users.destroy', $user) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn">
                                    <i class=" fas fa-trash-alt text-danger"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- PAGINATION -->
        <div class="d-flex justify-content-center text-dark">{{ $users->render() }}</div>
    </div>
</div>

@endsection