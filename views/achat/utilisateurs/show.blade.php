@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
    <div class="col-md-12">
                <div class="card shadow">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nom :</label>
                        <input type="text" name="nom" value="{{$utilisateur->name}}" class="form-control" disabled>
                    </div>
                    {{-- <div class="form-group">
                        <label for="">Prenom :</label>
                        <input type="text" name="nom" value="{{$utilisateur->prenom}}" class="form-control" disabled>
                    </div> --}}
                    <div class="form-group">
                        <label for="">Email :</label>
                        <input type="text" name="nom" value="{{$utilisateur->email}}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Type :</label>
                        <input type="text" name="nom" value="{{$utilisateur->type}}" class="form-control" disabled>
                    </div>
                    
                    
                    {{-- <div class="d-flex justify-content-around">
                            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-outline-secondary">Modifier</a>
                            <small class="text-muted text-center">{{ $client->created_at->diffForHumans() }}</small>
                    </div> --}}
                </div>
            </div>
            <br>
            {{-- <table class="table ">
                <thead>
                    <tr>
                        <th>Numero Commande</th>
                        <th >Date de commande</th>
                    </tr>
                </thead>
                <tbody> --}}
                    {{-- @foreach ($client->commandeVentes as $cmd)
                        <tr>
                            <td><a href="{{ route('commandeVentes.show', $cmd->id) }}">{{ $cmd->id }}</a></td>
                            <td>{{ $cmd->dateCom }}</td>
                        </tr>
                    @endforeach --}}
                {{-- </tbody>
                </table> --}}
            </div>
        </div>
        
            <div>
                <a class="btn btn-primary" href="{{ route('clients.index') }}">Voir Les Clients</a>
            </div>
            
    
    </div>
@endsection

