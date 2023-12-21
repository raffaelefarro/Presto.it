<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\BecameRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index_show(){

        $announcement_to_check = Announcement::where('is_accepted', null)->get();
        $announcement_rejected = Announcement::where('is_accepted', 0)->get();
        $announcement_accepted = Announcement::where('is_accepted', 1)->get();

        // $announcement_to_check = Announcement::where('is_accepted', null)->first();
        return view('revisor.index_show', compact('announcement_to_check', 'announcement_rejected', 'announcement_accepted'));
    }

    public function review_announcement(Announcement $announcement){
        $announcement->setAccepted(null);
        return redirect()->back()->with('message', "L'annuncio è stato inserito come da revisionare");
    }

    public function accept_announcement(Announcement $announcement){
        $announcement->setAccepted(true);
        return redirect()->back()->with('message', "L'annuncio è stato approvato");
    }

    public function reject_announcement(Announcement $announcement){
        $announcement->setAccepted(false);
        return redirect()->back()->with('message', "L'annuncio è stato rifiutato");
    }
    
    public function revisor_request(Request $request){
        $email = Auth::user()->email;
        $nome= $request->input('nome');
        $cognome= $request->input('cognome');
        $testo= $request->input('testo');

        Mail::to('admin@presto.it')->send(new BecameRevisor($nome,$cognome,$testo,$email));
        return redirect()->back()->with('message',"La richiesta è stata inviata");
    }

    public function revisor_accept($email){
    Artisan::call('presto:makeUserRevisor',[
        "email"=>$email
    ]);
    return redirect('/')->with('revisor_message',"Complimenti Hai reso revisore l'utente");

    }

}
