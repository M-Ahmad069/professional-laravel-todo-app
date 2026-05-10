<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('welcome', compact('tasks'));
    }

    public function store(Request $request)
    {
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'priority' => $request->priority,
            'status' => $request->status,
        ]);

        return redirect('/');
    }

    public function delete($id)
    {
        Task::find($id)->delete();

        return redirect('/');
    }

    public function edit($id)
    {
        $tasks = Task::all();

        $editTask = Task::find($id);

        return view('welcome', compact('tasks', 'editTask'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'priority' => $request->priority,
            'status' => $request->status,
        ]);

        return redirect('/');
    }
}