@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
    <h2>Daftar Nilai UTS UAS</h2>
    <h4>Nama : {{$siswa->nama}}</h4>
    <h4>Kelas : {{$siswa->kelas}}</h4>
    <h4>Semester : {{$siswa->semester}}</h4>
    <div class="row">
        <div class=" col-md-2">
            <a href="http://ams.com/nilaiUtsUas/{{$siswa->id}}?semester=ganjil" class="btn btn-info">nilai semester ganjil</a>
        </div>
        <div class=" col-md-2">
            <a href="http://ams.com/nilaiUtsUas/{{$siswa->id}}?semester=genap" class="btn btn-info">nilai semester genap</a>
        </div>
    </div>
    

    </div>
    <div class="card-body">
        <table class="table bordered">
            <thead>
                <tr align="center">
                <th scope="col">Mata Pelajaran</th>
                <th scope="col">UTS Pengetahuan</th>
                <th scope="col">UTS Ketrampilan</th>
                <th scope="col">UAS Pengetahuan</th>
                <th scope="col">UAS Ketrampilan</th>
                <th scope="col">Menu</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nilai as $data)
                <tr align="center">
                    <th>{{$data->mataPelajaran}}</th>
                    <th>{{$data->utsP}}</th>
                    <th>{{$data->uasK}}</th>
                    <th>{{$data->uasP}}</th>
                    <th>{{$data->uasK}}</th>
                    <th>
                        <a href="/nilaiUtsUas/{{$data->id}}/edit" class="btn btn-info">Ubah Nilai </a>
                    </th>
                </tr>  
                @endforeach                    
            </tbody>
        </table>
    </div>

</div>
    
@endsection