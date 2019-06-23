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
            <form method="post" action="{{url('/create/podkategorija')}}" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" value="{{csrf_token()}}" name="_token" />
                    <label for="title">Naziv podkategorije:</label>
                    <input type="text" class="form-control" name="title" />
                </div>
                <select name="kategorija_id" id="kategorija_id" class="form-control">
                    @foreach($kategorije as $kategorija)
                        <option value="{{ $kategorija->id }}">{{$kategorija->naziv}}</option>
                    @endforeach
                </select>
                <div class="form-group">
                    <label>Izaberi fajl za upload</label>
                    <input type="file" name="select_file" class="form-control" />
                </div>
                <button type="submit" class="btn btn-primary">Kreiraj</button>
            </form>
        </div>
    </div>
</div>
@endsection