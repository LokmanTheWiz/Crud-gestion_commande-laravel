@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-body">
                        <div>
                            <div class="form-group">
                                <label for="">Numéro fournisseur :</label>
                                <input type="text" name="prenom" value="{{ $fournisseur->id }}" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Nom fournisseur  :</label>
                                <input type="text" name="prenom" value="{{ $fournisseur->nom }}" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Tele fournisseur :</label>
                                <input type="text" name="prenom" value="{{ $fournisseur->telephone }}" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Email fournisseur  :</label>
                                <input type="text" name="prenom" value="{{$fournisseur->email }}" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Ville fournisseur :</label>
                                <input type="text" name="prenom" value="{{ $fournisseur->ville }}" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Adresse fournisseur :</label>
                                <input type="text" name="prenom" value="{{ $fournisseur->adresse }}" class="form-control" disabled>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Numero Commande</th>
                    <th>Date de commande</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fournisseur->comandeAchats as $cmd)
                    <tr>
                        <td><a href="{{ route('commandeachat.show', $cmd->id) }}">{{ $cmd->id }}</a>
                        </td>
                        <td>{{ $cmd->dateCom }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
