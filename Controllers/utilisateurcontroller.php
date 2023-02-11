<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Models\Client;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;

class UtilisateurController extends Controller
{
    public function __construct() 
    { 
        $this->authorizeResource(Client::class, 'utilisateur'); 
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $utilisateurs = User::paginate(5);
        Paginator::useBootstrap();
        return view('achat.utilisateurs.index', ['utilisateurs' => $utilisateurs]);
    }
    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('achat.utilisateurs.create');
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
                'name' => 'required',
                'prenom' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'type' => 'required'
            ]);
        }

        $utilisateur = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => $request->type,
        ]);
        event(new Registered($utilisateur));
        session()->flash('success', 'La création d utilisateur a été effectuée avec succès !');
        return redirect()->route('utilisateur.index')->with(['success' => 'Utilisateur created uccessfuly!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $utilisateur = User::find($id);
        return view('achat.utilisateurs.show',compact('utilisateur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $utilisateur = User::find($id);
        return view('achat.utilisateurs.edit',compact('utilisateur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        $user->fill($request->post())->save(); 
        return redirect()->route('utilisateur.index')->with('notice','The modification has been made'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Utilisateur $utilisateur)
    {
        $utilisateur->delete(); 
        return redirect()->route('utilisateur.index')->with('message','User has been deleted succesfuly'); 

    }
}