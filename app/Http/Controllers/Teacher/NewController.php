<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\FileNew;

class NewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$news = News::orderBy('created_at', 'desc')->get();
    	$fileNews = FileNew::all();

    	return view('teacher.news.index', compact('news', 'fileNews'));
    }

    public function show($id)
    {
    	$new = News::find($id);
    	$fileNews = FileNew::all();

    	return view('teacher.news.show', compact('new', 'fileNews'));
    }
}