@extends('layouts.app')

@section('content')
    <!-- Form for creating a subject -->
    <div>
        <div>
            <div>
                <h1>Create Subject</h1>
                <form action="{{ route('subjects.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="name">Subject Name</label>
                        <input type="text" name="name" id="name">
                    </div>
                    <div>
                        <button type="submit">Create Subject</button>
                    </div>
                </form>
            </div>
        </div>
@endsection