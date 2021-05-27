@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-sm">
        <caption>List of users</caption>
        <thead>
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
                <td><button class="btn btn-outline-success">User</button></td>
                <td><button class="btn btn-outline-success">Enabled</button></td>
                <td>
                    <div class="btn-group">
                        <button class="btn">
                            <i class="fas fa-pencil-alt text-info"></i>
                        </button>
                        <form>
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
</div>

@endsection