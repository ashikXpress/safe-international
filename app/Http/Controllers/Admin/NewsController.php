<?php

namespace App\Http\Controllers\Admin;

use App\Model\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ramsey\Uuid\Uuid;

class NewsController extends Controller
{
    public function index() {
        $newses = News::paginate(10);

        return view('admin.news.all', compact('newses'));
    }

    public function add() {
        return view('admin.news.add');
    }

    public function addPost(Request $request) {
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|image',
            'author' => 'required|max:191',
            'file' => 'required|mimes:pdf',
            'upload_date' => 'required',
            'description' => 'required'
        ]);

        // Upload Image
        $file = $request->file('image');
        $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
        $destinationPath = 'public/uploads/news/image';
        $file->move($destinationPath, $filename);

        // Upload File
        $file2 = $request->file('file');
        $filename2 = Uuid::uuid1()->toString().'.'.$file2->getClientOriginalExtension();
        $destinationPath2 = 'public/uploads/news/file';
        $file2->move($destinationPath2, $filename2);

        $news = new News();
        $news->title = $request->title;
        $news->image = $filename;
        $news->author = $request->author;
        $news->filename = $filename2;
        $news->description = $request->description;
        $news->uploaded_at = $request->upload_date;
        $news->save();

        return redirect()->route('admin_all_news')->with('message', 'News add successfully.');
    }

    public function edit(News $news) {
        return view('admin.news.edit', compact('news'));
    }

    public function editPost(News $news, Request $request) {
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'image',
            'author' => 'required|max:191',
            'file' => 'mimes:pdf',
            'upload_date' => 'required',
            'description' => 'required'
        ]);

        if ($request->image) {
            unlink('public/uploads/news/image/' . $news->image);

            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/news/image';
            $file->move($destinationPath, $filename);

            $news->image = $filename;
        }

        if ($request->file) {
            unlink('public/uploads/news/file/' . $news->filename);

            $file = $request->file('file');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/news/file';
            $file->move($destinationPath, $filename);

            $news->filename = $filename;
        }

        $news->title = $request->title;
        $news->author = $request->author;
        $news->description = $request->description;
        $news->uploaded_at = $request->upload_date;
        $news->save();

        return redirect()->route('admin_all_news')->with('message', 'News update successfully.');
    }

    public function delete(Request $request) {
        $news = News::find($request->id);
        unlink('public/uploads/news/image/'.$news->image);
        unlink('public/uploads/news/file/'.$news->filename);
        $news->delete();
    }
}
