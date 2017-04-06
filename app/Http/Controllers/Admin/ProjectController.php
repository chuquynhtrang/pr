<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\UserProject;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

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
}
