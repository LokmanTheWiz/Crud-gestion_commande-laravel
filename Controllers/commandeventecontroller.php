<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommandeVente; 
use App\Models\TypeProduit; 
use App\Models\Produit; 
use App\Models\Client; 




class commandeventecontroller extends Controller
{
    public function __construct() 
    { 
        $this->authorizeResource(Client::class, 'commandevente'); 
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Client $client)
    {
        $commandeventes = CommandeVente::paginate(5); 
        return view('achat.commandevente.index', [ 'commandeventes' => $commandeventes,'client' =>$client]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = Client::all();
        return view('achat.commandevente.create',['client'=>$client]);
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
            'client_id' => 'required',
            'dateCom' => 'required'
        ]); 
        
        CommandeVente::create($request->post()); 
        return redirect()->route('commandevente.index')->with('message','The order has been added') ;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit,CommandeVente $commandevente)
    {
        $produit = Produit::all();
        return view('achat.commandevente.show', 
        ['produit' => $produit,
        'commandevente' => $commandevente]); 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CommandeVente $commandevente)
    {
        $clients = Client::all();
        return view('achat.commandevente.edite', ['commandevente' => $commandevente, 'clients' => $clients]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommandeVente $commandevente,Request $request)
    {
        $commandevente->fill($request->post())->save();
        return redirect()->route('commandevente.index')->with(['message' => 'Commande updated successfuly!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommandeVente $commandevente)
    {
        $commandevente->delete(); 
        // return redirect()->route('clients.index')->withSuccess('Student data has been deleted succesfuly'); 
        return redirect()->route('commandevente.index')->with('notice','commande has been deleted succesfuly'); 
    }
}
