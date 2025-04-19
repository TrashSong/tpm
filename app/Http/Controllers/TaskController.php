<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    public function index(Project $project)
    {
        $tasks = $project->tasks()->with('user')->latest()->simplePaginate(5);

        return view('tasks.index', [
            'tasks' => $tasks,
            'project' => $project
        ]);
    }

    public function create(Project $project)
    {
        $users = $project->users()->get();
        
        return view('tasks.create', [
            'users' => $users,
            'project' => $project
        ]);
    }

    public function show(Project $project, Task $task)
    {
        abort_unless($task->project_id == $project->id, 404);

        return view('tasks.show', [
            'task' => $task,
            'project' => $project
        ]); // view for specific project task page
    }

    public function store(Project $project)
    {
        request()->validate([
            'name' => ['required'],
            'description' => ['required'],
            'status' => ['required', Rule::in(['pending', 'in_progress', 'completed'])],
            'user_id' => ['required']
        ]);
    
        $task = Task::create([
            'name' => request('name'),
            'description' => request('description'),
            'status' => request('status'),
            'user_id' => request('user_id'),
            'project_id' => $project->id
        ]);
    
        return redirect()->route('tasks.index', $project);
    }

    public function edit(Project $project, Task $task)
    {
        abort_unless($task->project_id == $project->id, 404);

        $users = $project->users()->get();

        return view('tasks.edit', [
            'task' => $task,
            'users' => $users,
            'project' => $project
        ]); // view for task edit page
    }

    public function update(Project $project, Task $task)
    {
        request()->validate([
            'name' => ['required'],
            'description' => ['required'],
            'status' => ['required', Rule::in(['pending', 'in_progress', 'completed'])],
            'user_id' => ['required']
        ]);
    
        $task->update([
            'name' => request('name'),
            'description' => request('description'),
            'status' => request('status'),
            'user_id' => request('user_id')
        ]);
    
        return redirect()->route('tasks.show', [$project, $task]);
    }

    public function destroy(Project $project, Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index', $project);
    }
}
