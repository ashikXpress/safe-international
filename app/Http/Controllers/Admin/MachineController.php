<?php

namespace App\Http\Controllers\Admin;

use App\Model\Machine;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use App\Http\Controllers\Controller;

class MachineController extends Controller
{

    public function allMachine(){

        $data['machines']=Machine::paginate(8);

        return view('admin.machine.all_machine',$data);
    }
    public function addMachineForm(){

        return view('admin.machine.add_machine');
    }

    public function addMachine(Request $request){
        $this->validate($request,[
            'model'=>'required|max:255',
            'type'=>'required|max:255',
            'capacity'=>'required|max:255',
            'image1'=>'required|image',
            'image2'=>'required|image',
            'image3'=>'required|image',
            'description'=>'required',
        ]);

        $file = $request->file('image1');
        $filename1 = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
        $destinationPath = 'public/uploads/machine';
        $file->move($destinationPath, $filename1);

        $file = $request->file('image2');
        $filename2 = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
        $destinationPath = 'public/uploads/machine';
        $file->move($destinationPath, $filename2);

        $file = $request->file('image3');
        $filename3 = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
        $destinationPath = 'public/uploads/machine';
        $file->move($destinationPath, $filename3);


        $machine = new Machine();
        $machine->model= $request->model;
        $machine->image1= $filename1;
        $machine->image2= $filename2;
        $machine->image3= $filename3;
        $machine->type = $request->type;
        $machine->capacity = $request->capacity;
        $machine->description =$request->description;

        $machine->save();

        return redirect()->route('all.machine')->with('message', 'Add machine successfully.');

    }

    public function editMachine(Machine $machine){

        return view('admin.machine.edit_machine',compact('machine'));
    }

    public function updateMachine(Machine $machine,Request $request){
        $this->validate($request,[
            'model'=>'required|max:255',
            'type'=>'required|max:255',
            'capacity'=>'required|max:255',
            'image1'=>'image',
            'image2'=>'image',
            'image3'=>'image',
            'description'=>'required',
        ]);

        if ($request->image1) {
            unlink('public/uploads/machine/'.$machine->image1);
            $file = $request->file('image1');
            $filename1 = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/machine/';
            $file->move($destinationPath, $filename1);
            $machine->image1= $filename1;
        }
        if ($request->image2) {
            unlink('public/uploads/machine/'.$machine->image2);
            $file = $request->file('image2');
            $filename2 = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/machine/';
            $file->move($destinationPath, $filename2);
            $machine->image2= $filename2;
        }
        if ($request->image3) {
            unlink('public/uploads/machine/'.$machine->image3);
            $file = $request->file('image3');
            $filename3 = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/machine/';
            $file->move($destinationPath, $filename3);
            $machine->image3= $filename3;
        }


        $machine->model = $request->model;
        $machine->type = $request->type;
        $machine->capacity = $request->capacity;
        $machine->description =$request->description;


        $machine->update();

        return redirect()->route('all.machine')->with('message', 'Machine update successfully.');

    }

    public function deleteMachine(Request $request){
        $machine = Machine::find($request->id);
        unlink('public/uploads/machine/'.$machine->image1);
        unlink('public/uploads/machine/'.$machine->image2);
        unlink('public/uploads/machine/'.$machine->image3);
        $machine->delete();
    }
}
