@extends('layouts.app')

@section('content')

<!-- list out all the users and add a dropdown menu for the roles -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Users</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">User</th>
                        <th scope="col">Roles</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td scope="row">{{ $user->name }}</td>
                        <td>
                            @foreach($user->roles as $role)
                            {{ $role->name }}
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                        </td>
                    </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection