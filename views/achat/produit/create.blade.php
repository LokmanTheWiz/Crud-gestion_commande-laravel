@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('produit.store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <br>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Select Type produit:</label>
                        <select name="typeproduit_id"> 
                            <option value="">
                            </option>
                            @foreach($typeproduits as $c)
                            <option value="{{$c->id}}">
                            {{$c->libelle}}
                            </option>
                            @endforeach
                        </select>    
                        
                    </div>
                    <br>
                    <div class="row">
                        
                            <label>{{ __('Libelle') }}</label>
                            <input type="input" name="libelle" value="{{ old('libelle') }}"
                                class="form-control mb-1 @error('prix') is-invalid @enderror">
        
                            <div>
                                @error('libelle')
                                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <label>{{ __('Prix Produit') }}</label>
                            <input type="number" name="prix" value="{{ old('prix') }}"
                                class="form-control mb-1 @error('prix') is-invalid @enderror">
        
                            <div>
                                @error('prix')
                                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        
        
                        
                            <label>{{ __('La quantite en stock') }}</label>
                            <input type="number" name="qtStock" value="{{ old('qtStock') }}"
                                class="form-control mb-1 @error('qtStock') is-invalid @enderror">
                            <div>
                                @error('qtStock')
                                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
              
                    <div class="row">
                        <div class="col-lg-12">
                            <label>{{ __('Description') }}</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id=""
                                cols="30" rows="5">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="alert alert-danger text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label>{{ __('Image Produit') }}</label>
                            <input type="file" name="img" value="{{ old('image') }}"
                                class="form-control mb-1 @error('image') is-invalid @enderror" id="image">
                            @error('image')
                                <div class="alert alert-danger text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                        {{--  @errour('name')
                        <div></div>  --}}
                        <div class="form-group">
                            <input type="submit" name="btn-sub" class="btn btn-primary" value="Register">
                        </div>
                </form>
            </div>
        </div>
    </div> 
@endsection