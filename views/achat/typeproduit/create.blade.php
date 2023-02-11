@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ route('typeproduit.store') }}" method="POST">
            @csrf
            <div>
                <label>{{ __('Libelle') }}</label>
                <div>
                    <input type="text" name="libelle" value="{{ old('libelle') }}"
                        class="form-control mb-1 @error('liblle') is-invalid @enderror">
                </div>
                @error('liblle')
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
            <button class="btn btn-success mt-1" type="submit">Create</button>
        </form>
    </div>
@endsection
