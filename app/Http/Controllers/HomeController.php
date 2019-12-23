<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Model\Client;
use App\Model\GalleryItem;
use App\Model\JarBottle;
use App\Model\Machine;
use App\Model\Member;
use App\Model\Menu;
use App\Model\News;
use App\Model\Project;
use App\Model\Say;
use App\Model\Slider;
use App\Model\SubMenu;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $sliders = Slider::orderBy('sort')->get();
        $projects = Project::latest()->take(3)->get();
        $newses = News::latest()->take(3)->get();
        $members=Member::latest()->take(3)->get();


        return view('home', compact('sliders', 'projects', 'newses', 'members'));
    }

    public function page($slug) {
        $item = Menu::where('slug', $slug)->first();

        if (!$item) {
            $item = SubMenu::where('slug', $slug)->first();
        }

        if (!$item)
            abort(404);

        return view('page', compact('item'));
    }

    public function project($type) {
        if ($type == 'complete') {
            $projects = Project::where('type', 'Complete')->paginate(9);
        } elseif ($type == 'ongoing') {
            $projects = Project::where('type', 'Ongoing')->paginate(9);
        } elseif ($type == 'upcoming') {
            $projects = Project::where('type', 'Upcoming')->paginate(9);
        } else {
            abort(404);
        }

        return view('project', compact('projects', 'type'));
    }

    public function projectDetails($id) {
        $project = Project::findOrFail($id);

        return view('project_details', compact('project'));
    }

    public function gallery() {
        $items = GalleryItem::paginate(16);

        return view('gallery', compact('items'));
    }

    public function clients(){
        $data['clients']=Client::paginate(20);
        return view('clients',$data);
    }

    public function news() {
        $newses = News::latest()->paginate(6);

        return view('news', compact('newses'));
    }

    public function newsDetails($id) {
        $news = News::findOrFail($id);

        return view('news_details', compact('news'));
    }

    public function contact() {
        return view('contact');
    }

    public function contactPost(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ];

        Mail::to('ctashiqkhan@gmail.com')->send(new ContactMail($data));

        return redirect()->back()->with('message', 'Message sent successfully.');
    }

    public function allMachine(){
        $data['machines']=Machine::paginate(8);

        return view('all_machine',$data);
    }
public function machineDetails($id){
        $data['machine']=Machine::findOrFail($id);
        return view('machine_details',$data);
}

public function jarBottle(){

        $data['bottles']=JarBottle::paginate(12);
        return view('jar_bottle',$data);
}


}
