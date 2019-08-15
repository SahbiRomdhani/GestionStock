<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProduitSortie;
use App\ProduitStock;
use App\Bsortie;

class ProduitSortieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produitsortie=ProduitSortie::orderBy( 'id','desc')->paginate(7);
        return view('stock.bille.bsortie.produitsortie.index',compact( 'produitsortie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $sortie=bsortie::pluck('id','id')->all();
        $stock=ProduitStock::pluck('id','id')->all();
        return view('stock.bille.bsortie.produitsortie.create',compact( 'sortie', 'stock'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProduitSortie::create($request->all());
        return redirect(route('produitsortie.index'));
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
        $prod= ProduitSortie::find($id);
        $prod->delete();
        return redirect(route('produitsortie.index'));
    }
}
