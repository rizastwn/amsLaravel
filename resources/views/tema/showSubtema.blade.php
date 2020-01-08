@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
    <h2>Daftar Nilai Subtema Siswa</h2>
    @if ($nilaiTema != null)
    <h5>Nama  : {{$siswa->nama}}</h5>
    <h5>Kelas  : {{$kelas->kelas}}</h5>
    <h5>Tema : {{$nilaiTema->tema}}</h5>
    <h5>Subtema  : {{$nilaiTema->subtema}}</h5>
    <h5>Jenis  : {{$nilaiTema->jenis}}</h5>
    @else
    <h5>Data nilai subtema belum ada, silahkan menambahkan</h5>
    @endif
    <a href="/nilaiTema/create" class="btn btn-info">Tambah Nilai Siswa</a>
    </div>
    <div class="card-body">
        <table class="table bordered">
            <thead>
                <tr align="center">
                <th scope="col">Mata Pelajaran</th>
                <th scope="col">Nilai</th>  
                <th scope="col">Deskripsi</th>
                <th scope="col">Menu</th>
                </tr>
            </thead>
            <tbody >
                @foreach ($nilai as $data)
                <tr align="center">
                    <td>{{$data->tema}}</td>
                    <td>{{$data->judul}}</td>
                    <td>{{$data->isi}}</td>
                    <td>
                        <form action="{{action('nilaiTemaController@destroy', $data['id'])}}" method="post">
                            @csrf
                            <a href="/nilaiTema/{{$data->id}}/edit" class="btn btn-info">ubah nilai</a>
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