@extends('layouts.app')

@section('content')

<!-- show all the exams -->

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Exams</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Exam Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($exams as $exam)
                    <tr>
                        <td>{{ $exam->name }}</td>
                        <td>
                            <a href="{{ route('exams.show', ['exam' => $exam]) }}" class="btn btn-primary">View</a>
                            <form action="{{ route('exams.destroy', ['exam' => $exam]) }}" method="POST" class="d-inline-block">
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