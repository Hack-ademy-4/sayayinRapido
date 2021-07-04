<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(){

        $announcements = Announcement::where('is_accepted',true)->orderByDesc('created_at')->take(5)->get();

        return view("welcome",compact('announcements'));
        
    }

    public function AnnouncementsByCategory($category_id) {

        $categories = Category::findOrFail($category_id);
        $announcements = $categories->announcements()->where('is_accepted',true)->orderByDesc('created_at')->paginate(10);
        
        session()->now("secondTitle", $categories->name);
        return view("welcome",compact('announcements'));
    }

    public function locale($locale) {
        
        session()->put('locale',$locale);
        return redirect()->back();
    }

    public function search(Request $r) {

        $q = $r->query('search');
        //dd($q);
        $announcements = Announcement::search($q)
            ->where('is_accepted', true)
            ->get();
        return view('search_results', compact('q', 'announcements'));
    }
}
