<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\AnnouncementImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AnnouncementRequest;

class AnnounceController extends Controller
{
  
  public function index(){

    $announcements = Auth::user()->Announcements()->paginate(10);

    return view("announcements.index",compact('announcements'));
  }

  public function show(Announcement $announcement){
    return view("announcements.details", compact("announcement"));
  }

  public function create(Request $r){
    $user_token = $r->old("user_token", base_convert(sha1(uniqid(mt_rand())), 16, 36));
    return view("announcements.create", compact("user_token"));
  }

  public function store(AnnouncementRequest $request){
    //dd($request);
    $data = $request->validated();
    $user_token = $request->input("user_token");
    
    $announce = Auth::user()->announcements()->create($data);
    

    // Guardamos imagenes
    $images = session()->get("images.{$user_token}", []);
    $removedImages = session()->get("removedImages.{$user_token}", []);
    $images = array_diff($images, $removedImages);

    foreach($images as $i) // Aqui le llamamos $i en vez de $image, pq es mas corto...
    {
      $amounceImg = new AnnouncementImage;

      $fileName = basename($i);
      $newFilePath = "public/announcements/{$announce->id}/{$fileName}";
      Storage::move($i, $newFilePath);
      
      dispatch(new ResizeImage($newFilePath, 300, 150)); // Aqui lanzamos el job con estos parametros

      $amounceImg->file = $newFilePath;
      $amounceImg->announcement_id = $announce->id;
      $amounceImg->save();
    }
    File::deleteDirectory(storage_path("/app/public/temp/{$user_token}"));

    return redirect()->route("home")->with("msg", "Anuncio subido con éxito a la web");
  }

  public function uploadImages(Request $r) {
    $token = $r->input("user_token");
    $filePath = $r->file('file')->store("public/temp/{$token}");

    dispatch(new ResizeImage($filePath, 120, 120));

    session()->push("images.{$token}", $filePath);
    return response()->json([
      "id" => $filePath,
      "name" => $r->file('file')->getClientOriginalName()
    ]);
  }

  public function removeImages(Request $r) {
    try {
      $user_token = $r->input("user_token");
      $fileName = $r->input("id");
      session()->push("removedImages.{$user_token}", $fileName);
      Storage::delete($fileName);
      return response()->json(["error" => false]);
    } catch (Exception $e) {
      return response()->json(["error" => $e->getMessage()]);
    }
  }

  public function getImages(Request $r) {
    $user_token = array_keys($r->query())[0];
    $images = session()->get("images.{$user_token}", []);
    //dd($user_token);
    $removedImages = session()->get("removedImages.{$user_token}", []);
    $images = array_diff($images, $removedImages);
    $data = [];

    foreach($images as $i) {
      $data[] = [
        "id" => $i,
        "src" => AnnouncementImage::getUrlByFilePath($i, 120, 120),
        "size" => Storage::size($i),
        "name" => basename($i)
      ];
    }

    return response()->json($data);
  }

  public function edit(Request $r, Announcement $announcement){
    $user_token = $r->old("user_token", base_convert(sha1(uniqid(mt_rand())), 16, 36));

    Session::now('edit', $announcement);
    Session::now('_old_input.title', session('_old_input.title', $announcement->title));
    Session::now('_old_input.body', session('_old_input.body', $announcement->body));
    Session::now('_old_input.price', session('_old_input.price', $announcement->price));
    Session::now('_old_input.category_id', session('_old_input.category_id', $announcement->category_id));

    return view("announcements.create", compact("user_token"));

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
