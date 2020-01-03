@extends('layouts.app')
@section('content')
<div class="card">
    <div class=" card-header">
        <h2>Daftar Siswa</h2> 
        <a href="daftarSiswa/?kelas=1" class="btn btn-info">Kelas 1</a>
        <a href="daftarSiswa/?kelas=2" class="btn btn-info">Kelas 2</a>
        <a href="daftarSiswa/?kelas=3" class="btn btn-info">Kelas 3</a>
        <a href="daftarSiswa/?status=alumni" class="btn btn-info">daftar alumni</a>
        <a href="siswa/create" class="btn btn-primary">tambah siswa baru</a>
    <div class="card-body">
        <table class="table bordered">   
            <thead>
                <tr align="center">
                <th scope="col">Nama</th>
                <th scope="col">Kelas</th>
                <th scope="col">NIS</th>
                <th scope="col">Menu</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $data)
                <tr align="center">
                    <td><a href="/siswa/{{$data->id}}">{{$data->nama}}</a></th>
                    <td>{{$data->kelas}}</th>
                    <td>{{$data->nis}}</th>
                    
                    <td>
                            <form action="{{action('siswaController@destroy', $data->id ) }}" method="post">
                                @csrf
                                @if ($data->status=='siswa')
                                <a href="/naikKelas/{{$data->id}}/edit" class="btn btn-info">Naik Kelas</a>
                                @endif
                                <a href="/siswa/{{$data->id}}/edit" class="btn btn-info">Edit</a>
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