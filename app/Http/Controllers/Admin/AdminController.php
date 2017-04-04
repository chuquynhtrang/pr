<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserProject;
use App\Models\Project;
use Cloudder;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userRegisted = UserProject::all()->groupBy('user_id')->count();
        $userUnRregistered = User::whereRole(0)->count() - $userRegisted;
        $projectRegisted = UserProject::all()->groupBy('project_id')->count();
        $projectUnRegistered = Project::all()->count() - $projectRegisted;

        return view('admin.dashboard.index', compact('userRegisted', 'userUnRregistered', 'projectRegisted', 'projectUnRegistered'));
    }

    public function profile(User $user)
    {
        return view('admin.profile', compact('user'));
    }

    public function updateProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($request->hasFile('avatar')) {
            $filename = $request->avatar;
            Cloudder::upload($filename, config('common.path_cloud_avatar') . $user->email);
            $user->avatar = Cloudder::getResult()['url'];
        }

        $user->name = $request->name;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->date_of_birth = $request->date_of_birth;
        $user->gender = $request->gender;
        $user->save();

        return redirect('/admin/profile/'. $user->id)->withSuccess('Cập nhật ảnh thành công');
    }
}
