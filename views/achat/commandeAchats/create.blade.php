@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('commandeachat.store') }}" method="post">
                    {{csrf_field()}}
                    <select name="fournisseur_id" id=""  class="form-select mb-1 @error('client_id') is-invalid @enderror">
                        @foreach ($fournisseurs as $fournisseur)
                            <option value="{{ $fournisseur->id }}">
                                {{ $fournisseur->nom }}
                            </option>
                        @endforeach
                    </select>
                    <div>
                        @error('fournisseur_id')
                            <div class="alert alert-danger text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="datetime-local" name="dateCom" id="" class="form-control mb-1 @error('dateCom') is-invalid @enderror">
                    <div>
                        @error('dateCom')
                        <div class="alert alert-danger text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" name="btn-sub" class="btn btn-success" value="Register">
                    </div>
                </form>
            </div>
        </div>  
    </div>
@endsection
