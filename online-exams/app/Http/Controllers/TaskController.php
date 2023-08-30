<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request){
        $task = new Task([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'picture' => $request->get('picture'),
            'subject_id' => $request->get('subject_id'),
        ]);
        $task->save();

        return redirect('tasks.index')->with('success', 'Task saved!');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit($id)
    {
        return view('tasks.edit');
    }

    public function update(Request $request, Task $task)
    {
        $task->update([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'picture' => $request->get('picture'),
            'subject_id' => $request->get('subject_id'),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}
