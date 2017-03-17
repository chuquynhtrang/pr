<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Form;

class FormController extends Controller
{
    public function index()
    {
    	$forms = Form::all();

    	return view('user.forms.index', compact('forms'));
    }
}
