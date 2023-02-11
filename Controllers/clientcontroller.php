<?php

namespace App\Http\Controllers;

use App\Models\CommandeVente; 
use App\Models\Client; 
use App\Models\Produit; 

use Illuminate\Http\Request;

class clientcontroller extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }
    public function __construct() 
    { 
        $this->authorizeResource(Client::class, 'client'); 
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::paginate(5); 
        return view('achat.client.index', [ 'clients' => $clients ]); 
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('achat.client.create');
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
            'nom' => 'required|min:5', 
            'prenom' => 'required',
            'telephone' => 'required',
            'email' => 'required',
            'ville' => 'required',
            'adresse' => 'required'
            ]); 
            
            Client::create($request->post()); 
            return redirect()->route('clients.index')->with('message','Client has been added succefully') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit,Client $client)
    {
        // $commandevente = CommandeVente::findOrFail($id);
        // return view('achat.client.show',['client'=>$client , 'commandevent' =>$commandevent]);
        return view ('achat.client.show', ['client'=>$client,'produit' =>$produit ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        // $client = Client::find($id);
        return view('achat.client.edite',['client'=>$client]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Client $client)
    {         
        $client->fill($request->post())->save(); 
        return redirect()->route('clients.index')->with('notice','The modification has been made'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete(); 
        // return redirect()->route('clients.index')->withSuccess('Student data has been deleted succesfuly'); 
        return redirect()->route('clients.index')->with('success','Client has been deleted succesfuly'); 
    }
}
