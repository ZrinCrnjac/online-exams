@extends('layouts.app')

@section('content')

<!-- form for editing a task for the current subject -->

<div>
    <div>
        <h1>Edit Task</h1>
        <form action="{{ route('tasks.update', ['subject' => $subject, 'task' => $task]) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="name">Task Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $task->name }}">
            </div>
            <div>
                <label for="text">Task Description</label>
                <input type="text" name="text" id="text" class="form-control" value="{{ $task->text }}">
            </div>
            <div>
                <label for="picture">Task Picture</label>
                <input type="picture" name="picture" id="picture" class="form-control" value="{{ $task->picture }}">
            </div>
            <div>
                <label for="subject_id">Subject</label>
                <select name="subject_id" id="subject_id" class="form-control">
                    @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}" @if($subject->id === $task->subject_id) selected @endif>{{ $subject->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Update Task</button>
        </form>
    </div>

@endsection