<?php

namespace App\Http\Controllers\Admin;

use App\Model\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ramsey\Uuid\Uuid;

class TeamController extends Controller
{
    public function allTeamMember(){
        $data['teams']=Member::paginate(8);

        return view('admin.team.all_team_member',$data);
    }


   public function addTeamMemberForm(){

       return view('admin.team.add_member');
   }

   public function addTeamMember(Request $request){
       $request->validate([
           'name' =>'required|max:191',
           'mobile_number' =>'required|max:15',
           'email' =>'email|max:50',
           'designation' => 'required|max:100',
           'image' => 'required|image',

       ]);

       // Upload Image
       $file = $request->file('image');
       $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
       $destinationPath = 'public/uploads/team';
       $file->move($destinationPath, $filename);

       Member::create([
           'name'=>$request->name,
           'mobile_number'=>$request->mobile_number,
           'email'=>$request->email,
           'designation'=>$request->designation,
           'image'=>$filename,
       ]);

       return redirect()->route('all.team.member')->with('message', 'Team member add successfully.');


   }

   public function teamMemberEdit($id){
        $data['team']=Member::find($id);
        return view('admin.team.edit_team_member',$data);
   }

   public function teamMemberUpdate(Member $member,Request $request){

       $request->validate([
           'name' =>'required|max:191',
           'mobile_number' =>'required|max:15',
           'email' =>'required|email|max:50',
           'designation' =>'required|max:100',
           'image' => 'image',

       ]);

       if ($request->image) {
           unlink('public/uploads/team/'.$member->image);

           $file = $request->file('image');
           $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
           $destinationPath = 'public/uploads/team/';
           $file->move($destinationPath, $filename);

           $member->image = $filename;
       }


       $member->name = $request->name;
       $member->mobile_number = $request->mobile_number;
       $member->email = $request->email;
       $member->designation = $request->designation;
       $member->update();


       return redirect()->route('all.team.member')->with('message', 'Team member update successfully.');

   }

   public function teamMemberDelete(Request $request){
       $member = Member::find($request->id);
       unlink('public/uploads/team/'.$member->image);
       $member->delete();
   }
}
