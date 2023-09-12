@extends('layouts.app')

@section('content')

<!-- <div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Create Exam</h1>            
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
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
                            <input type="checkbox" name="tasks[]" value="{{ $task->id }}">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <a href="{{ route('subjects.index') }}" class="btn btn-primary">Back to Subjects</a>
        </div>
    </div> -->

<!-- form for creating a new exam -->

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Create Exam</h1>
            <form action="{{ route('exams.store') }}" method="POST">
                @csrf
                <div>
                    <label for="name">Exam Name</label>
                    <input type="text" name="name" id="name">
                </div>
                <div>
                    <label for="tasks">Tasks</label>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
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
                                    <input type="checkbox" name="tasks[]" value="{{ $task->id }}">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <input type="hidden" name="subject_id" value="{{ $subject->id }}">
                <button type="submit" class="btn btn-success">Create</button><br>
                <a href="{{ route('subjects.index') }}" class="btn btn-primary">Back to Subjects</a>
            </form>
        </div>
    </div>
</div>

@endsection