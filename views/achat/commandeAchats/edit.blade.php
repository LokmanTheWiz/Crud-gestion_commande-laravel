@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{route('commandeachat.update' , $commandeachat->id ) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12">
                <select name="fournisseur_id" id="nomPrenomFournisseur"  class="form-select mb-1 @error('client_id') is-invalid @enderror">
                    {{ $number_toget_fournisseur_id = $commandeachat->fournisseur->id }}
                    @foreach ($fournisseurs as $fournisseur)
                        <option value="{{  $fournisseur->id }}"
                        @if ( $number_toget_fournisseur_id == $fournisseur->id)
                            selected="selected"
                        @endif
                        >
                            {{ $fournisseur->nom }}
                        </option>
                    @endforeach
                </select>
                @error('client_id')
                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12">
                <input type="datetime-local" name="dateCom" id="" value="{{ $commandeachat->dateCom }}" class="form-control mb-1 @error('dateCom') is-invalid @enderror" >
                <div>
                    @error('dateCom')
                        <div class="alert alert-danger text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <button class="btn btn-warning"  type="submit" >Modifier</button>
    </form>
</div>
@endsection
