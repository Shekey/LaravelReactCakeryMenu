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
            <form method="post" action="{{url('/create/artikal')}}">
                <div class="form-group">
                    <input type="hidden" value="{{csrf_token()}}" name="_token" />
                    <label for="title">Naziv arikla:</label>
                    <input type="text" class="form-control" name="title" />
                </div>
                <div class="form-group">
                    <input type="hidden" value="{{csrf_token()}}" name="_token" />
                    <label for="desc">Opis:</label>
                    <textarea class="form-control" name="desc"></textarea>
                </div>
                <select name="podkategorija_id" id="podkategorija_id" class="form-control">
                    @foreach($podKategorije as $podkategorija)
                        <option value="{{ $podkategorija->id }}">{{$podkategorija->naziv}}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Kreiraj</button>
            </form>
        </div>
    </div>
</div>
@endsection