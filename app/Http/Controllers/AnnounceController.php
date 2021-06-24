<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AnnouncementRequest;
use Illuminate\Support\Facades\View;
use Session;

class AnnounceController extends Controller
{
    
    public function index(){

        $announcements = Auth::user()->Announcements()->paginate(10);

        return view("announcements.index",compact('announcements'));
    }

    public function show(Announcement $announcement){
        return view("announcements.details", compact("announcement"));
    }

    public function create(){
        return view("announcements.create");
    }

    public function store(AnnouncementRequest $request){
        //dd($request);
        $data = $request->validated();
        $announce = Auth::user()->announcements()->create($data);

        return redirect()->route("home")->with("msg", "Anuncio subido con éxito a la web");
    }

    public function edit(Announcement $announcement){
        Session::now('edit',$announcement);
        Session::now('_old_input.title', session('_old_input.title', $announcement->title));
        Session::now('_old_input.body', session('_old_input.body', $announcement->body));
        Session::now('_old_input.price', session('_old_input.price', $announcement->price));
        Session::now('_old_input.category_id', session('_old_input.category_id', $announcement->category_id));

        return view("announcements.create");

    }

    public function update($id, AnnouncementRequest $request){

        $announce = Auth::user()->announcements()->findOrFail($id);

        return redirect()->route("announcements.index")->with("msg","Anuncio actualizado con éxito en la web");
        
    }

    public function destroy(Announcement $announce){

        Auth::user()->announcement()->findOrFail($announce->id)->delete();

        return redirect()->route("announcements.index")->with("msg","Anuncio eliminado con éxito");

    }
}
