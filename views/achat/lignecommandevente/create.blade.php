
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('lignecommandevente.store')}}" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Commande vente id:</label>
                            <select class="form-select" aria-label="Default select example" name="commandeVente_id"> 
                            @foreach($commandeVentes as $cmv)
                            <option value="{{$cmv->id}}">
                            {{$cmv->id}}
                            </option>
                            @endforeach
                        </select>
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
                    <input type="submit" value="" class="btn btn-success">
                </form>
            </div>
        </div>
    </div> 
@endsection