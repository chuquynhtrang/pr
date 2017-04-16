<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Cloudder;
use Hash;

class TeacherController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	return redirect('teacher/news');
    }

    public function profile(User $user)
    {
        return view('teacher.profile', compact('user'));
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
        $user->workplace = $request->workplace;
        $user->position = $request->position;
        $user->save();

        return redirect('/teacher/profile/'. $user->id)->withSuccess('Cập nhật thành công');
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
