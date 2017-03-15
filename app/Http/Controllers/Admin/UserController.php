<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cloudder;
use App\Models\User;

class UserController extends Controller
{
	public function index($role)
    {
        $users = User::where('role', $role)->get();

        return view('admin.users.index', compact('users', 'role'));
    }

    public function create($role)
    {

        return view('admin.users.create', compact('role'));
    }

    public function store(Request $request, $role)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt('123456');
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->role = $role;
        $user->avatar = 'images/default.png';
        if ($role == 0) {
            $user->course = $request->course;
            $user->class = $request->class;
            $user->score = $request->score;
        } elseif ($role == 2) {
            $user->position = $request->position;
        }

        $user->save();

        return redirect('/admin/users/'. $role)->withSuccess('Create User Successfully!');
    }

    public function show($role, $id)
    {
        $user = User::find($id);

        return view('admin.users.show', compact('role', 'user'));
    }
    public function profile(User $user)
    {
    	return view('admin.users.profile', compact('user'));
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
    	$user->save();

    	return redirect('/admin/profile/'. $user->id)->withSuccess('Cập nhật ảnh thành công');
    }
}
