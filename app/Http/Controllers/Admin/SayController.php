<?php

namespace App\Http\Controllers\Admin;

use App\Model\Say;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ramsey\Uuid\Uuid;

class SayController extends Controller
{
    public function index() {
        $says = Say::paginate(10);

        return view('admin.say.all', compact('says'));
    }

    public function add() {
        return view('admin.say.add');
    }

    public function addPost(Request $request) {
        $request->validate([
            'image' => 'required|image',
            'author' => 'required|max:191',
            'designation' => 'required|max:191',
            'description' => 'required'
        ]);

        // Upload Image
        $file = $request->file('image');
        $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
        $destinationPath = 'public/uploads/says';
        $file->move($destinationPath, $filename);

        $say = new Say();
        $say->author = $request->author;
        $say->designation = $request->designation;
        $say->image = $filename;
        $say->description = $request->description;
        $say->save();

        return redirect()->route('admin_all_say')->with('message', 'Say add successfully.');
    }

    public function edit(Say $say) {
        return view('admin.say.edit', compact('say'));
    }

    public function editPost(Say $say, Request $request) {
        $request->validate([
            'image' => 'image',
            'author' => 'required|max:191',
            'designation' => 'required|max:191',
            'description' => 'required'
        ]);

        if ($request->image) {
            unlink('public/uploads/says/' . $say->image);

            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/says';
            $file->move($destinationPath, $filename);

            $say->image = $filename;
        }

        $say->author = $request->author;
        $say->designation = $request->designation;
        $say->description = $request->description;
        $say->save();

        return redirect()->route('admin_all_say')->with('message', 'Say update successfully.');
    }

    public function delete(Request $request) {
        $say = Say::find($request->id);
        unlink('public/uploads/says/'.$say->image);
        $say->delete();
    }
}
