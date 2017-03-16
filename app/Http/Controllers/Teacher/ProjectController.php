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
        $checkButton = false;
        if (Auth::user()->position == 0 && count($projects) == 3) {
            $checkButton = true;
            $message = "Bạn đã thêm tối đa 3 đề tài!";
        }

        if(Auth::user()->position == 1 && count($projects) == 5) {
            $checkButton == true;
            $message = "Bạn đã thêm tối đa 5 đề tài!";
        }

    	return view('teacher.projects.index', compact('projects', 'checkButton', 'message'));
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
        if($request->hasFile('references')) {
            $name = $request->file('references');
            $filename = $name->getClientOriginalName();
            $request->file('references')->move(base_path() . '/public/uploads/references', $filename);
            $project->references = $filename;
        }

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

        $project->name = $request->name;
        $project->description = $request->description;
        if($request->hasFile('references')) {
            $name = $request->file('references');
            $filename = $name->getClientOriginalName();
            $request->file('references')->move(base_path() . '/public/uploads/references', $filename);
            $project->references = $filename;
        }

        $project->save();

        return redirect('/teacher/projects')->withSuccess('Cập nhật đề tài thành công!');
    }

    public function destroy($id)
    {
        $project = Project::find($id);

        if (!$project) {
            return redirect('/teacher/projects')
                ->withErrors(['message' => 'Không tìm thấy đề tài']);
        }

        $project->delete();
        unlink('uploads/references/' . $project->references);

        return redirect('/teacher/projects')->withSuccess('Xóa đề tài thành công!');
    }
}
