@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-body">
                        <div>
                            <div class="form-group">
                                <label for="">Numéro commande :</label>
                                <input type="text" name="prenom" value="{{ $commandeAchats->id }}" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">date commande  :</label>
                                <input type="text" name="prenom" value="{{ $commandeAchats->dateCom }}" class="form-control" disabled>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="">Nom fournisseur : </label>
                                <a style="text-decoration: none"
                                href="{{ route('fournisseur.show', $commandeAchats->fournisseur->id) }}">
                                {{ $commandeAchats->fournisseur->nom }}</a>
                                <br>
                                
                            </div>
                                {{-- <a style="text-decoration: none"
                                href="{{ route('fournisseur.show', $commandeAchat->fournisseur->id) }}">
                                {{ $commandeAchat->fournisseur->nom }}</a></p> --}}
                        </div>
                    </table>
                </div>
            </div>
            <br>
            {{-- <table class="table">
                <thead>
                    <tr>
                        <th scope="col">libelle de Produits</th>
                        <th scope="col">quantite type produit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($commandeAchats->produitAchats as $produit)
                        <tr>
                            <td><a style="text-decoration: none"
                            href="{{ route('produit.show', $produit->id) }}">{{ $produit->libelle }}</a></td>
                            <td>{{ $produit->pivot->qt }}</td>
                        </tr>
                    @endforeach
                </tbody> --}}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
