@extends('layouts.app')

@section('content')
<div class="container1">

    <div class="menu-admin">

        <div class="d-flex flex-column mb-3">
            <a href="{{ route('users.index') }}" class="mb-2 btn btn-dark" type="button">
                Back to Users
            </a>
        </div>

    </div>

    <div class="container d-flex justify-content-center">
        <div class="w-75">
            <h1 class="text-dark">Editing User <span style="color:rgb(39, 86, 161)">{{ $user->name }}</span>
            </h1>
            <form method="POST" action="{{ route('users.update', $user) }}" class="form-group">
                @csrf
                @method('PATCH')

                <label class="text-muted" for="id">Id</label>
                <input name="id" class="form-control" value="{{ $user->id }}" disabled>

                <label class="text-muted" for="name">Name</label>
                <input style="border: rgba(122, 122, 122, 0.591) solid 1px" type="text" name="name" id="name"
                    class="form-control" value="{{ $user->name }}">
                {!! $errors->first('name', '<small class="alert alert-danger">:message</small><br>') !!}

                <label class="text-muted" for="email">Email</label>
                <input name="email" class="form-control" value="{{ $user->email }}" disabled>

                <br>

                <select
                    class="btn @if($user->enabled) btn-info @else btn-dark @endif btn-info btn-lg btn-block dropdown-toggle"
                    name="enabled">
                    @if ($user->enabled)
                    <option value=1 selected>Enabled</option>
                    <option value=0>Disabled</option>
                    @else
                    <option value=1>Enabled</option>
                    <option value=0 selected>Disabled</option>
                    @endif
                </select>

                <button type="submit" class="btn btn-dark btn-lg btn-block">Edit User</button>

            </form>
        </div>
    </div>
</div>

@endsection