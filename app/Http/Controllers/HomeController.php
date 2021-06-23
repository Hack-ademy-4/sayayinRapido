<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $announcements = Announcement::orderByDesc('updated_at')->take(5)->get();

        return view("welcome",compact('announcements'));
        
    }

    public function AnnouncementsByCategory($name,$category_id){
        $categories = Category::find($category_id);
        $announcements = $categories->announcement()->paginate(5);
        
        return view("welcome",compact('category', 'announcements'));
    }
}
