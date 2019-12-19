<?php

namespace App\Http\Controllers\Admin;

use App\Model\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ramsey\Uuid\Uuid;

class SliderController extends Controller
{
    public function index() {
        $sliders = Slider::orderBy('sort')->paginate(10);

        return view('admin.slider.all', compact('sliders'));
    }

    public function add() {
        return view('admin.slider.add');
    }

    public function addPost(Request $request) {
        $messages = [
            'image.dimensions' => 'The image dimension should be 2000x1333 px',
        ];

        $request->validate([
            'image' => 'required|image|dimensions:width=2000,height=1333',
            'heading' => 'max:191',
            'subheading' => 'max:191',
            'sort' => 'required|integer|min:1'
        ], $messages);

        // Upload Image
        $file = $request->file('image');
        $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
        $destinationPath = 'public/uploads/slider';
        $file->move($destinationPath, $filename);

        $slider = new Slider();
        $slider->sort = $request->sort;
        $slider->image = $filename;
        $slider->heading = $request->heading;
        $slider->subheading = $request->subheading;
        $slider->save();

        return redirect()->route('admin_all_slider')->with('message', 'Slider add successfully.');
    }

    public function edit(Slider $slider) {
        return view('admin.slider.edit', compact('slider'));
    }

    public function editPost(Slider $slider, Request $request) {
        $messages = [
            'image.dimensions' => 'The image dimension should be 2000x1333 px',
        ];

        $request->validate([
            'image' => 'image|dimensions:width=2000,height=1333',
            'heading' => 'max:191',
            'subheading' => 'max:191',
            'sort' => 'required|integer|min:1'
        ], $messages);

        if ($request->image) {
            unlink('public/uploads/slider/' . $slider->image);

            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/slider';
            $file->move($destinationPath, $filename);

            $slider->image = $filename;
        }

        $slider->sort = $request->sort;
        $slider->heading = $request->heading;
        $slider->subheading = $request->subheading;
        $slider->save();

        return redirect()->route('admin_all_slider')->with('message', 'Slider update successfully.');
    }

    public function delete(Request $request) {
        $slider = Slider::find($request->id);
        unlink('public/uploads/slider/'.$slider->image);
        $slider->delete();
    }
}
