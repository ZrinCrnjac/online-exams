<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function create(Subject $subject)
    {
        /** @var User $user */
        $user = auth()->user();

        if($user->can('create tasks')){
            return view('tasks.create', compact('subject'));
        }else{
            return redirect()->route('subjects.show', ['subject' => $subject])->with('error', 'You are not allowed to create a task!');
        }
    }

    public function store(Request $request, Subject $subject){
        /** @var User $user */
        $user = auth()->user();

        if($user->can('create tasks')){
            $task = new Task([
                'name' => $request->get('name'),
                'text' => $request->get('text'),
                'picture' => $request->get('picture'),
                'subject_id' => $subject->id,
            ]);
            $task->save();

            return redirect()->route('subjects.show', ['subject' => $subject])->with('success', 'Task saved!');

        }else{
            return redirect()->route('subjects.show', ['subject' => $subject])->with('error', 'You are not allowed to create a task!');
        }
    }

    public function edit($id)
    {
        /** @var User $user */
        $user = auth()->user();

        if($user->can('update tasks')){
            $task = Task::find($id);
            return view('tasks.edit', compact('task'));
        }else{
            return redirect()->route('tasks.index')->with('error', 'You are not allowed to edit a task!');
        }
    }

    public function update(Request $request, Task $task)
    {
        /** @var User $user */
        $user = auth()->user();

        if($user->can('update tasks')){
            $task->update([
                'name' => $request->get('name'),
                'text' => $request->get('text'),
                'picture' => $request->get('picture'),
                'subject_id' => $request->get('subject_id'),
            ]);

            return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
        }else{
            return redirect()->route('tasks.index')->with('error', 'You are not allowed to edit a task!');
        }
    }

    public function destroy(Task $task)
    {
        /** @var User $user */
        $user = auth()->user();

        if($user->can('delete tasks')){
            $task->delete();

            return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
        }else{
            return redirect()->route('tasks.index')->with('error', 'You are not allowed to delete a task!');
        }
    }
}
