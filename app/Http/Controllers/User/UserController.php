<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserProject;
use App\Models\Project;
use App\Models\Diary;
use Cloudder;
use Auth;
use Hash;

class UserController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	return redirect('user/news');
    }

    public function profile(User $user)
    {
        return view('user.profile', compact('user'));
    }

    public function updateProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($request->hasFile('avatar')) {
            $filename = $request->avatar;
            Cloudder::upload($filename, config('common.path_cloud_avatar') . $user->email);
            $user->avatar = Cloudder::getResult()['url'];
        }

        $user->user_code = $request->user_code;
        $user->name = $request->name;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->date_of_birth = $request->date_of_birth;
        $user->gender = $request->gender;
        $user->course = $request->course;
        $user->class = $request->class;
        $user->score = $request->score;
        $user->save();

        return redirect('/user/profile/'. $user->id)->withSuccess('Cập nhật thành công');
    }

    public function progress()
    {
        $userProjects = UserProject::where('user_id', Auth::user()->id)->where('status', 2)->orderBy('id', 'desc')->get();
        $diaries = Diary::whereUserId(Auth::user()->id)->orderBy('created_at', 'desc')->limit(3)->get();

        return view('user.projects.progress', compact('userProjects', 'diaries'));
    }

    public function updateProgress(Request $request)
    {
        $this->validate($request, [
            'progress' => 'required|numeric',
        ]);

        $diary = new Diary();
        $diary->progress = $request->progress;
        $diary->complete = $request->complete;
        $diary->not_complete = $request->not_complete;
        $diary->advantage = $request->advantage;
        $diary->difficult = $request->difficult;
        $diary->expected = $request->expected;
        $diary->user_id = Auth::user()->id;

        $diary->save();

        return redirect('/user/progress')->withSuccess('Cập nhật thành công');
    }

    public function showDiary($diaryId)
    {
        $userProject = UserProject::with('project', 'user')->where('user_id', Auth::user()->id)->where('status', 2)->orderBy('id', 'desc')->get();
        $diary = Diary::find($diaryId);

        return view('user.customizeform', compact('userProject', 'diary'));
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
