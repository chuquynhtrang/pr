<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\UserProject;
use Auth;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $projects = Project::whereOldProject(0)->get();

    	return view('admin.projects.index', compact('projects'));
    }

    public function getPoints()
    {
    	$points = UserProject::whereStatus(2)->get();

    	return view('admin.projects.point', compact('points'));
    }

    public function editPoint($id)
    {
    	$point = UserProject::find($id);

    	return view('admin.projects.editpoint', compact('point'));
    }

    public function updatePoint(Request $request, $id)
    {
    	$this->validate($request, [
            'point' => 'numeric|min:0|max:10',
        ]);
    	$point = UserProject::find($id);

    	$point->point = $request->point;
    	$point->save();

    	return redirect('admin/points')->withSuccess('Cập nhật điểm thành công');
    }

    public function getOldProjects()
    {
        $projects = Project::whereOldProject(1)->get();

        return view('admin.projects.old-project', compact('projects'));
    }

    public function createOldProject()
    {
        return view('admin.projects.create');
    }

    public function storeOldProject(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:projects',
        ]);

        $project = new Project();
        $project->name = $request->name;
        $project->description = $request->description;
        $project->teacher_id = Auth::user()->id;
        $project->old_project = 1;
        if($request->hasFile('references')) {
            $name = $request->file('references');
            $filename = $name->getClientOriginalName();
            $request->file('references')->move(base_path() . '/public/uploads/references', $filename);
            $project->references = $filename;
        }

        $project->save();

        return redirect('/admin/old-projects')->withSuccess('Thêm đề tài thành công!');
    }

    public function editOldProject($id)
    {
        $project = Project::find($id);

        if (!$project) {
            return redirect('/admin/old-projects')
                ->withErrors(['message' => 'Không tìm thấy tên đề tài']);
        }

        return view('admin.projects.edit')->with(
            [
                'project' => $project,
                'action' => url('/admin/old-projects/'. $project->id),
                'input' => '<input name="_method" type="hidden" value="PUT">',
            ]
        );
    }

    public function updateOldProject(Request $request, $id)
    {
        $project = Project::find($id);

        if (!$project) {
            return redirect('/admin/old-projects')
                ->withErrors(['message' => 'Không tìm thấy tên đề tài']);
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

        return redirect('/admin/old-projects')->withSuccess('Cập nhật đề tài thành công!');
    }

    public function destroyOldProject($id)
    {
        $project = Project::find($id);

        if (!$project) {
            return redirect('/admin/old-projects')
                ->withErrors(['message' => 'Không tìm thấy đề tài']);
        }

        $project->delete();
        unlink('uploads/references/' . $project->references);

        return redirect('/admin/old-projects')->withSuccess('Xóa đề tài thành công!');
    }

    public function show($id)
    {
        $project = Project::find($id);
        $user = UserProject::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $userWait = UserProject::where('project_id', $id)->where('status', 1)->get();
        $userReceive = UserProject::where('project_id', $id)->where('status', 2)->get();

        return view('admin.projects.show', compact('project', 'userWait', 'userReceive'));
    }
}
