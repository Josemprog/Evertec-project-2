@extends('layouts.app')

@section('content')
<div class="container1">

    <div class="menu-admin">

        <div class="d-flex flex-column mb-3">
            <a href="{{ route('users.index') }}" class="mb-2 btn btn-info" type="button">
                Back to Users
            </a>
        </div>

    </div>

    <div class="container d-flex justify-content-center">
        <div class="w-75">
            <h1 class="text-info">Creating a new User</h1>
            <form method="POST" action=" {{ route('users.store')}} " class="form-group">
                @csrf

                <label class="text-muted" for="name">Name</label>
                <input name="name" id="name" class="form-control" placeholder="Name ...">
                {!! $errors->first('name', '<small class="alert alert-danger">:message</small><br>') !!}

                <label class="text-muted" for="email">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email ...">
                {!! $errors->first('email', '<small class="alert alert-danger">:message</small><br>') !!}

                <label class="text-muted" for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="password ...">
                {!! $errors->first('password', '<small class="alert alert-danger">:message</small><br>') !!}

                <br>

                <button type="submit" class="btn btn-info btn-lg btn-block">Create</button>

            </form>
        </div>
    </div>
</div>

@endsection