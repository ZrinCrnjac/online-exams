<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\User;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(Request $request)
    {
        /** @var User $user */
        $user = auth()->user();

        if($user->can('create-subject')) {
            $subject = new Subject([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
            ]);
            $user->subjects()->save($subject);

            return redirect('subjects.index')->with('success', 'Subject saved!');
        } else {
            return redirect('subjects.index')->with('error', 'You are not allowed to create a subject!');
        }
    }

    public function show(Subject $subject)
    {
        return view('subjects.show', compact('subject'));
    }

    public function edit($id)
    {
        return view('subjects.edit');
    }

    public function update(Request $request, Subject $subject)
    {
        $subject->update([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
        ]);

        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully!');
    }
    
    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully!');
    }
}
