@extends('layouts.app')
@section('content')
<div class="card">
    <div class=" card-header">
        <h2>Daftar Orang Tua</h2> 
        <a href="daftarOrangtua/?kelas=1" class="btn btn-info">Kelas 1</a>
        <a href="daftarOrangtua/?kelas=2" class="btn btn-info">Kelas 2</a>
        <a href="daftarOrangtua/?kelas=3" class="btn btn-info">Kelas 3</a>
        <a href="daftarOrangtua/?status=tidak aktif" class="btn btn-info">Daftar Orang tua alumni</a>
        <a href="orangtua/create " class="btn btn-primary">tambah orang tua baru</a>
    <div class="card-body">
        <table class="table bordered">
            <thead>
                <tr align="justify">
                <th scope="col">Nama Orang tua</th>
                <th scope="col">Nama Siswa</th>
                <th scope="col">kelas</th>  
                <th scope="col">Menu</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orangtua as $data)
                <tr align="justify">
                    <td><a href="/orangtua/{{$data->id}}">{{$data->name}}</a></td>
                    <td>{{$data->nama}}</td>
                    <td>{{$data->kelas}}</td>
                    <td>
                        <form action="{{action('orangtuaController@destroy', $data->id ) }}" method="post">
                            @csrf
                            <a class="btn btn-info" href="/orangtua/{{$data->id}}/edit">Edit</a>
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
    
@endsection