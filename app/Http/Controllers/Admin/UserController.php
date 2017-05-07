<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserProject;
use App\Models\User;
use App\Models\Project;
use App\Models\Diary;
use Cloudder;
use Excel;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $user->user_code = $request->user_code;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt('123456');
        $user->date_of_birth = $request->date_of_birth;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->role = $role;
        if ($role == 0) {
            $user->course = $request->course;
            $user->class = $request->class;
            $user->score = $request->score;
        } elseif ($role == 2) {
            $user->workplace = $request->workplace;
            $user->rank = $request->rank;
            $user->position = $request->position;
        }

        $user->save();

        return redirect('/admin/users/'. $role)->withSuccess('Thêm người dùng thành công');
    }

    public function edit(Request $request, $role, $id) 
    {
        $user = User::find($id);

        return view('admin.users.edit', compact('role', 'user'));
    }

    public function update(Request $request, $role, $id) 
    {
        $user = User::find($id);
        $user->user_code = $request->user_code;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->date_of_birth = $request->date_of_birth;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->role = $role;
        if ($role == 0) {
            $user->course = $request->course;
            $user->class = $request->class;
            $user->score = $request->score;
        } elseif ($role == 2) {
            $user->workplace = $request->workplace;
            $user->rank = $request->rank;
            $user->position = $request->position;
        }

        $user->save();

        return redirect('/admin/users/'. $role)->withSuccess('Cập nhật người dùng thành công');
    }

    public function show($role, $id)
    {
        $user = User::find($id);

        return view('admin.users.show', compact('role', 'user'));
    }

    public function delete($role, $id)
    {
        $user = User::find($id);

        $userProjects = UserProject::whereUserId($id)->get();

        $diaries = Diary::whereUserId($id)->get();

        $projects = Project::whereTeacherId($id)->get();

        if (!$user) {
            return redirect('/admin/users/' . $role)
                ->withErrors(['message' => 'Không tìm thấy']);
        }

        if(count($userProjects)) {
            foreach($userProjects as $userProject) {
                $userProject->delete();
            }
        }

        if(count($diaries)) {
            foreach ($diaries as $diary) {
                $diary->delete();
            }
        }

        if(count($projects)) {
            foreach ($projects as $project) {
                $up = UserProject::whereProjectId($project->id)->get();
                if (count($up)) {
                    $di = Diary::whereUserId($up->user_id)->get();
                    if(count($di)) {
                        foreach ($di as $di) {
                            $di->delete();
                        }
                    }
                }
                if(count($up)) {
                    foreach ($up as $up) {
                        $up->delete();
                    }
                }

                $project->delete();
            }
        }
        $user->delete();
        return redirect('/admin/users/' . $role)->withSuccess('Xóa thành công!');
    }

    public function importExcel(Request $request, $role)
    {
        if ($request->hasFile('fileUser')) {
            $path = $request->file('fileUser')->getRealPath();
            $userExcel = Excel::load($path)->get();
            if (!empty($userExcel) && $userExcel->count()) {
                foreach ($userExcel as $num => $row) {
                    foreach ($row as $key => $value) {
                        $insert[] = [
                            'user_code' => $value->manguoidung,
                            'name' => $value->hovaten,
                            'email' => $value->email,
                            'password' => bcrypt('123456'),
                            'date_of_birth' => $value->ngaysinh,
                            'gender' => $value->gioitinh,
                            'address' => $value->diachi,
                            'phone' => $value->sodienthoai,
                            'avatar' => config('common.image_default'),
                            'class' => $value->lophoc,
                            'course' => $value->khoahoc,
                            'workplace' => $value->noilamviec,
                            'rank' => $value->capbac,
                            'position' => $value->hocvi,
                            'score' => $value->diemtrungbinh,
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

    public function progress()
    {
        $userProjects = UserProject::whereStatus(2)->get();

        return view('admin.progress', compact('userProjects'));
    }
}
