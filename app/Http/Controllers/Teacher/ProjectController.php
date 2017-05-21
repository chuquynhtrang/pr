<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\UserProject;
use Auth;
use App\Http\Requests\ProjectRequest;
use Session;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$projects = Project::where('teacher_id', Auth::user()->id)->get();

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

    public function store(ProjectRequest $request)
    {
        $project = new Project();
        $project->name = $request->name;
        $project->description = $request->description;
        $project->teacher_id = Auth::user()->id;
        if ($request->hasFile('references')) {
            $name = $request->file('references');
            $filename = $name->getClientOriginalName();
            $request->file('references')->move(base_path() . '/public/uploads/references', $filename);
            $project->references = $filename;
        }

        $project->save();

        return redirect('/teacher/projects')->withSuccess('Thêm đề tài thành công!');
    }


    public function edit($id)
    {
        $project = Project::find($id);

        if (!$project) {
            return redirect('/teacher/projects')
                ->withErrors(['message' => 'Không tìm thấy tên đề tài']);
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
                ->withErrors(['message' => 'Không tìm thấy tên đề tài']);
        }

        $projects = Project::where('name', '<>', $project->name)->get();
        foreach ($projects as $project) {
            if ($request->name == $project->name) {
                Session::flash('error', 'Đề tài này đã được đăng kí');
            }
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

        if (isset($project->references)) {
            unlink('uploads/references/' . $project->references);
        }

        $project->delete();

        return redirect('/teacher/projects')->withSuccess('Xóa đề tài thành công!');
    }

    public function approve($projectId, $userId)
    {
        $notApprove = UserProject::whereProjectId($projectId)->where('user_id', '<>', $userId)->get();
        foreach ($notApprove as $notApprove) {
            $notApprove->status = 3;
            $notApprove->save();
        }

        $userProject = UserProject::whereProjectId($projectId)->whereUserId($userId)->get();
        foreach ($userProject as $userProject) {
            $userProject->status = 2;
            $userProject->save();
        }

        return redirect('teacher/users/receive');
    }

    public function getOldProjects()
    {
        $projects = Project::whereOldProject(1)->get();

        return view('teacher.projects.old-project', compact('projects'));
    }
}
