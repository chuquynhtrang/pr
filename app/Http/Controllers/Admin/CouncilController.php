<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Council;

class CouncilController extends Controller
{
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
            'name' => 'required|unique:councils',
        ]);

        $council = new Council();
        $name = $request->only('name');
        $council->create($name);

        return redirect('/admin/councils')->withSuccess('Create Council Successfully!');
    }


    public function edit($id)
    {
        $council = Council::find($id);

        if (!$council) {
            return redirect('/admin/councils')
                ->withErrors(['message' => 'Not found council']);
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
            'name' => 'required|unique:councils',
        ]);

        $request = $request->only('name');
        $council->update($request);

        return redirect('/admin/councils')->withSuccess('Update Council Successfully!');
    }

    public function destroy($id)
    {
        $council = Council::find($id);

        if (!$council) {
            return redirect('/admin/councils')
                ->withErrors(['message' => 'Not found class']);
        }

        $council->delete();

        return redirect('/admin/councils')->withSuccess('Delete Council Successfully!');
    }
}
