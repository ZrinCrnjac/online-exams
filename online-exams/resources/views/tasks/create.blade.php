@extends('layouts.app')

@section('content')

<!-- create a new task for the current subject -->

<div>
    <div>
        <h1>Create Task</h1>
        <form action="{{ route('tasks.store', ['subject' => $subject]) }}" method="POST">
            @csrf
            <div>
                <label for="name">Task Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div>
                <label for="text">Task Description</label>
                <input type="text" name="text" id="text" class="form-control">
            </div>
            <div>
                <label for="picture">Task Picture</label>
                <input type="picture" name="picture" id="picture" class="form-control">
            </div>
            <input type="hidden" name="subject_id" value="{{ $subject->id }}">
            <button type="submit" class="btn btn-success">Create Task</button>
        </form>
    </div>
</div>

@endsection