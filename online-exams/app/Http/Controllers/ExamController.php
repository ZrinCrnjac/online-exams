<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\User;
use App\Models\Task;
use App\Models\Subject;

class ExamController extends Controller
{

    public function index()
    {
        /** @var User $user */
        $user = auth()->user();

        if($user->can('read exams')) {
            $exams = Exam::where('user_id', $user->id)->get();

            return view('exams.index', compact('exams'));
        } else {
            return redirect()->route('subjects.index')->with('error', 'You are not allowed to view exams!');
        }
    }

    public function create(Subject $subject)
    {
        /** @var User $user */
        $user = auth()->user();
        $tasks = Task::where('subject_id', $subject->id)->get();

        if($user->can('create exams')){
            return view('exams.create', compact('subject', 'tasks'));
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
                'subject_id' => $request->get('subject_id'),
                'user_id' => $user->id,
            ]);
            $user->exams()->save($exam);

            $tasks = $request->get('tasks');
            $exam->tasks()->attach($tasks);

            return redirect()->route('exams.index')->with('success', 'Exam saved!');
        } else {
            return redirect()->route('subjects.index')->with('error', 'You are not allowed to create an exam!');
        }
    }

    public function show(Exam $exam)
    {
        /** @var User $user */
        $user = auth()->user();
        $tasks = $exam->tasks()->get();

        if($user->can('read exams')) {
            return view('exams.show', compact('exam', 'tasks'));
        } else {
            return redirect()->route('subjects.index')->with('error', 'You are not allowed to view this exam!');
        }
    }

    public function destroy(Exam $exam)
    {
        /** @var User $user */
        $user = auth()->user();

        if($user->can('delete exams')) {
            $exam->delete();

            return redirect()->route('subjects.index')->with('success', 'Exam deleted!');
        } else {
            return redirect()->route('subjects.index')->with('error', 'You are not allowed to delete this exam!');
        }
    }

    public function random(Subject $subject)
    {
        /** @var User $user */
        $user = auth()->user();
        $randomTasks = Task::where('subject_id', $subject->id)->inRandomOrder()->limit(5)->get();
        $examName = 'Random exam - ' . date('Y-m-d H:i');

        if($user->can('create exams')){
            $exam = new Exam([
                'name' => $examName,
                'subject_id' => $subject->id,
                'user_id' => $user->id,
            ]);
            $user->exams()->save($exam);

            $tasks = $randomTasks->pluck('id');
            $exam->tasks()->attach($tasks);

            return redirect()->route('exams.index')->with('success', 'Random Exam saved!');
        }else{
            return redirect()->route('subjects.index')->with('error', 'You are not allowed to create an exam!');
        }
    }
}
