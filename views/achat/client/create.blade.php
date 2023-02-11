@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="{{route('clients.store')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="">Name :</label>
                        <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" autofocus>
                        @error('nom')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Familie name :</label>
                        <input name="prenom"  class="form-control" value="{{ old('prenom') }}">
                        @error('prenom')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Numero de telephone:</label>
                        <input name="telephone"   class="form-control" value="{{ old('telephone') }}">
                        @error('telephone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Ville:</label>
                        <input name="ville"   class="form-control" value="{{ old('ville') }}">
                        @error('ville')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Adresse :</label>
                        <input name="adresse"  class="form-control" value="{{ old('adresse') }}">
                        @error('adresse')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email :</label>
                        <input name="email"  class="form-control" value="{{ old('email') }}">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Password :</label>
                        <input name="pass" type="password" class="form-control" >
                        @error('pass')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                        <br/>
                    <div class="form-group">
                        <input type="submit" name="btn-sub" class="btn btn-primary" value="Register">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection