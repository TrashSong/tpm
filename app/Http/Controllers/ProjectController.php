<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $project = Project::with('users')->latest()->simplePaginate(5);

        return view('projects.index', [
            'projects' => $project
        ]); // view for project listings page
    }

    public function create()
    {
        return view('projects.create'); // view for project creation page
    }

    public function show(Project $project)
    {
        return view('projects.show', ['project' => $project]); // view for specific project page
    }

    public function store()
    {
        request()->validate([
            'name' => ['required'],
            'shortDescription' => ['required']
        ]);
    
        $project = Project::create([
            'name' => request('name'),
            'shortDescription' => request('shortDescription')
        ]);

        $project->users()->attach(Auth::id());
    
        return redirect('/projects/' . $project->id);
    }

    public function edit(Project $project)
    {
        return view('projects.edit', ['project' => $project]); // view for manage project page
    }

    public function update(Project $project)
    {
        request()->validate([
            'name' => ['required'],
            'shortDescription' => ['required']
        ]);
    
        $project->update([
            'name' => request('name'),
            'shortDescription' => request('shortDescription'),
        ]);
    
        return redirect('/projects/' . $project->id);
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect('/projects');
    }
}
