@extends('layouts.app')

@section('content')

<!-- list out the current user and add a dropdown menu for the roles -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>User</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">User</th>
                        <th scope="col">Roles</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">{{ $user->name }}</td>
                        <td>
                            <form method="POST" action="{{ route('users.store', $user->id) }}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <label for="role">Role</label>
                                <select name="role" id="role" class="form-control">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary">Assign Role</button>
                            </form>
                        </td>
                    </tr> 
                </tbody>
            </table>
        </div>
    </div>

@endsection