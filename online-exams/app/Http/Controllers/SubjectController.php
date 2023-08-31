<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\User;
use App\Models\Task;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        /** @var User $user */
        $user = auth()->user();

        if($user->can('create subjects')){
            return view('subjects.create');
        }else{
            return redirect()->route('subjects.index')->with('error', 'You are not allowed to create a subject!');
        }
    }

    public function store(Request $request)
    {
        /** @var User $user */
        $user = auth()->user();

        if($user->can('create subjects')) {
            $subject = new Subject([
                'name' => $request->get('name'),
            ]);
            $user->subjects()->save($subject);

            return redirect('/subjects')->with('success', 'Subject saved!');
        } else {
            return redirect('subjects.index')->with('error', 'You are not allowed to create a subject!');
        }
    }

    public function show(Subject $subject)
    {
        $tasks = Task::where('subject_id', $subject->id)->get();
        return view('subjects.show', compact('subject', 'tasks'));
    }

    public function edit(Subject $subject)
    {
        /** @var User $user */
        $user = auth()->user();

        if($user->can('update subjects')){
            return view('subjects.edit', compact('subject'));
        }else{
            return redirect()->route('subjects.index')->with('error', 'You are not allowed to update this subject!');
        }
    }

    public function update(Request $request, Subject $subject)
    {
        /** @var User $user */
        $user = auth()->user();

        if($user->can('update subjects')){
            $subject->update([
                'name' => $request->get('name'),
            ]);

            return redirect()->route('subjects.index')->with('success', 'Subject updated successfully!');
        } else {
            return redirect()->route('subjects.index')->with('error', 'You are not allowed to update this subject!');
        }
    }
    
    public function destroy(Subject $subject)
    {
        /** @var User $user */
        $user = auth()->user();

        if($user->can('delete subjects')){
            $subject->delete();

            return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully!');
        } else {
            return redirect()->route('subjects.index')->with('error', 'You are not allowed to delete this subject!');
        }
    }
}
