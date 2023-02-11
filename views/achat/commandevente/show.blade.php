@extends('layouts.app')
@section('content')
<div class="container">                                                                                                                           
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <form action="" method="post">
                        @method('PUT')
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="">Client id:</label>
                            <input type="text" name="telephone" value="{{$commandevente->id}}" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Date commande :</label>
                            <input type="text" name="telephone" value="{{$commandevente->dateCom}}" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Nom client:</label>
                            <input type="text" name="nom" value="{{$commandevente->client->nom}} {{$commandevente->client->prenom}}" class="form-control" disabled> 
                        </div>
                        <br>
                        <a href="{{route('commandevente.index')}}" class="btn btn-primary">Go back</a> 
                    </form>

                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Libelle </th>
                                <th>Quantite</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($commandevente->produits as $prod)
                                <tr>
                                    <th>
                                        {{$prod->libelle}}
                                    </th>
                                    <th>               
                                        {{$prod->pivot->qtStock}}
                                    </th>
                            </tr>
                        @endforeach 
                        </tbody>
                    </table>
                    <br/>
                </div>
                </div>
            </div>
            <hr>
            <h2>Ajoute Produit </h2>
            <form action="{{route('lignecommandevente.store')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Commande vente id:</label>
                            <input class="form-control" type="text" value="{{$commandevente->id}}" disabled name="commande_vente_id">
                        
                    </div>
                    
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Select produit:</label>
                        <select class="form-select" aria-label="Default select example" name="produit_id"> 
                        <option value="">
                        </option>
                        @foreach($produit as $prod)
                        <option value="{{$prod->id}}">
                        {{$prod->libelle}}
                        </option>
                        @endforeach
                    </select>    
                    
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Quantite : </label>
                    <input type="number" class="form-control"  name="qt" >
                    @error('qt')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <br>
                <input type="submit" value="Add new product" class="btn btn-success">
            </form>
        </div>
    </div>
</div>
@endsection