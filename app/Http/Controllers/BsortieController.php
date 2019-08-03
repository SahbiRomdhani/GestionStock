<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bsortie;
use App\Demandereap;
use App\Maintenance;

class BsortieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $bsortie=bsortie::orderBy('id','desc')->get();
        return view('stock.bille.bsortie.index',compact('bsortie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $demandereap=Demandereap::pluck('date','id')->all();
        $maintenance=Maintenance::pluck('date','id')->all();
        return view( 'stock.bille.bsortie.create',compact('demandereap', 'maintenance'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        bsortie::create($request->all());
        return redirect('bsortie');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sortie=bsortie::find($id);
        $sortie->delete();
        return redirect( route('bsortie.index'));
    }
}
