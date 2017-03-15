<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Auth;

class ProjectController extends Controller
{
    public function index()
    {
    	$projects = Project::all();

    	return view('teacher.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('teacher.projects.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:projects',
        ]);

        $project = new Project();
        $project->name = $request->name;
        $project->description = $request->description;
        $project->teacher_id = Auth::user()->id;
        $project->save();

        return redirect('/teacher/projects')->withSuccess('Create Class Successfully!');
    }


    public function edit($id)
    {
        $project = Project::find($id);

        if (!$project) {
            return redirect('/teacher/projects')
                ->withErrors(['message' => 'Not found class']);
        }

        return view('teacher.projects.edit')->with(
            [
                'project' => $project,
                'action' => url('/teacher/projects/'. $project->id),
                'input' => '<input name="_method" type="hidden" value="PUT">',
            ]
        );
    }

    public function update(Request $request, $id)
    {
        $project = Project::find($id);

        if (!$project) {
            return redirect('/teacher/projects')
                ->withErrors(['message' => 'Not found class']);
        }

        $this->validate($request, [
            'name' => 'required|unique:projects',
        ]);

        $request = $request->only('name');
        $project->update($request);

        return redirect('/teacher/projects')->withSuccess('Update Class Successfully!');
    }

    public function destroy($id)
    {
        $project = Project::find($id);

        if (!$project) {
            return redirect('/teacher/projects')
                ->withErrors(['message' => 'Not found class']);
        }

        $project->delete();

        return redirect('/teacher/projects')->withSuccess('Delete Class Successfully!');
    }
}
