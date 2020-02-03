@extends('layouts.app') @section('content')
<style>
    h4 {
        color: black;
    }
</style>
<div class="card">
    <div class=" card-header">
        <h2>Daftar Rapot Siswa</h2>
        <a href="/daftarNilaiRapot/?semester=ganjil" class="btn btn-info">Nilai Semester Ganjil</a>
        <a href="/daftarNilaiRapot/?semester=genap" class="btn btn-info">Nilai Semester Genap</a>
        <div class="card-body">
            <!-- Chart -->
            <!-- Card header -->
            <div class="card-header" role="tab" id="heading4">
                <a data-toggle="collapse" data-parent="#accordionEx194" href="#collapse4" aria-expanded="true" aria-controls="collapse4">
                    <h4 class="mb-0 red-text">
                        Data Statistik
                        <div class="animated-icon1 float-right mt-1"><span></span><span></span><span></span></div>
                    </h4>
                </a>
            </div>

            <!-- Card body -->
            <div id="collapse4" class="collapse show" role="tabpanel" aria-labelledby="heading4" data-parent="#accordionEx194">
                <div class="card-body pt-0"> <br>
                    <h5>Statistik Rata-Rata Nilai Pengetahuan Rapot </h5>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
                    {{ $uts->script() }} {{ $uts->container()}}
                    <br>
                    <h5>Statistik Rata-Rata Nilai Ketrampilan Rapot </h5>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
                    {{ $uas->script() }} {{ $uas->container()}}
                    <br>

                    <div class="row col-md-12">
                        <h4>Statistik Jumlah Anak Lulus dan Tidak Lulus Pada Tiap Mata Pelajaran</h4>
                        <div class=" col-md-6">
                            <h5>Pendidikan Agama dan Budi Pekerti Semester Ganjil</h5>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
                            {{ $agamaGanjil->script() }} {{ $agamaGanjil->container()}}
                        </div><br>
                        <div class=" col-md-6">
                            <h5>Pendidikan Agama dan Budi Pekerti Semester Genap</h5>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
                            {{ $agamaGenap->script() }} {{ $agamaGenap->container()}}
                        </div> <br>
                        <div class=" col-md-6">
                            <h5>Pendidikan Pancasila dan Kewarganegaraan Semester Ganjil</h5>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
                            {{ $pknGanjil->script() }} {{ $pknGanjil->container()}}
                        </div> <br>
                        <div class=" col-md-6">
                            <h5>Pendidikan Pancasila dan Kewarganegaraan Semester Genap</h5>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
                            {{ $pknGenap->script() }} {{ $pknGenap->container()}}
                        </div><br>
                        <div class=" col-md-6">
                            <h5>Bahasa Indonesia Semester Ganjil</h5>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
                            {{ $biGanjil->script() }} {{ $biGanjil->container()}}
                        </div><br>
                        <div class=" col-md-6">
                            <h5>Bahasa Indonesia Semester Genap</h5>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
                            {{ $biGenap->script() }} {{ $biGenap->container()}}
                        </div><br>
                        <div class=" col-md-6">
                            <h5>Matematika Semester Ganjil</h5>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
                            {{ $mtkGanjil->script() }} {{ $mtkGanjil->container()}}
                        </div><br>
                        <div class=" col-md-6">
                            <h5> Matematika Semester Genap</h5>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
                            {{ $mtkGenap->script() }} {{ $mtkGenap->container()}}
                        </div><br>
                        <div class=" col-md-6">
                            <h5>Ilmu Pengetahuan Alam Semester Ganjil</h5>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
                            {{ $ipaGanjil->script() }} {{ $ipaGanjil->container()}}
                        </div><br>
                        <div class=" col-md-6">
                            <h5> Ilmu Pengetahuan Alam Semester Genap</h5>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
                            {{ $ipaGenap->script() }} {{ $ipaGenap->container()}}
                        </div><br>
                        <div class=" col-md-6">
                            <h5> Bahasa Inggris Semester Ganjil</h5>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
                            {{ $bingGanjil->script() }} {{ $bingGanjil->container()}}
                        </div>
                        <div class=" col-md-6">
                            <h5> Bahasa Inggris Semester Genap</h5>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
                            {{ $bingGenap->script() }} {{ $bingGenap->container()}}
                        </div><br>
                        <div class=" col-md-6">
                            <h5>Pendidikan Jasmani, Olah Raga, dan Kesehatan Ganjil</h5>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
                            {{ $penjasGanjil->script() }} {{ $penjasGanjil->container()}}
                        </div>
                        <div class=" col-md-6">
                            <h5>Pendidikan Jasmani, Olah Raga, dan Kesehatan Semester Genap</h5>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
                            {{ $penjasGenap->script() }} {{ $penjasGenap->container()}}
                        </div><br>
                        <div class=" col-md-6">
                            <h5> Prakarya Ganjil</h5>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
                            {{ $prakGanjil->script() }} {{ $prakGanjil->container()}}
                        </div>
                        <div class=" col-md-6">
                            <h5>Prakarya Semester Genap</h5>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
                            {{ $prakGenap->script() }} {{ $prakGenap->container()}}
                        </div><br>
                        <div class=" col-md-6">
                            <h5> Program Khusus (Bina Diri) Ganjil</h5>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
                            {{ $pkbnGanjil->script() }} {{ $pkbnGanjil->container()}}
                        </div>
                        <div class=" col-md-6">
                            <h5> Program Khusus (Bina Diri) Semester Genap</h5>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
                            {{ $pkbnGenap->script() }} {{ $pkbnGenap->container()}}
                        </div><br>
                        <div class=" col-md-6">
                            <h5>Mulok (Bahasa Jawa) Ganjil</h5>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
                            {{ $mulokGanjil->script() }} {{ $mulokGanjil->container()}}
                        </div>
                        <div class=" col-md-6">
                            <h5>Mulok (Bahasa Jawa) Semester Genap</h5>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
                            {{ $mulokGenap->script() }} {{ $mulokGenap->container()}}
                        </div><br>
                    </div><br>
                </div>
            </div>
        </div>
        <!-- chart -->
        <table class="table bordered">
            <h4>Daftar Siswa</h4>
            <thead>
                <tr align="center">
                    <th scope="col">Nama</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Menu</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($namaSiswa as $data)
                <tr align="center">
                    <th>{{$data->nama}}</th>
                    <th>{{$data->kelas}}</th>
                    <th>
                        <a href="/nilaiRapot/{{$data->id}}" class="btn btn-info">Lihat Nilai</a>

                    </th>
                </tr>

                @endforeach


            </tbody>
        </table>
    </div>

</div>

@endsection