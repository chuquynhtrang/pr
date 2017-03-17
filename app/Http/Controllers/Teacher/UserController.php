<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserProject;
use App\Models\User;
use App\Models\Project;
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
    	return 'bbb';
    }

    public function show($id)
    {
        $user = User::find($id);

        return view('teacher.users.show', compact('user'));
    }
}
