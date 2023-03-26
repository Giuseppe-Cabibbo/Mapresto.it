<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home(){
        $announcements = Announcement::where('is_accepted', true)->take(6)->get()->sortByDesc('created_at');
        return view('welcome', compact('announcements'));
    }

    public function categoryShow(Category $category){
        return view('categoryShow', compact('category'));
    }

    public function contact(){
        return view('contact');
    }
}
