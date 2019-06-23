@extends('layouts.app')

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
              <td>Slika</td>
              <td>Title</td>
              <td>Kategorija</td>
              <td colspan="3">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($podKategorije as $podKategorija)
            <tr>
                <td><img src="http://127.0.0.1:8000/{{$podKategorija->slikaUrl}}" alt="" width="150" height="auto"></td>
                <td>{{$podKategorija->naziv}}</td>
                <td>{{$podKategorija->kategorija->naziv}}</td>
                <td><a href="{{action('podKategorijaController@edit',$podKategorija->id)}}" class="btn btn-primary">Uredi</a></td>
                <td>
                    <form action="{{action('podKategorijaController@destroy', $podKategorija->id)}}" method="post">
                    
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Izbrisi</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection