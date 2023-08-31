@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Subjects</h1>
                <a href="{{ route('subjects.create') }}" class="btn btn-success my-3">Create Subject</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Subject Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subjects as $subject)
                        <tr>
                            <td>{{ $subject->name }}</td>
                            <td>
                                <a href="{{ route('subjects.show', $subject->id) }}" class="btn btn-primary">View</a>
                                <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection