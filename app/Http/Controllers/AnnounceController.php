<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AnnouncementRequest;

class AnnounceController extends Controller
{
    public function index(){

        $announce = Announcement::all();

        return view("announcements.index",compact('announce'));
    }

    public function show(Announcement $announce){
        return view("announcements.show", compact($announce));
    }

    public function create(){
        return view("announcements.create");
    }

    public function store(AnnouncementRequest $request){
        $data = $request->validated();

        $announce = Auth::user()->announcement()->create($data);

        return redirect()->route("announcements.index")->with("msg", "Anuncio subido con éxito a la web");
    }

    public function edit(Announcement $announce){

        Session::now('edit',$announce);
        Session::now('_old_input.title', session('_old_input.title', $announce->title));
        Session::now('_old_input.body', session('_old_input.body', $announce->body));

        return view("articles.create");

    }

    public function update(Announcement $announce, AnnouncementRequest $request){

        $announce = Auth::user()->announcement()->findOrFail($announce->id);

        return redirect()->route("announcements.index")->with("msg","Anuncio actualizado con éxito en la web");
        
    }

    public function destroy(Announcement $announce){

        Auth::user()->announcement()->findOrFail($announce->id)->delete();

        return redirect()->route("announcements.index")->with("msg","Anuncio eliminado con éxito");

    }
}
