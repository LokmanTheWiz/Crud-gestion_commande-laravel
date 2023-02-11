@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-body">
                        <div>
                            <div class="form-group">
                                <label for="">Nemero Type Produit :</label>
                                <input type="text" name="prenom" value="{{ $typeproduit->id }}" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Date d'ajout :</label>
                                <input type="text" name="prenom" value="{{ $typeproduit->created_at }}" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Liblle type produit  :</label>
                                <input type="text" name="prenom" value="{{ $typeproduit->libelle }}" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
