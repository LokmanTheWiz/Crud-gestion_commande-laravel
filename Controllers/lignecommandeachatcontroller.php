<?php

namespace App\Http\Controllers;

use App\Models\CommandeAchat;
use App\Models\LigneCommandeAchat;
use App\Models\Produit;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;

class LigneCommandeAchatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ligneCommandeAchats = LigneCommandeAchat::paginate(5);
        Paginator::useBootstrap();
        return view('ligneCommandeAchats.index', ['ligneCommandeAchats' => $ligneCommandeAchats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produits = Produit::all();
        $commandeAchats = CommandeAchat::all();
        return view('ligneCommandeAchats.create', ['produits' => $produits, 'commandeAchats' => $commandeAchats]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'commande_achat_id' => 'required',
                'produit_id' => 'required',
                'qt' => 'required',
            ]);
        }
        LigneCommandeAchat::create($request->post());
        session()->flash('success', 'La création de la ligneCommandeAchat achat a été effectuée avec succès !');
        return redirect()->route('ligneCommandeAchats.index')->with(['message' => 'LigneCommandeAchat created uccessfuly!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(LigneCommandeAchat $ligneCommandeAchat)
    {
        return view('ligneCommandeAchats.show', ['ligneCommandeAchat' => $ligneCommandeAchat]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(LigneCommandeAchat $ligneCommandeAchat)
    {
        $commandeAchats = CommandeAchat::all();
        $produits = Produit::all();
        return view('ligneCommandeAchats.edit', ['ligneCommandeAchat' => $ligneCommandeAchat, 'commandeAchats' => $commandeAchats, 'produits' => $produits]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LigneCommandeAchat $ligneCommandeAchat)
    {
        $request->validate([
            'commande_achat_id' => 'required',
            'produit_id' => 'required',
            'qt' => 'required',
        ]);

        $ligneCommandeAchat->fill($request->post())->save();
        session()->flash('success', 'La modification du ligneCommandeAchat a été effectuée avec succès !');
        return redirect()->route('ligneCommandeAchats.index')->with(['message' => 'LigneCommandeAchat updated uccessfuly!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(LigneCommandeAchat $ligneCommandeAchat)
    {
        $ligneCommandeAchat->delete();
        session()->flash('success', 'La suppression du ligneCommandeAchat a été effectuée avec succès !');
        return redirect()->route('ligneCommandeAchats.index')->with(['message' => 'LigneCommandeAchat deleted uccessfuly!']);
    }
}