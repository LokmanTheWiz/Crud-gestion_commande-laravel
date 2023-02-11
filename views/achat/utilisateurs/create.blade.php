@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <form action="{{ route('utilisateur.store') }}" method="POST">
            @csrf
            <div>
                <label>Nom</label>
                <div>
                    <input type="text" name="name" value="{{ old('nom') }}"
                        class="form-control">
                </div>
                @error('nom')
                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label>Prenom</label>
                <div>
                    <input type="text" name="prenom" value="{{ old('prenom') }}"
                    class="form-control">
                </div>
                @error('prenom')
                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label>Email</label>
                <div>
                    <input type="email" name="email" value="{{ old('email') }}"
                    class="form-control">
                </div>
                @error('email')
                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label>Mot de Passe</label>
                <div>
                    <input type="password" name="password" class="form-control">
                </div>
                @error('mdp')
                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label>Type</label>
                <div>
                    <select name="type" class="form-select" aria-label="Default select example">
                        <option value=""></option>
                        <option value="gerant">Gérant</option>
                        <option value="vendeur">Vendeur</option>
                        <option value="magasinier">Magasinier</option>
                    </select>
                </div>
                @error('type')
                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success mt-1" type="submit">Create</button>
        </form>
    </div>
@endsection
