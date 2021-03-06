<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Council;
use DB;

class CouncilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$councils = Council::all();

    	return view('admin.councils.index', compact('councils'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'place' => 'required',
            'time' => 'required',
        ]);

        $council = new Council();
        $input = $request->only('place', 'time', 'user1', 'phone1', 'user2', 'phone2', 'user3', 'phone3', 'user4', 'phone4', 'user5', 'phone5');
        $checkDuplicate = Council::where('place', $input['place'])
            ->where('time', $input['time'])
            ->get();

        if (count($checkDuplicate)) {
            return back()->withErrors('Dữ liệu bạn vừa nhập bị trùng lặp thời gian và địa điểm. Vui lòng nhập lại');
        } else {
            $council->create($input);
        }

        return redirect('/admin/councils')->withSuccess('Thêm thành công!');
    }


    public function edit($id)
    {
        $council = Council::find($id);

        if (!$council) {
            return redirect('/admin/councils')
                ->withErrors(['message' => 'Không tìm thấy']);
        }

        return view('admin.councils.edit')->with(
            [
                'council' => $council,
                'action' => url('admin/councils/'. $council->id),
                'input' => '<input name="_method" type="hidden" value="PUT">',
            ]
        );
    }

    public function update(Request $request, $id)
    {
        $council = Council::find($id);

        if (!$council) {
            return redirect('/admin/councils')
                ->withErrors(['message' => 'Not found council']);
        }

        $this->validate($request, [
            'time' => 'required',
        ]);

        $input = $request->only('place', 'time', 'user1', 'phone1', 'user2', 'phone2', 'user3', 'phone3', 'user4', 'phone4', 'user5', 'phone5');
        $checkDuplicate = Council::where('place', $input['place'])
            ->where('time', $input['time'])
            ->where('id', '<>', $id)
            ->get();

        if (count($checkDuplicate)) {
            return back()->withErrors('Dữ liệu bạn vừa nhập bị trùng lặp thời gian và địa điểm. Vui lòng nhập lại');
        } else {
            $council->update($input);
        }

        return redirect('/admin/councils')->withSuccess('Cập nhật thành công');
    }

    public function destroy($id)
    {
        $council = Council::find($id);

        if (!$council) {
            return redirect('/admin/councils')
                ->withErrors(['message' => 'Not found class']);
        }

        $council->delete();

        return redirect('/admin/councils')->withSuccess('Xóa thành công!');
    }
}
