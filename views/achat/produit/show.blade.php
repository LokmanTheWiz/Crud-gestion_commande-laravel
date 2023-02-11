@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="form-group">
                            <img src="{{ asset($produit->image) }}" style="width:50px; height:50px">
                        </div>
                        <div class="form-group">
                            <label for="">libellé du produit :</label>
                            <input type="text" name="nom" value="{{$produit->libelle}}" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">type produit :</label>
                            <input type="text" name="nom" value="{{$produit->typeproduit->libelle}}" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">prix :</label>
                            <input type="text" name="nom" value="{{$produit->prix}}" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Qt stock :</label>
                            <input type="text" name="nom" value="{{$produit->qtStock}}" class="form-control" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
