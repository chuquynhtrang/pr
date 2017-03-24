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
        $projects = Project::whereTeacherId(Auth::user()->id)->get();
        // dd($project);
        foreach ($projects as $project) {
            $userProjects[] = UserProject::whereProjectId($project->id)->whereStatus(2)->get();
        }
        
        foreach ($userProjects as $key => $value) {
            foreach($value as $up) {
                $diaries[] = Diary::whereUserId($up->user_id)->get();
            }
        }
        
        return view('teacher.users.progress', compact('projects', 'diaries'));

    }
}
