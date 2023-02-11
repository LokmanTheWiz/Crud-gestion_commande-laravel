<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class Fournisseurecontroller extends Controller
{
    public function __construct() 
    { 
        $this->authorizeResource(Client::class, 'fournisseur'); 
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fournisseurs = Fournisseur::paginate(5);;
        return view('achat.fournisseurs.index', ['fournisseurs'=>$fournisseurs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('achat.fournisseurs.create');
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
                'nom' => 'required',
                'telephone' => 'required',
                'email' => 'required|email',
                'ville' => 'required',
                'adresse' => 'required'
            ]);
        }

        Fournisseur::create($request->post());
        session()->flash('success', 'La création du fournisseur a été effectuée avec succès !');
        return redirect()->route('fournisseur.index')->with(['message' => 'Fournisseur created uccessfuly!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Fournisseur $fournisseur)
    {
        return view('achat.fournisseurs.show', ['fournisseur' => $fournisseur]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Fournisseur $fournisseur)
    {
        return view('achat.fournisseurs.edit', ['fournisseur' => $fournisseur]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fournisseur $fournisseur)
    {
        $request->validate([
            'nom' => 'required',
            'telephone' => 'required',
            'email' => 'required|email',
            'ville' => 'required',
            'adresse' => 'required'
        ]);

        $fournisseur->fill($request->post())->save();
        session()->flash('success', 'La modification du fournisseur a été effectuée avec succès !');
        return redirect()->route('fournisseur.index')->with(['message' => 'Fournisseur updated uccessfuly!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fournisseur $fournisseur)
    {
        $fournisseur->delete();
        session()->flash('success', 'La suppression de fournisseur a été effectuée avec succès !');
        return redirect()->route('fournisseur.index')->with(['message' => 'Fournisseur deleted uccessfuly!']);
    }
}
