@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
    <h2>Daftar Nilai Subtema Siswa</h2>
  
    <h5>Nama  : {{$siswa->nama}}</h5>
    <h5>Kelas  : {{$kelas->kelas}}</h5>
    <h5>Tema : {{$showTema->tema}} - {{$showTema->judul}}</h5>
    <h5>Subtema  : {{$showSubtema->subtema}} </h5>
    
    <div class="col-md-12">
        <form action="/nilaiSubtema/{{$kelas->id}}" method="GET" class="form-inline"  role="form">
            @csrf
            <div class="form-group col-md-2">
                <label for="sel1">Tema : </label>
                <select name="tema"  class="form-control" id="sel1">
                    @foreach ($tema as $item)
                    {{$data = $item}}
                        <option @if ($data == $showTema) selected @endif value="{{$item->tema}}">{{$item->tema}}</option>
                        
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3" >
                <label for="sel1">Subtema : </label>
                <select name="subtema" class="form-control" id="sel1">
                    <option @if ($subtema == '1') selected @endif value="1">1</option>
                    <option @if ($subtema == '2') selected @endif value="2">2</option>
                    <option @if ($subtema == '3') selected @endif value="3">3</option>

                    
                </select>
            </div>
            
                <input type="submit" value="Lihat Nilai" class="btn btn-info">
        </form>
    </div>
    
    </div>
    <div class="card-body  ">
        
            <table class="table bordered table-hover">
                <thead>
                    <tr >
                    <th scope="col">Jenis</th>
                    @foreach ($nilaiPengetahuan as $item)
                    <td>{{$item->mataPelajaran}}</td>
                    @endforeach
                    </tr>
                </thead>
                {{-- <a href="/nilaiTema/{{$data->id}}/edit" class="btn btn-info">Ubah nilai</a> 
                <a href="/lihatSubtema/{{$data->id}}" class="btn btn-success">Lihat Detail</a> --}}
                <tbody>         
                    <tr>
                       <th>Nilai Pengetahuan</th>
                       @foreach ($nilaiPengetahuan as $item)
                       <td>{{$item->nilai}}  <a class="btn btn-info" href="/lihatSubtema/{{$item->id}}">lihat</a></td>
                       @endforeach
                    </tr> 
                   
                    <tr>
                        <th>Nilai Ketrampilan</th> <br>
                        @foreach ($nilaiKetrampilan as $item)
                       <td>{{$item->nilai}} <a class="btn btn-info" href="/lihatSubtema/{{$item->id}}">lihat </a></td>
                       @endforeach
                     </tr> 
                </tbody>
                
            </table>
    </div>

</div>
@endsection