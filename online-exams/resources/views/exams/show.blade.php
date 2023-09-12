@extends('layouts.app')

@section('content')

<!-- Show the exam and all the tasks that it has -->

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Exam: {{ $exam->name }}</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Task Name</th>
                        <th scope="col">Task Text</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->name }}</td>
                        <td>{{ $task->text }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <a href="{{ route('subjects.index') }}" class="btn btn-primary">Back to Subjects</a>
        </div>
    </div>
</div>

@endsection