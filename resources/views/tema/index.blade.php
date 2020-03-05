@extends('layouts.app')

@section('content')
<style>
    h4{
        color: black;
    }
    </style>
<div class="card">
    
    <div class="card-header">
    <h2 >Daftar Nilai Tema  </h2>
    <h4>Kelas : {{$kelas->kelas}}</h4>
    <h4>Semester : {{$kelas->semester}}</h4>
    <h4 >Tema : {{$nilaiTema->tema}}</h4>
    
    <form action="/nilaiTema/lihat" method="GET"  class="row" role="form">
        <div class="form-group col-md-2">
            <label for="sel1">Kelas : </label>
            <select name="kelas"  class="form-control" id="sel1">
                @foreach ($kelasSiswa as $data)
                <option @if ($data->kelas == $kelas->kelas) selected @endif value="{{$data->kelas}}" >{{$data->kelas}}</option>
                @endforeach                
            </select>
        </div>
        <div class="form-group col-md-3" >
            <label for="sel1">Semester : </label>
            <select name="semester" class="form-control" id="sel1">
            
                <option @if ($kelas->semester == 'ganjil') selected @endif value="ganjil" >Ganjil</option>
                <option @if ($kelas->semester == 'genap') selected @endif value="genap">Genap</option>
            </select>
        </div>
        <div class="form-group col-md-2" >
            <label for="sel1">Tema : </label>
            <select name="tema" class="form-control" id="sel1">
                <option @if ($nilaiTema->tema == '1') selected @endif value="1">1</option>
                <option @if ($nilaiTema->tema == '2') selected @endif value="2">2</option>
                <option @if ($nilaiTema->tema == '3') selected @endif value="3">3</option>
                <option @if ($nilaiTema->tema == '4') selected @endif value="4">4</option>
            </select>
        </div>
        <div class="col">
            <br>
            <input type="submit" class="btn btn-info" value="CARI">
        </div>
    
    </form>
   
    <div class="card-body">
        <h6 >Judul : {{$judul->judul}}</h6>
        <h6 align="justify">Tujuan Tema : {!! $judul->isi !!}</h6>
        <h6 align="justify">Sikap Spritual : <br> {{$nilaiSikap->spiritual}}</h6>
        <h6 align="justify">Sikap Sosial : <br> {{$nilaiSikap->sosial}}</h6>

    </div>
    <div class="card-body">
          
        <div class="card-header" role="tab" id="heading4">
            <a data-toggle="collapse" data-parent="#accordionEx194" href="#collapse4" aria-expanded="true"
            aria-controls="collapse4">
            <h4 class="mb-0 red-text">
            Statistik Nilai Tema <div class="animated-icon1 float-right mt-1"><span></span><span></span><span></span></div>
            </h4>
            </a>
        </div>

        
        <div id="collapse4" class="collapse show" role="tabpanel" aria-labelledby="heading4" data-parent="#accordionEx194">
            <div class="card-body pt-0">
                <h3>Grafik Perkembangan Nilai Siswa Semester {{$kelas->semester}}</h3>
                {{-- script buat chart --}}
                <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
                {{ $nilaiTemaChart->script() }}
                {{ $nilaiTemaChart->container()}}
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>Daftar Nilai Tema</h3>
        </div>
        <div class="card-body">
            <table class="table bordered">
                <thead>
                    <tr align="justify">
                    <th scope="col">Mata Pelajaran</th>
                    <th scope="col">Nilai Pengetahuan</th>
                    <th scope="col">Nilai Ketrampilan</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($nilai as $data)
                    <tr align="justify">
                        <th>{{$data->mataPelajaran}}</th>
                        <th>{{$data->pRata}}</th>
                        <th>{{$data->kRata}}</th>
                        </tr>
                    @endforeach  
                </tbody>
            </table>
        </div>
    </div>

    

    
@endsection