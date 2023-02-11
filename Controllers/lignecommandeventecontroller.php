<?php

namespace App\Http\Controllers;

use App\Models\CommandeVente;
use App\Models\LigneCommandeVente;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class LigneCommandeVenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ligneCommandeVentes = LigneCommandeVente::paginate(5);
        Paginator::useBootstrap();
        return view('ligneCommandeVentes.index', ['ligneCommandeVentes' => $ligneCommandeVentes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produits = Produit::all();
        $commandeVentes = CommandeVente::all();
        return view('ligneCommandeVentes.create', ['produits' => $produits, 'commandeVentes' => $commandeVentes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            $request->validate([
                'commande_vente_id'=> 'required',
                'produit_id' => 'required',
                'qt' => 'required',
            ]);
        
        LigneCommandeVente::create($request->post());
        return Redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(LigneCommandeVente $ligneCommandeVente)
    {
        return view('ligneCommandeVentes.show', ['ligneCommandeVente' => $ligneCommandeVente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(LigneCommandeVente $ligneCommandeVente)
    {
        $commandeVentes = CommandeVente::all();
        $produits = Produit::all();
        return view('ligneCommandeVentes.edit', ['ligneCommandeVente' => $ligneCommandeVente, 'commandeVentes' => $commandeVentes, 'produits' => $produits]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LigneCommandeVente $ligneCommandeVente)
    {
        $request->validate([
            'commandeVente_id' => 'required',
            'produit_id' => 'required',
            'qt' => 'required',
        ]);

        $ligneCommandeVente->fill($request->post())->save();

        return redirect()->route('ligneCommandeVentes.index')->with(['message' => 'LigneCommandeVente updated uccessfuly!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(LigneCommandeVente $ligneCommandeVente)
    {
        $ligneCommandeVente->delete();

        return redirect()->route('ligneCommandeVentes.index')->with(['message' => 'ligneCommandeVente deleted uccessfuly!']);
    }
}