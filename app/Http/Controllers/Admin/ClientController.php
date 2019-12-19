<?php

namespace App\Http\Controllers\Admin;

use App\Model\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ramsey\Uuid\Uuid;

class ClientController extends Controller
{

    public function allClient(){

        $data['clients']=Client::paginate(8);

        return view('admin.client.all_client',$data);
    }
    public function addClientForm(){

        return view('admin.client.add_client');
    }

    public function addClient(Request $request){
        $this->validate($request,[
            'name'=>'required|max:50',
            'image'=>'required|image',
        ]);

        $file = $request->file('image');
        $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
        $destinationPath = 'public/uploads/client';
        $file->move($destinationPath, $filename);


        $client = new Client();
        $client->name = $request->name;
        $client->image =$filename;

        $client->save();

        return redirect()->route('all.client')->with('message', 'Add client successfully.');

    }

    public function editClient(Client $client){

        return view('admin.client.edit_client',compact('client'));
    }

    public function updateClient(Client $client,Request $request){
        $this->validate($request,[
            'name'=>'required|max:50',
            'image'=>'image',
        ]);

        if ($request->image) {
            unlink('public/uploads/client/'.$client->image);
            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/client/';
            $file->move($destinationPath, $filename);
            $client->image= $filename;
        }
        $client->name = $request->name;
        $client->update();

        return redirect()->route('all.client')->with('message', 'Client update successfully.');

    }

    public function deleteClient(Request $request){
        $client = Client::find($request->id);
        unlink('public/uploads/client/'.$client->image);
        $client->delete();
    }
}
