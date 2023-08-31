@extends('layouts.app')

@section('content')
    <!-- Form for editing a subject -->
    <div>
        <div>
            <div>
                <h1>Edit Subject</h1>
                <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="name">Subject Name</label>
                        <input type="text" name="name" id="name" value="{{ $subject->name }}">
                    </div>
                    <div>
                        <button type="submit">Update Subject</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection