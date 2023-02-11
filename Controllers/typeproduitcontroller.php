<?php

namespace App\Http\Controllers;

use App\Models\TypeProduit;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class TypeProduitController extends Controller
{
    public function __construct() 
    { 
        $this->authorizeResource(Client::class, 'typeproduit'); 
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeproduits = TypeProduit::paginate(5);
        return view('achat.typeproduit.index', ['typeproduits' => $typeproduits]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('achat.typeproduit.create');
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
                'created_at' => 'required' 
            ]);
        }
        TypeProduit::create($request->post());
        return redirect()->route('typeproduit.index')->with(['message' => 'Product type has been created successfuly!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TypeProduit $typeproduit)
    {
        return view('achat.typeproduit.show', ['typeproduit' => $typeproduit]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,TypeProduit $typeProduit)
    {
        $typeProduit = TypeProduit::find($id);
        return view('achat.typeproduit.edite', ['typeProduit' => $typeProduit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeProduit $typeProduit)
    {

        $typeProduit->fill($request->post())->save();
        session()->flash('success', 'Product type updated uccessfuly!');
        return redirect()->route('typeproduit.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeProduit $typeproduit)
    {
        $typeproduit->delete();
        return redirect()->route('typeproduit.index')->with(['notice' => 'Product type deleted uccessfuly!']);
    }
}