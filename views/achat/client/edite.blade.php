@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('clients.update',['client'=>$client])}}" method="post">
                    @method('PUT')
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="">Nom :</label>
                        <input type="text" name="nom" value="{{$client->nom}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Prenom :</label>
                        <input type="text" name="prenom" value="{{$client->prenom}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Numero de telephone :</label>
                        <input type="text" name="telephone" value="{{$client->telephone}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">ville :</label>
                        <input type="text" name="ville" value="{{$client->ville}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Adresse :</label>
                        <input type="text" name="adresse" value="{{$client->adresse}}" class="form-control">
                    </div>
                        <br/>
                    <div class="form-group">
                        <input type="submit" name="btn-sub" class=" btn btn-warning" value="Modify">
                        <a href="{{route('clients.index')}}" class="btn btn-success">Go back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection