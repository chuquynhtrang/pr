<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cloudder;
use App\Models\User;
use Excel;

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

    public function importExcel(Request $request, $role)
    {
        if ($request->hasFile('fileUser')) {
            // dd('aaa');
            $path = $request->file('fileUser')->getRealPath();
            $userExcel = Excel::load($path)->get();
            if (!empty($userExcel) && $userExcel->count()) {
                foreach ($userExcel as $num => $row) {
                    foreach ($row as $key => $value) {
                        $insert[] = [
                            'user_code' => $value->user_code,
                            'name' => $value->name,
                            'email' => $value->email,
                            'password' => bcrypt('123456'),
                            'date_of_birth' => $value->date_of_birth,
                            'gender' => $value->gender,
                            'address' => $value->address,
                            'phone' => $value->phone,
                            'avatar' => 'images/default.png',
                            'class' => $value->class,
                            'course' => $value->course,
                            'workplace' => $value->workplace,
                            'position' => $value->position,
                            'score' => $value->score,
                            'role' => $role,
                            'created_at' => date('Y-m-d h:i:s'),
                            'updated_at' => date('Y-m-d h:i:s'),
                        ];
                    }
                }

                if (!empty($insert)) {
                    $user = new User();
                    $user->insert($insert);
                }
            }
        }

        return redirect('admin/users/'. $role)->withSuccess('Import thành công');
    }
}