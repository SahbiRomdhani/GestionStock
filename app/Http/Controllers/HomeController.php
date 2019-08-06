<?php

namespace App\Http\Controllers;

use DB;
use App\demande_achat;
use App\ProduitDemandeAchat;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $achat=ProduitDemandeAchat::count();
        $stock=\App\ProduitStock::count();
        $reap=\App\ProduitReap::count();
        return view('home',compact('achat','stock','reap'));
    }
    public function notification(){
        $user = Auth()->user();
        return view('notification.index',compact('user'));
    }
    public function readnot(Request $request){
        
        $user = auth()->user();
        $notifcation=$user->notifications()->where('id', $request->id)->first()->markAsRead();
        
        return $notifcation;
    }
}
