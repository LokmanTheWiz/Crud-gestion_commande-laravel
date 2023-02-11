@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('commandevente.store')}}" method="POST">
                    {{csrf_field()}}
                    <br>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Select client : </label>
                        <select class="form-select" aria-label="Default select example" name="client_id"> 
                            <option value="">
                            </option>
                            @foreach($client as $c)
                            <option value="{{$c->id}}">
                            {{$c->nom.' '.$c->prenom}}
                            </option>
                            @endforeach
                        </select>      
                        @error('client_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror             
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Date : </label>
                        <input type="date" class="form-control"  name="dateCom" >
                        @error('dateCom')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
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