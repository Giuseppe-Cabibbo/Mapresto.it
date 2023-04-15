<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home(){
        $announcements = Announcement::where('is_accepted', true)->latest()->take(6)->get();
        return view('welcome', compact('announcements'));
    }

    public function categoryShow(Category $category){
        return view('categoryShow', compact('category'));
    }

    public function contact(){
        return view('contact');
    }

    public function setLocale($lang){
        // dd('$lang');
        session()->put('locale', $lang);
        return redirect()->back();
    }

    public function searchAnnouncements(Request $request) {
        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(10);
        return view('announcements.index', compact('announcements'));
    }
}
