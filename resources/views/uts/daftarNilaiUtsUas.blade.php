@extends('layouts.app')
@section('content')
<style>
    h4{
        color: black;
    }
    </style>
<div class="card">
    <div class=" card-header">
        <h2>Daftar Siswa UTS dan UAS </h2> 
        <a href="/daftarNilaiUtsUas/?semester=ganjil" class="btn btn-info">Nilai Semester Ganjil</a> 
        <a href="/daftarNilaiUtsUas/?semester=genap" class="btn btn-info">Nilai Semester Genap</a> 
    <div class="card-body ">
        <!-- Chart -->
    <!-- Card header -->
  <div class="card-header" role="tab" >
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
      <h5>Statistik Rata-Rata Nilai UTS </h5>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
        {{ $uts->script() }}
        {{ $uts->container()}}
        <br>
        <h5>Statistik Rata-Rata Nilai UAS </h5>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
        {{ $uas->script() }}
        {{ $uas->container()}}
        <br>
        <div class="row">
          <div class=" col-md-6">
            <h5>Statistik Jumlah Anak Lulus dan Tidak Lulus Pada UTS Mata Pelajaran Pendidikan Agama dan Budi Pekerti Semester Ganjil</h5>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
            {{ $agamaGanjil->script() }}
            {{ $agamaGanjil->container()}}
          </div><br>
          <div class=" col-md-6">
            <h5>Statistik Jumlah Anak Lulus dan Tidak Lulus Pada UAS Mata Pelajaran Pendidikan Agama dan Budi Pekerti Semester Genap</h5>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
            {{ $agamaGenap->script() }}
            {{ $agamaGenap->container()}}
        </div> <br>
        <div class="row">
          <div class=" col-md-6">
            <h5>Statistik Jumlah Anak Lulus dan Tidak Lulus Pada UTS Mata Pelajaran Pendidikan Pancasila dan Kewarganegaraan Semester Ganjil</h5>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
            {{ $pknGanjil->script() }}
            {{ $pknGanjil->container()}}
          </div>
          <div class=" col-md-6">
            <h5>Statistik Jumlah Anak Lulus dan Tidak Lulus Pada UAS Mata Pelajaran Pendidikan Pancasila dan Kewarganegaraan Semester Genap</h5>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
            {{ $pknGenap->script() }}
            {{ $pknGenap->container()}}
          </div><br>
        </div><br>
        <div class="row">
          <div class=" col-md-6">
            <h5>Statistik Jumlah Anak Lulus dan Tidak Lulus Pada UTS Mata Pelajaran Bahasa Indonesia Semester Ganjil</h5>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
            {{ $biGanjil->script() }}
            {{ $biGanjil->container()}}
          </div>
          <div class=" col-md-6">
            <h5>Statistik Jumlah Anak Lulus dan Tidak Lulus Pada UAS Mata Pelajaran Bahasa Indonesia Semester Genap</h5>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
            {{ $biGenap->script() }}
            {{ $biGenap->container()}}
          </div><br>
        </div><br>
        <div class="row">
          <div class=" col-md-6">
            <h5>Statistik Jumlah Anak Lulus dan Tidak Lulus Pada UTS Mata Matematika Semester Ganjil</h5>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
            {{ $mtkGanjil->script() }}
            {{ $mtkGanjil->container()}}
          </div>
          <div class=" col-md-6">
            <h5>Statistik Jumlah Anak Lulus dan Tidak Lulus Pada UAS Mata Pelajaran Matematika Semester Genap</h5>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
            {{ $mtkGenap->script() }}
            {{ $mtkGenap->container()}}
          </div><br>
        </div><br>
        <div class="row">
          <div class=" col-md-6">
            <h5>Statistik Jumlah Anak Lulus dan Tidak Lulus Pada UTS Mata  Ilmu Pengetahuan Alam Semester Ganjil</h5>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
            {{ $ipaGanjil->script() }}
            {{ $ipaGanjil->container()}}
          </div>
          <div class=" col-md-6">
            <h5>Statistik Jumlah Anak Lulus dan Tidak Lulus Pada UAS Mata Pelajaran Ilmu Pengetahuan Alam Semester Genap</h5>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
            {{ $ipaGenap->script() }}
            {{ $ipaGenap->container()}}
          </div><br>
        </div><br>
        <div class="row">
          <div class=" col-md-6">
            <h5>Statistik Jumlah Anak Lulus dan Tidak Lulus Pada UTS Mata  Bahasa Inggris Semester Ganjil</h5>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
            {{ $bingGanjil->script() }}
            {{ $bingGanjil->container()}}
          </div>
          <div class=" col-md-6">
            <h5>Statistik Jumlah Anak Lulus dan Tidak Lulus Pada UAS Mata Pelajaran Bahasa Inggris Semester Genap</h5>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
            {{ $bingGenap->script() }}
            {{ $bingGenap->container()}}
          </div><br>
        </div><br>
        <div class="row">
          <div class=" col-md-6">
            <h5>Statistik Jumlah Anak Lulus dan Tidak Lulus Pada UTS Mata Pendidikan Jasmani, Olah Raga, dan Kesehatan Ganjil</h5>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
            {{ $penjasGanjil->script() }}
            {{ $penjasGanjil->container()}}
          </div>
          <div class=" col-md-6">
            <h5>Statistik Jumlah Anak Lulus dan Tidak Lulus Pada UAS Mata Pelajaran Pendidikan Jasmani, Olah Raga, dan Kesehatan Semester Genap</h5>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
            {{ $penjasGenap->script() }}
            {{ $penjasGenap->container()}}
          </div><br>
        </div><br>
        <div class="row">
          <div class=" col-md-6">
            <h5>Statistik Jumlah Anak Lulus dan Tidak Lulus Pada UTS Mata Pelajaran Prakarya Ganjil</h5>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
            {{ $prakGanjil->script() }}
            {{ $prakGanjil->container()}}
          </div>
          <div class=" col-md-6">
            <h5>Statistik Jumlah Anak Lulus dan Tidak Lulus Pada UAS Mata Pelajaran Prakarya Semester Genap</h5>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
            {{ $prakGenap->script() }}
            {{ $prakGenap->container()}}
          </div><br>
        </div><br>
        <div class="row">
          <div class=" col-md-6">
            <h5>Statistik Jumlah Anak Lulus dan Tidak Lulus Pada UTS Mata Pelajaran Program Khusus (Bina Diri) Ganjil</h5>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
            {{ $pkbnGanjil->script() }}
            {{ $pkbnGanjil->container()}}
          </div>
          <div class=" col-md-6">
            <h5>Statistik Jumlah Anak Lulus dan Tidak Lulus Pada UAS Mata Pelajaran Program Khusus (Bina Diri) Semester Genap</h5>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
            {{ $pkbnGenap->script() }}
            {{ $pkbnGenap->container()}}
          </div><br>
        </div><br>
        <div class="row">
          <div class=" col-md-6">
            <h5>Statistik Jumlah Anak Lulus dan Tidak Lulus Pada UTS Mata Pelajaran Mulok (Bahasa Jawa) Ganjil</h5>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
            {{ $mulokGanjil->script() }}
            {{ $mulokGanjil->container()}}
          </div>
          <div class=" col-md-6">
            <h5>Statistik Jumlah Anak Lulus dan Tidak Lulus Pada UAS Mata Pelajaran Mulok (Bahasa Jawa) Semester Genap</h5>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
            {{ $mulokGenap->script() }}
            {{ $mulokGenap->container()}}
          </div><br>
        </div><br>
    </div>
  </div>
</div>
<!-- chart -->


<div align="center"  class="col-md-10 ">
  <div align="left">
    <h4>Data Siswa</h4>
  </div>
  <table class="table bordered">
    <thead>
        <tr align="justify">
        <th scope="col">Nama</th>
        <th scope="col">Kelas</th>
        <th scope="col">Menu</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($namaSiswa as $data)
        <tr align="justify">
            <th>{{$data->nama}}</th>
            <th>{{$data->kelas}}</th>
            <th>
                <a href="/nilaiUtsUas/{{$data->id}}" class="btn btn-info">Lihat Nilai</a> 
                
                {{-- <a href="/nilaiUtsUas/{{$nilaiSiswaGenap->id}}" class="btn btn-info">Nilai Semester {{$nilaiSiswaGenap->semester}}</a>  --}}
            </th>  
        </tr>
        @endforeach   
        
       
    </tbody>
</table>
</div>
       
    </div>

</div>
    
@endsection