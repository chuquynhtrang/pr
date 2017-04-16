<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserProject;
use App\Models\Project;
use App\Models\Diary;
use Cloudder;
use DB;
use Hash;

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
        $userUnRegistered = User::whereRole(0)->count() - $userRegisted;
        $projectRegisted = UserProject::all()->groupBy('project_id')->count();
        $projectUnRegistered = Project::all()->count() - $projectRegisted;
        $projects = Project::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))->groupBy('date')->get()->toArray();
        $dateProject = array_column($projects, 'date');
        $countProject = array_column($projects, 'count');
        $diaries = Diary::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))->groupBy('date')->get()->toArray();
        $dateDiary = array_column($diaries, 'date');
        $countDiary = array_column($diaries, 'count');
        // dd(json_encode($dateDiary));

        return view('admin.dashboard.index', compact(
            'userRegisted',
            'userUnRegistered',
            'projectRegisted',
            'projectUnRegistered',
            'dateProject',
            'countProject',
            'dateDiary',
            'countDiary'
            )
        );
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

        return redirect('/admin/profile/'. $user->id)->withSuccess('Cập nhật thành công');
    }

    public function changePassword($id)
    {
        $user = User::find($id);

        return view('change-password', compact('user'));
    }

    public function updatePassword(Request $request, $id)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required',
            're_password' => 'required',
        ]);

        $user = User::find($id);
        if (!Hash::check($request->old_password, $user->password)) {
            return redirect('/admin/change-password/' . $user->id)->withErrors('Mật khẩu cũ không đúng');
        } elseif ($request->new_password != $request->re_password) {
            return redirect('/admin/change-password/' . $user->id)->withErrors('Mật khẩu mới không khớp');
        } else {
            $user->password = bcrypt($request->new_password);
            $user->save();

            return redirect('/admin/change-password/'. $user->id)->withSuccess('Đổi mật khẩu thành công');
        }
    }
}
