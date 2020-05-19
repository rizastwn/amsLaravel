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
    <h5>Jenis Nilai  : {{$nilaiTema->jenis}}</h5>
    
    @else
    <h5>Data nilai subtema belum ada</h5>
    @endif
    <div class="col-md-12">
        <form action="/nilaiSubtemaSiswa/" method="GET" class="form-inline"  role="form">
            @csrf
            <div class="form-group col-md-2">
                <label for="sel1">Tema : </label>
                <select name="tema"  class="form-control" id="sel1">
                    <option value="1" >1</option>
                    <option value="2" >2</option>
                    <option value="3" >3</option>
                    <option value="3" >4</option>
                </select>
            </div>
            <div class="form-group col-md-3" >
                <label for="sel1">Subtema : </label>
                <select name="subtema" class="form-control" id="sel1">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
            <div class="form-group col-md-3" >
                <label for="sel1">Jenis : </label>
                <select name="jenis" class="form-control" id="sel1">
                    <option value="ketrampilan" >Ketrampilan</option>
                    <option value="pengetahuan">Pengetahuan</option>
                </select>
            </div>
            <div class="col-md-4">
                <input type="submit" value="Lihat" class="btn btn-info">
                
            </div>
           
        </form>
    </div>
    
    </div>
    <div class="card-body">
        <table class="table bordered">
            <thead>
                <tr align="justify">
                <th scope="col">Mata Pelajaran</th>
                <th scope="col">Nilai</th>  
                <th scope="col">Deskripsi</th>
                <th scope="col">Menu</th>
                </tr>
            </thead>
            <tbody >
                @foreach ($nilai as $data)
                <tr align="justify">
                    <td>{{$data->mataPelajaran}}</td>
                    <td>{{$data->nilai}}</td>
                    <td>{{$data->deskripsi}}</td>
                    <td>
                            <a href="/lihatSubtema/{{$data->id}}" class="btn btn-info">Lihat Detail</a>
                    </td>
                </tr>
                @endforeach    
            </tbody>
        </table>
    </div>

</div>
@endsection