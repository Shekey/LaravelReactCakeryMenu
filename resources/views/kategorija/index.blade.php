@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
              <td>Title</td>
              <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($kategorije as $kategorija)
            <tr>
                <td>{{$kategorija->naziv}}</td>
                <td><a href="{{action('KategorijaController@edit',$kategorija->id)}}" class="btn btn-primary">Uredi</a></td>
                <td>
                    <form action="{{action('KategorijaController@destroy', $kategorija->id)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Izbrisi</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
<div>
@endsection