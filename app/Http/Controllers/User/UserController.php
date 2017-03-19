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

class UserController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	return redirect('user/projects');
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

        return redirect('/user/profile/'. $user->id)->withSuccess('Cập nhật ảnh thành công');
    }

    public function progress()
    {
        $userProjects = UserProject::where('user_id', Auth::user()->id)->where('status', 2)->orderBy('id', 'desc')->get();
        $diaries = Diary::whereUserId(Auth::user()->id)->orderBy('created_at', 'desc')->limit(3)->get();

        return view('user.projects.progress', compact('userProjects', 'diaries'));
    }

    public function updateProgress(Request $request) 
    {
        $diary = new Diary();
        $diary->progress = $request->progress;
        $diary->note = $request->note;
        if ($request->hasFile('document')) {
            $document = $request->file('document');
            $filename = $document->getClientOriginalName();
            $request->file('document')->move(base_path() . '/public/diaries/', $filename);
            $diary->document = $filename;
        }
        $diary->user_id = Auth::user()->id;

        $diary->save();

        return redirect('/user/progress')->withSuccess('Cập nhật thành công');
    }
}
