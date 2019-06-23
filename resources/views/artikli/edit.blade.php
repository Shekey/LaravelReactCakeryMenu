@extends('layouts.app')

@section('content')
<div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
        <form method="post" action="{{action('ArtikliController@update', $id)}}" >
            {{csrf_field()}}
            <input name="_method" type="hidden" value="PATCH">
            
            <div class="form-group">
                <input type="hidden" value="{{csrf_token()}}" name="_token" />
                <label for="title">Naziv artikla</label>
                <input type="text" class="form-control" name="title" value={{$artikal->naziv}} />
            </div>

            <div class="form-group">
                <input type="hidden" value="{{csrf_token()}}" name="_token" />
                <label for="desc">Opis</label>
                <textarea class="form-control" name="desc">{{$artikal->opis}}</textarea>
            </div>
            <select name="podkategorija_id" id="podkategorija_id" class="form-control">
                @foreach($podKategorije as $podkategorija)
                @if($podkategorija->id == $artikal->podkategorija_id)
                    <option value="{{ $podkategorija->id }}" selected>{{$podkategorija->naziv}}</option>
                @else 
                    <option value="{{ $podkategorija->id }}">{{$podkategorija->naziv}}</option>
                @endif

                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Obnovi</button>
            </form>
         </div>
    </div>
</div>
@endsection