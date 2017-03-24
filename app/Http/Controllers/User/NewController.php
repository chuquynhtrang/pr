<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\FileNew;

class NewController extends Controller
{
    public function index()
    {
    	$news = News::orderBy('created_at', 'desc')->get();
    	$fileNews = FileNew::all();

    	return view('user.news.index', compact('news', 'fileNews'));
    }

    public function show($id)
    {
    	$new = News::find($id);
    	$fileNews = FileNew::all();

    	return view('user.news.show', compact('new', 'fileNews'));
    }
}
