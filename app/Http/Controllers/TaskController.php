<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        if (Auth::check()) {

            $tasks = Task::where('user_id', Auth::id())
                ->latest()
                ->get();

        } else {

            $tasks = collect();
        }

        return view('welcome', compact('tasks'));
    }

    /*
    |--------------------------------------------------------------------------
    | Store Task
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        Task::create([

            'user_id' => Auth::id(),

            'title' => $request->title,

            'description' => $request->description,

            'due_date' => $request->due_date,

            'priority' => $request->priority,

            'status' => $request->status,
        ]);

        return redirect('/dashboard');
    }

    /*
    |--------------------------------------------------------------------------
    | Delete Task
    |--------------------------------------------------------------------------
    */

    public function delete($id)
    {
        $task = Task::where('user_id', Auth::id())
            ->findOrFail($id);

        $task->delete();

        return redirect('/dashboard');
    }

    /*
    |--------------------------------------------------------------------------
    | Edit Task
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $tasks = Task::where('user_id', Auth::id())
            ->latest()
            ->get();

        $editTask = Task::where('user_id', Auth::id())
            ->findOrFail($id);

        return view('welcome', compact('tasks', 'editTask'));
    }

    /*
    |--------------------------------------------------------------------------
    | Update Task
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $task = Task::where('user_id', Auth::id())
            ->findOrFail($id);

        $task->update([

            'title' => $request->title,

            'description' => $request->description,

            'due_date' => $request->due_date,

            'priority' => $request->priority,

            'status' => $request->status,
        ]);

        return redirect('/dashboard');
    }

    /*
    |--------------------------------------------------------------------------
    | Analytics Page
    |--------------------------------------------------------------------------
    */

    public function analytics()
    {
        return view('analytics');
    }

    /*
    |--------------------------------------------------------------------------
    | Profile Page
    |--------------------------------------------------------------------------
    */

    public function profile()
    {
        return view('profile');
    }

    /*
    |--------------------------------------------------------------------------
    | Settings Page
    |--------------------------------------------------------------------------
    */

    public function settings()
    {
        return view('settings');
    }
}