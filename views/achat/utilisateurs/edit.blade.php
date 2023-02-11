@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="row">
    <div class="md-12">
        <form action="{{ route('utilisateur.update', $utilisateur->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label>{{ __('Nom') }}</label>
                <div>
                    <input type="text" name="name" value="{{ $utilisateur->name }}"
                        class="form-control ">
                </div>
                @error('nom')
                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label>{{ __('Email') }}</label>
                <div>
                    <input type="email" name="email" value="{{ $utilisateur->email }}"
                        class="form-control">
                </div>
                @error('email')
                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                @enderror
            </div>
            

            <br>

            <div class="form-group">
                <input type="submit" name="btn-sub" class=" btn btn-warning" value="Modify">
            </div>
            

        </form>
    </div>
    <br>
@endsection
