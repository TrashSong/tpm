<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $task = Task::with('user')->latest()->simplePaginate(5);

        return view('projects.tasks.index', [
            'tasks' => $task
        ]); // view for project tasks listings page
    }

    public function create()
    {
        return view('projects.tasks.create'); // view for project task creation page
    }

    public function show(Task $task)
    {
        return view('projects.tasks.show', ['task' => $task]); // view for specific project task page
    }

    public function store()
    {
        request()->validate([
            'name' => ['required'],
            'description' => ['required'],
            'status' => ['required'],
            'user_id' => ['required']
        ]);
    
        Task::create([
            'name' => request('name'),
            'description' => request('description'),
            'status' => request('status'),
            'user_id' => request('user_id')
        ]);
    
        return redirect('/projects/{project}/tasks');
    }

    public function edit(Task $task)
    {
        return view('projects.tasks.edit', ['task' => $task]); // view for task edit page
    }

    public function update(Task $task)
    {
        request()->validate([
            'name' => ['required'],
            'description' => ['required'],
            'status' => ['required'],
            'user_id' => ['required']
        ]);
    
        $task->update([
            'name' => request('name'),
            'description' => request('description'),
            'status' => request('status'),
            'user_id' => request('user_id')
        ]);
    
        return redirect('/projects/{project}/tasks/' . $task->id);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect('/projects/{project}/tasks');
    }
}
