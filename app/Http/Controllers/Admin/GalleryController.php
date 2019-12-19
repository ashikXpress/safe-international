<?php

namespace App\Http\Controllers\Admin;

use App\Model\GalleryItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ramsey\Uuid\Uuid;
use Image;

class GalleryController extends Controller
{
    public function index() {
        $images = GalleryItem::paginate(10);

        return view('admin.gallery.all', compact('images'));
    }

    public function add() {
        return view('admin.gallery.add');
    }

    public function addPost(Request $request) {
        $request->validate([
            'image' => 'required|image',
            'title' => 'required|max:255'
        ]);

        // Upload Image
        $file = $request->file('image');
        $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
        $destinationPath = 'public/uploads/gallery';
        $file->move($destinationPath, $filename);

        // Thumbs
        $img = Image::make($destinationPath.'/'.$filename);
        $img->resize(400, 400);
        $img->save(public_path('public/uploads/gallery/thumbs/'.$filename), 100);

        $galleryItem = new GalleryItem();
        $galleryItem->title = $request->title;
        $galleryItem->image = $filename;
        $galleryItem->save();

        return redirect()->route('admin_all_gallery_item')->with('message', 'Gallery item add successfully.');
    }

    public function edit(GalleryItem $item) {
        return view('admin.gallery.edit', compact('item'));
    }

    public function editPost(GalleryItem $item, Request $request) {
        $request->validate([
            'image' => 'image',
            'title' => 'required|max:255'
        ]);

        if ($request->image) {
            unlink('public/uploads/gallery/' . $item->image);
            unlink('public/uploads/gallery/thumbs/' . $item->image);

            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/gallery';
            $file->move($destinationPath, $filename);

            // Thumbs
            $img = Image::make($destinationPath.'/'.$filename);
            $img->resize(400, 400);
            $img->save(public_path('public/uploads/gallery/thumbs/'.$filename), 100);

            $item->image = $filename;
        }

        $item->title = $request->title;
        $item->save();

        return redirect()->route('admin_all_gallery_item')->with('message', 'Gallery item update successfully.');
    }

    public function delete(Request $request) {
        $item = GalleryItem::find($request->id);
        unlink('public/uploads/gallery/'.$item->image);
        unlink('public/uploads/gallery/thumbs/'.$item->image);
        $item->delete();
    }
}
