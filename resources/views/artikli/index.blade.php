@extends('layouts.app')

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
              <td>Title</td>
              <td>Opis</td>
              <td>Podkategorija</td>
              <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($artikli as $artikal)
            <tr>
                <td>{{$artikal->naziv}}</td>
                <td>{{$artikal->opis}}</td>
                <td>{{$artikal->podkategorija->naziv}}</td>
                <td><a href="{{action('ArtikliController@edit',$artikal->id)}}" class="btn btn-primary">Uredi</a></td>
                <td>
                    <form action="{{action('ArtikliController@destroy', $artikal->id)}}" method="post">
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">izbrisi</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection