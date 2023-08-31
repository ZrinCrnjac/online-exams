@extends('layouts.app')

@section('content')
    <!-- List out all the tasks for the current subject -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Tasks</h1>
                <a href="#" class="btn btn-success my-3">Create Task</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Task Name</th>
                            <th scope="col">Text</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->text }}</td>
                            <td>
                                <a href="{{ route('tasks.edit', ['subject' => $subject, 'task' => $task]) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('tasks.destroy', ['subject' => $subject, 'task' => $task]) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <a href="{{ route('subjects.index') }}" class="btn btn-primary">Back to Subjects</a>
            </div>
        </div>
@endsection