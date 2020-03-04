@extends('layouts.app')
@section('content')
<div class="card">
    
    <div class="card-header " align='justify'>
        <h2>Daftar Nilai Subtema</h5>
            <a href="/daftarNilaiSubtema/?semester=ganjil" class="btn btn-info">Nilai Semester Ganjil</a> 
            <a href="/daftarNilaiSubtema/?semester=genap" class="btn btn-info">Nilai Semester Genap</a> 
    </div>

    <div class="card-body ">
        <table class="table bordered">
            <thead>
                <tr align="justify">
                    <th scope="col">Nama</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Menu</th>
                </tr>
            </thead>
            <tbody >
                @foreach ($namaSiswa as $data)
                <tr align="justify">
                    <th>{{$data->nama}}</th>
                    <th>{{$data->semester}}</th>
                    
                    <th>
                        <a href="/nilaiSubtema/{{$data->id}}" class="btn btn-info">lihat nilai</a>
                    </th>  
                </tr>
                @endforeach   
                
               
                
            </tbody>
        </table>
    </div>
   
    
@endsection