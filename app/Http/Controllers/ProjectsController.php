<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
        $this->middleware('auth')->except(['index']);
    }

    public function index()
    {
        $projects = Project::all()->where('owner_id', auth()->id());
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    /**
     * Create project
     */
    public function store()
    {
        // validate required values
        $attributes = request()->validate([
            'title' => ['required', 'min:5', 'max:50'],
            'description' => ['required', 'min:10', 'max:150']
        ]);
        $attributes['owner_id'] = auth()->id();
        
        Project::create($attributes);

        return redirect('/projects');
    }

    /**
     * Get project
     */
    public function show(Project $project)
    {
        //abort_if(\Gate::denies('update', $project), 403);
        //abort_unless(\Gate::allows('update', $project), 403);     or
        $this->authorize('view', $project);
        return view('projects.show', compact('project'));
    }

    /**
     * Get project to edit
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));   
    }

    /**
     * Update project
     */
    public function update($id)
    {
        $this->authorize('update', $project);
        $project->update(request(['title', 'description']));
        return redirect('/projects');
    }

    /**
     * Delete project
     */
    public function destroy(Project $project)
    {
        $this->authorize('destroy', $project);
        $project->delete();
        return redirect('/projects');
    }
}
