<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\FileNew;
use Auth;

class NewController extends Controller
{
    public function index()
    {
    	$news = News::orderBy('created_at', 'desc')->paginate(10);
        $fileNews = FileNew::all();

        return view('admin.news.index', compact('news', 'fileNews'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request) {
    	$new = [
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::user()->id,
        ];

    	$data = News::create($new);
        if ($request->hasFile('file')) {
            $files = $request->file;
            foreach ($files as $key => $fileName) {
                $file = $fileName;
                $filename = $file->getClientOriginalName();
                $fileName->move(base_path() . '/public/uploads/filenews', $filename);
                $news[] = ['name' => $filename, 'new_id' => $data->id];
            }
            FileNew::insert($news);
        }

    	return redirect('/admin/news')->withSuccess('Thêm tin tức thành công!');
    }

    public function show($id) {
    	$new = News::find($id);
        $fileNews = FileNew::all();

        return view('admin.news.show', compact('new', 'fileNews'));
    }

    public function destroy($id)
    {
        $new = News::find($id);

        if (!$new) {
            return redirect('/admin/news/' . $id)
                ->withErrors(['message' => 'Không tìm thấy tin tức']);
        }

        $new->delete();

        return redirect('/admin/news/')->withSuccess('Xóa tin tức thành công!');
    }
}
