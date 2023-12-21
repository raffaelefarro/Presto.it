<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function welcome () {

        $rand_categories = Category::orderByRaw('RAND()')->take(4)->get();
        $categories = Category::all();
        $announcements = Announcement::where("is_accepted", true)->orderBy('created_at', 'DESC')->take(3)->get(); 
        return view('welcome', compact('announcements', 'categories', 'rand_categories'));
    }
    public function revisor_create(){
        return view('revisor_create');
    }

    public function announcement_search(Request $request){
        $announcements = Announcement::search($request->searched)->where("is_accepted", true)->orderBy('created_at', 'DESC')->paginate(6);
        return view ('announcements.announcement_index', compact('announcements'));
    }

    public function user_profile(User $user){
        $announcements = Announcement::where('user_id', $user->id)->where('is_accepted', 1)->orderBy('created_at', 'DESC')->paginate(6);
        return view('users.show_profile', compact('announcements', 'user'));
    }

    public function set_languages($lang){
        session()->put('locale', $lang);
        return redirect()->back();
    }

    // Public rotte del footernpm
    public function diritti_utente(){
        return view('rottefooter.diritti_utente');
    }

    public function protezione_dati(){
        return view('rottefooter.protezione_dati');
    }

    public function normative_generali(){
        return view('rottefooter.normative_generali');
    }

    public function chi_siamo(){
        return view('rottefooter.chi_siamo');
    }
}
