@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="" method="post">
                @method('PUT')
                {{csrf_field()}}
                <div class="form-group">
                    <label for="">Nom :</label>
                    <input type="text" name="nom" value="{{$client->nom}}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="">Prenom :</label>
                    <input type="text" name="prenom" value="{{$client->prenom}}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="">Numero de telephone :</label>
                    <input type="text" name="telephone" value="{{$client->telephone}}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="">ville :</label>
                    <input type="text" name="ville" value="{{$client->ville}}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="">Adresse :</label>
                    <input type="text" name="adresse" value="{{$client->adresse}}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="">Email :</label>
                    <input type="text" name="email" value="{{$client->email}}" class="form-control" disabled>
                </div>
                <br>
                <h3>Liste des commandes</h3>
                    {{-- <br/> --}}
                    
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Commande ID <small>vente</small></th>
                                <th>Date order</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($client->commandeventes as $cl)
                        <tr>
                            <th>
                                <a href="{{route('commandevente.show',$cl->id)}}">
                                    {{$cl->id}}
                                </a>
                            </th>
                            <th>{{$cl->dateCom}}</th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{route('clients.edit',['client'=>$client])}}" class="btn btn-warning">Modify</a>
            <a href="{{route('clients.index')}}" class="btn btn-primary">Go to clients section</a>
            </form>
            
                        
        </div>
    </div>
</div>
@endsection