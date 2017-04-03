<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserProject;
use App\Models\User;
use App\Models\Project;
use App\Models\Diary;
use Auth;

class UserController extends Controller
{
    public function wait()
    {
    	$projects = Project::where('teacher_id', Auth::user()->id)->get();
    	$userProjects = UserProject::where('status', 1)->get();

    	return view('teacher.users.wait', compact('userProjects', 'projects'));
    }

    public function receive()
    {
    	$projects = Project::where('teacher_id', Auth::user()->id)->get();
        $userProjects = UserProject::where('status', 2)->get();

        return view('teacher.users.receive', compact('userProjects', 'projects'));
    }

    public function show($id)
    {
        $user = User::find($id);

        return view('teacher.users.show', compact('user'));
    }

    public function progress()
    {
        $projects = UserProject::with(['project' => function ($query) {
            $query->whereTeacherId(Auth::user()->id);
        }])->whereStatus(2)->get();
        foreach ($projects as $project) {
            $diaries[] = Diary::whereUserId($project->user_id)->orderBy('created_at', 'desc')->limit(3)->get();
        }

        return view('teacher.users.progress', compact('projects', 'diaries'));

    }
}
