<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use Auth;

class NewController extends Controller
{
    public function index()
    {
    	return view('admin.news.index');
    }

    public function store(Request $request) {
    	$new = new News();
    	$new->title = $request->title;
    	$new->body = $request->body;
    	$new->user_id = Auth::user()->id;
    	$new->save();

    	return redirect('/admin/news')->withSuccess('Thêm tin tức thành công!');
    }

    public function show() {
    	$news = News::all();

    	return view('admin.news.show', compact('news'));
    }
}
