@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ route('produit.update', $produit->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <label>{{ __('libelle Produit') }}</label>
                    <input type="text" name="libelle" value="{{ $produit->libelle }}"
                        class="form-control mb-1 @error('libelle') is-invalid @enderror">

                    <div>
                        @error('libelle')
                            <div class="alert alert-danger text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <label>{{ __('Liblle Type Produit') }}</label>
                    {{-- <select name="type_produit_id"   class="form-select mb-1 @error('type_produit_id') is-invalid @enderror">
                        {{ $num =  $produit->typeproduit->id }}
                        @foreach ($typeproduit as $typeProduit)
                            <option value="{{ $typeProduit->id }}"
                                @if ( $num == $typeProduit->id)
                                    selected="selected"
                                @endif
                                >
                                {{ $typeProduit->liblle }}
                            </option>
                        @endforeach --}}
                    </select>
                    <div>
                        @error('type_produit_id')
                            <div class="alert alert-danger text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <label>{{ __('Prix Produit') }}</label>
                    <input type="number" name="prix" value="{{ $produit->prix }}"
                        class="form-control mb-1 @error('prix') is-invalid @enderror">

                    <div>
                        @error('prix')
                            <div class="alert alert-danger text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <label>{{ __('La quantite en stock') }}</label>
                    <input type="number" name="qtStock" value="{{ $produit->qtStock }}"
                        class="form-control mb-1 @error('qtStock') is-invalid @enderror">
                    <div>
                        @error('qtStock')
                            <div class="alert alert-danger text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <label>{{ __('Description') }}</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="" cols="30" rows="5">{{ $produit->description }}</textarea>
                        @error('description')
                            <div class="alert alert-danger text-danger">{{ $message }}</div>
                        @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <label>Image Produit</label>
                    <input type="file" name="image" value="{{ $produit->image }}"
                    class="form-control mb-1 @error('image') is-invalid @enderror">
                        @error('image')
                            <div class="alert alert-danger text-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div>
                    <img src="{{ asset($produit->image) }}" style="width:150px; height:150px">
                </div>
            </div>
            <button class="btn btn-info mt-1" type="submit">Modifier</button>
        </form>
    </div>
@endsection



