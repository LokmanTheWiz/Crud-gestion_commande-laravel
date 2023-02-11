<?php

namespace App\Http\Controllers;

use App\Models\CommandeAchat;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class CommandeAchatController extends Controller
{
    public function __construct() 
    { 
        $this->authorizeResource(Client::class, 'commandeachat'); 
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commandeAchats = CommandeAchat::paginate(5);
        Paginator::useBootstrap();
        return view('achat.commandeAchats.index', [ 'commandeAchats' => $commandeAchats ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fournisseurs = Fournisseur::all();
        return view('achat.commandeAchats.create', ['fournisseurs' => $fournisseurs]);
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
                'fournisseur_id' => 'required',
                'dateCom' => 'required',
            ]);
        
        CommandeAchat::create($request->post());
        return redirect()->route('commandeachat.index')->with(['message' => 'CommandeAchat created uccessfuly!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $commandeAchats = CommandeAchat::find($id);
        return view('achat.commandeAchats.show', compact('commandeAchats'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CommandeAchat $commandeachat)
    {
        $fournisseurs = Fournisseur::all();
        return view('achat.commandeAchats.edit', ['commandeachat' => $commandeachat, 'fournisseurs' => $fournisseurs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommandeAchat $commandeachat)
    {
        $commandeachat->fill($request->post())->save();
        return redirect()->route('commandeachat.index')->with(['success' => 'commandeAchat updated uccessfuly!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommandeAchat $commandeachat)
    {
        $commandeachat->delete();
        return redirect()->route('commandeachat.index')->with(['notice' => 'CommandeAchat deleted successfuly!']);
    }
}