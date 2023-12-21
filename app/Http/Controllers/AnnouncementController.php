<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->except('announcement_index', 'category_show', 'announcement_show');
    }

    public function announcement_create(){
        return view('announcements.announcement_create');
    }

    public function announcement_index(){
        $announcements = Announcement::where("is_accepted", 1)->orderBy('created_at', 'DESC')->paginate(6);
        return view('announcements.announcement_index', compact('announcements'));
    }

    public function announcement_show(Announcement $announcement){
        return view('announcements.announcement_show', compact('announcement'));
    }

    public function category_show(Category $category){

        $announcements = Announcement::where("is_accepted", 1)->where("category_id", $category->id)->orderBy('created_at', 'DESC')->paginate(6);

        return view('announcements.category_show', compact('category', 'announcements'));
    }
}
