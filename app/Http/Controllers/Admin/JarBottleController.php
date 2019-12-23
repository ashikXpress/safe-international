<?php

namespace App\Http\Controllers\Admin;

use App\Model\JarBottle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ramsey\Uuid\Uuid;

class JarBottleController extends Controller
{
    public function allBottle(){

        $data['bottles']=JarBottle::paginate(8);

        return view('admin.jar_bottle.all_jar_bottle',$data);
    }
    public function addBottleForm(){

        return view('admin.jar_bottle.add_jar_bottle');
    }

    public function addBottle(Request $request){
        $this->validate($request,[
            'title'=>'required|max:255',
            'price'=>'required',
            'image'=>'required|image',
        ]);

        $file = $request->file('image');
        $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
        $destinationPath = 'public/uploads/bottle';
        $file->move($destinationPath, $filename);



        $bottle = new JarBottle();
        $bottle->title= $request->title;
        $bottle->price= $request->price;
        $bottle->image= $filename;
        $bottle->save();

        return redirect()->route('all.bottle')->with('message', 'Add jar bottle successfully.');

    }

    public function editBottle($id){
        $data['jarBottle']=JarBottle::find($id);

        return view('admin.jar_bottle.edit_jar_bottle',$data);
    }

    public function updateBottle(JarBottle $jarBottle,Request $request){
        $this->validate($request,[
            'title'=>'required|max:255',
            'price'=>'required',
            'image'=>'image',
        ]);

        if ($request->image) {
            unlink('public/uploads/bottle/'.$jarBottle->image);
            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/bottle/';
            $file->move($destinationPath, $filename);
            $jarBottle->image= $filename;
        }
        $jarBottle->title = $request->title;
        $jarBottle->price = $request->price;


        $jarBottle->update();

        return redirect()->route('all.bottle')->with('message', 'Jar bottle update successfully.');

    }

    public function deleteBottle(Request $request){
        $bottle = JarBottle::find($request->id);
        unlink('public/uploads/bottle/'.$bottle->image);
        $bottle->delete();
    }
}
