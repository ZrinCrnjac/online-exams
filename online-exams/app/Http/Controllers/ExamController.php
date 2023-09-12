<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\User;
use App\Models\Task;

class ExamController extends Controller
{
    public function create(Request $request)
    {
        /** @var User $user */
        $user = auth()->user();
        $tasks = $request->get('tasks');

        if($user->can('create exams')){
            return view('exams.create', compact('tasks'));
        }else{
            return redirect()->route('subjects.index')->with('error', 'You are not allowed to create an exam!');
        }
    }

    public function store(Request $request)
    {
        /** @var User $user */
        $user = auth()->user();

        if($user->can('create exams')) {
            $exam = new Exam([
                'name' => $request->get('name'),
            ]);
            $user->exams()->save($exam);

            $tasks = $request->get('tasks');
            $exam->tasks()->attach($tasks);

            return redirect('subjects.index')->with('success', 'Exam saved!');
        } else {
            return redirect('subjects.index')->with('error', 'You are not allowed to create an exam!');
        }
    }

    public function show(Exam $exam)
    {
        $tasks = Task::where('exam_id', $exam->id)->get();
        return view('exams.show', compact('exam', 'tasks'));
    }

    public function destroy(Exam $exam)
    {
        /** @var User $user */
        $user = auth()->user();

        if($user->can('delete exams')) {
            $exam->delete();

            return redirect('subjects.index')->with('success', 'Exam deleted!');
        } else {
            return redirect('subjects.index')->with('error', 'You are not allowed to delete this exam!');
        }
    }
}
