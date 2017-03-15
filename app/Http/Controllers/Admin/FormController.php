<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Form;

class FormController extends Controller
{
    public function index()
    {
    	$forms = Form::all();

    	return view('admin.forms.index', compact('forms'));
    }

    public function upload(Request $request)
    {
    	$form = new Form();

    	if($request->hasFile('form')) {
    		$name = $request->file('form');
    		$filename = $name->getClientOriginalName();
    		$request->file('form')->move(base_path() . '/public/uploads/', $filename);
    		$form->name = $filename;
    		$form->save();
    	}


    	return redirect('/admin/forms')->withSuccess('Thêm biểu mẫu thành công');
    }

    public function destroy($id)
    {
        $form = Form::find($id);

        if (!$form) {
            return redirect('/admin/form')
                ->withErrors(['message' => 'Not found form']);
        }

        $form->delete();
        unlink('uploads/' . $form->name);

        return redirect('/admin/forms')->withSuccess('Delete Form Successfully!');
    }
}
