@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ route('typeproduit.update', $typeProduit->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label>{{ __('Libelle') }}</label>
                <div>
                    <input type="text" name="libelle" value="{{ $typeProduit->libelle }}"
                        class="form-control mb-1 @error('libelle') is-invalid @enderror">
                </div>
                @error('libelle')
                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" class="form-label">Date : </label>
                <input type="date" class="form-control"  name="created_at" >
                @error('created_at')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <button class="btn btn-primary" type="submit">Modifier</button>
        </form>
    </div>
@endsection
