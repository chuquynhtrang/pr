<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\UserProject;
use Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $check = false;

    	$projects = Project::all();
        $user = UserProject::where('user_id', Auth::user()->id)->get();
        if ($user->count()) {
            $check = true;
        }

    	return view('user.projects.index', compact('projects', 'check', 'user'));
    }

    public function show($id)
    {
        $check = false;
    	$project = Project::find($id);
        $user = UserProject::where('user_id', Auth::user()->id)->get();
        //check user da dang ki de tai nao chua
        if ($user->count()) {
            $check = true;
        }

        $userProject = UserProject::where('project_id', $id)->get();
        // dd($userProject);

    	return view('user.projects.show', compact('project', 'userProject', 'check'));
    }

    public function register(Request $request, $projectId)
    {
        $userProject = new UserProject();

        $userProject->user_id = Auth::user()->id;
        $userProject->project_id = $projectId;
        $userProject->status = 1;
        $userProject->save();

        return redirect('user/projects')->withSuccess('Bạn đăng kí đề tài thành công! Hãy chờ phê duyệt');
    }
}
