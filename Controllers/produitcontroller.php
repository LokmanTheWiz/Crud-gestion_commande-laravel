<?php

namespace App\Http\Controllers;

use App\Models\CommandeVente; 
use App\Models\Client; 
use App\Models\Produit; 
use App\Models\Typeproduit; 

use Illuminate\Http\Request;

class produitcontroller extends Controller
{
    public function __construct() 
    { 
        $this->authorizeResource(Client::class, 'produit'); 
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits = Produit::paginate(5);
        return view('achat.produit.index',compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeproduits = Typeproduit::all();
        return view('achat.produit.create',compact('typeproduits'));
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
                'libelle' => 'required',
                'typeproduit_id' => 'required',
                'prix' => 'required',
                'qtStock' => 'required',
                'description' => 'required',
                'img' => 'required'
            ]);
            $input = $request->all();
            if($request ->hasFile('image')){
                $destination_path = 'public/images/products';
                $image = $request->file('image'); 
                $image_name = $image->getClientOriginalName();
                $path = $request->file('image')->storeAS('$destination_path','$image_name');
                $input['image'] = $image_name;
            }
            }
        
        Produit::create($request->post()); 
        return redirect()->route('produit.index')->with(['message' => 'Product created uccessfuly!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {
        $produit = Produit::find($id);
        return view('achat.produit.show',compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Typeproduit $typeproduits)
    {
        $produit = Produit::find($id);
        return view('achat.produit.edite',compact('produit','typeproduits'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Produit $produit)
    {
        $produit->fill($request->post())->save(); 
        return redirect()->route('produit.index')->with('notice','The modification has been made'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produit $produit)
    {
        $produit->delete(); 
        // return redirect()->route('clients.index')->withSuccess('Student data has been deleted succesfuly'); 
        return redirect()->route('produit.index')->with('success','Client has been deleted succesfuly'); 

    }
}
