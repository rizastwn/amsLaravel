@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        
            <h2>Jadwal Akademik</h5>
            <h4>Kelas : {{$infoJadwal->kelas}}</h4>
            <h4>Semester : {{$infoJadwal->semester}}</h4>
            <br>
        <form action="/jadwalAkademik/lihat" method="GET"  class="form-inline" role="form">
            <div class="form-group col-md-2">
                <label for="sel1">Kelas : </label>
                <select name="kelas"  class="form-control" id="sel1">
                    <option value="1" >1</option>
                    <option value="2">2</option>
                    <option value="3" >3</option>
                </select>
            </div>
            <div class="form-group col-md-3" >
                <label for="sel1">Semester : </label>
                <select name="semester" class="form-control" id="sel1">
                    <option value="ganjil">Ganjil</option>
                    <option value="genap">Genap</option>
                </select>
            </div>
            <input type="submit" class="btn btn-success" value="cari jadwal">
            <div class="col-md-3">
                <a href="/jadwalAkademik/create" class="btn btn-info">buat jadwal baru</a>
            </div>
        </form>
    </div>

    <div class="row card-body ">
        <table class="table bordered">
            <thead>
                <tr align="center">
                <th scope="col">Nama Kegiatan</th>
                <th scope="col">Tanggal Mulai</th>  
                <th scope="col">Tanggal AKhir</th>
                </tr>
            </thead>
            <tbody >
                @foreach ($jadwal as $data)
                <tr align="center">
                    <td>{{$data->namaKegiatan}}</td>
                    <td>{{$data->tanggalAwal}}</td>
                    <td>{{$data->tanggalAkhir}}</td>
                    <td><a href="/jadwalAkademik/{{$data->id}}/edit" class="btn btn-info">Ubah Jadwal </a></td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
    
@endsection