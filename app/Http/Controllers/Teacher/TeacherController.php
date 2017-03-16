<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Cloudder;

class TeacherController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	return redirect('teacher/projects');
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

        return redirect('/teacher/profile/'. $user->id)->withSuccess('Cập nhật ảnh thành công');
    }
}
