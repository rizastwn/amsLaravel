@extends('layouts.app')
@section('content')
<div class="card">
    <div class=" card-header">
        <h2>Daftar Wali Kelas</h2> 
        <a href="waliKelas/?status=tidak aktif" class="btn btn-info">daftar wali kelas tidak aktif</a>
        <a href="waliKelas/create " class="btn btn-primary">tambah wali kelas baru</a>
    <div class="card-body">
        <table class="table bordered">   
                <thead>
                    <tr align="center">
                    <th scope="col">Nama</th>
                    <th scope="col">Kelas</th>

                    <th scope="col">Menu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($waliKelas as $data)
                    <tr align="center">
                        <td><a href="/waliKelas/{{$data->id}}">{{$data->name}}</a></th>
                        <td>{{$data->kelas}}</th>
                     
                        
                        <td>
                                <form action="{{action('waliKelasController@destroy', $data->id ) }}" method="post">
                                    @csrf
                                    <a href="/waliKelas/{{$data->id}}/edit" class="btn btn-info">Edit</a>
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