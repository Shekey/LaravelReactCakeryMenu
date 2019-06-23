@extends('layouts.app')

@section('content')
<div class="container home">
    <div class="row justify-content-center">
        <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <a href="{{url('/create/kategorija')}}" class="btn btn-default">Kreiraj kategoriju</a>
                <a href="{{url('/create/podkategorija')}}" class="btn btn-default">Kreiraj podkategoriju</a>
                <a href="{{url('/create/artikal')}}" class="btn btn-default">Kreiraj artikal</a>
                <a href="{{url('/kategorije')}}" class="btn btn-default">Sve kategorije</a>
                <a href="{{url('/podkategorije')}}" class="btn btn-default">Sve podkategorije</a>
                <a href="{{url('/artikli')}}" class="btn btn-default">Svi Artikli</a>
        </div>
    </div>
</div>
@endsection
