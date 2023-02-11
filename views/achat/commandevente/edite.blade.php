@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('commandevente.update',['commandevente'=>$commandevente])}}" method="POST">
                    @method('PUT')
                    {{csrf_field()}}
                    <label for="exampleInputEmail1" class="form-label">Select client:</label>
                    <br>
                    <select class="form-select" aria-label="Default select example" name="client_id"  disabled> 
                        {{ $number_toget_id_client = $commandevente->client->id }}
                        @foreach ($clients as $client)
                        <option value="{{$client->id}}"
                        @if ( $number_toget_id_client == $client->id)
                            selected="selected"
                        @endif
                        >
                            {{ $client->nom }} {{ $client->prenom }}
                        </option>
                        @endforeach
                    </select>
                    <br/>
        
                    <label for="exampleInputEmail1" class="form-label">Date : </label>
                    <input type="date" class="form-control"  name="dateCom" value="{{ old('dateCom') }}">
                    <br>
            {{--  @errour('name')
            <div></div>  --}}
                    <div class="form-group">
                        <input type="submit" name="btn-sub" class="btn btn-warning" value="Modify">

                        <a href="{{route('commandevente.index')}}" class="btn btn-success">Go back</a>
                    
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection