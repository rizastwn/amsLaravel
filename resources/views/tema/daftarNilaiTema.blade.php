@extends('layouts.app')
@section('content')
<style>
h4{
    color: black;
}
</style>
<div class="card">
    <div class=" card-header">
        <h2>Daftar Nilai Tema Siswa</h2>
        <a href="/daftarNilaiTema/?semester=ganjil" class="btn btn-info">Nilai Semester Ganjil</a> 
        <a href="/daftarNilaiTema/?semester=genap" class="btn btn-info">Nilai Semester Genap</a> 
    </div>
    <!-- Chart -->
    <!-- Card header -->
  <div class="card-header" role="tab" id="heading4">
    <a data-toggle="collapse" data-parent="#accordionEx194" href="#collapse4" aria-expanded="true"
      aria-controls="collapse4">
      <h4 class="mb-0 red-text">
       Data Statistik  <div class="animated-icon1 float-right mt-1"><span></span><span></span><span></span></div>
      </h4>
    </a>
  </div>

  <!-- Card body -->
  <div id="collapse4" class="collapse show" role="tabpanel" aria-labelledby="heading4" data-parent="#accordionEx194">
    <div class="card-body pt-0"> <br>
      <h5>Statistik Rata-Rata Nilai Tema Semester Ganjil</h5>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
        {{ $rataTema->script() }}
        {{ $rataTema->container()}}
        <br>
        <h5>Statistik Rata-Rata Nilai Tema Semester Genap</h5>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
        {{ $rataTemaGenap->script() }}
        {{ $rataTemaGenap->container()}}
    </div>
  </div>
</div>
<!-- chart -->
<div class="card">
  
    <div class="card-body">
      <h4>Daftar Siswa</h4>
        <table class="table bordered">
            <thead>
                <tr align="center">
                <th scope="col">Nama</th>
                <th scope="col">Kelas</th>
                <th scope="col">Semester</th>
                <th scope="col">Menu</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $data)
                <tr align="center">
                    <th>{{$data->nama}}</th>
                    <th>{{$data->kelas}}</th>
                    <th>{{$data->semester}}</th>
                    <th>
                        <a href="/nilaiTema/{{$data->id}}?tema=1" class="btn btn-info">Tema 1</a>
                        <a href="/nilaiTema/{{$data->id}}?tema=2" class="btn btn-info">Tema 2</a>
                        <a href="/nilaiTema/{{$data->id}}?tema=3" class="btn btn-info">Tema 3</a>
                        <a href="/nilaiTema/{{$data->id}}?tema=4" class="btn btn-info">Tema 4</a>
                    </th>
                </tr> 
                @endforeach
                
                
            </tbody>
        </table>
    </div>
</div>
</div>

@endsection