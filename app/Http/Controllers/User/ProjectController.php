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
        $check = 0;

    	$projects = Project::all();
        $user = UserProject::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        if(count($user)) {
            if ($user[0]->status == 3) {
                $check = 3;
            } else if ($user[0]->status == 1) {
                $check = 1;
            } else if ($user[0]->status == 2) {
                $check = 2;
            }
        }

    	return view('user.projects.index', compact('projects', 'check', 'user'));
    }

    public function show($id)
    {
        $check = 0;
    	$project = Project::find($id);
        $user = UserProject::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        if(count($user)) {
            $checkProject = $user[0]->project_id;
        //check user da dang ki de tai nao chua
            if ($user[0]->status == 3) {
                $check = 3;
            } else if ($user[0]->status == 1) {
                $check = 1;
            } else if ($user[0]->status == 2) {
                $check = 2;
            }
        }

        $userProject = UserProject::where('project_id', $id)->where('status', 1)->get();

    	return view('user.projects.show', compact('project', 'userProject', 'check', 'checkProject'));
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

    public function destroy($userId)
    {
        $userProject = UserProject::where('user_id', $userId)->orderBy('id', 'desc')->get();

        if (!count($userProject)) {
            return redirect('user/projects')
                ->withErrors(['message' => 'Không tìm thấy đề tài của bạn']);
        }

        $userProject[0]->delete();

        return redirect('user/projects')->withSuccess('Hủy đăng kí đề tài thành công');
    }
}
