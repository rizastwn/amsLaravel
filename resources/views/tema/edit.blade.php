@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header"  align='justify'>
    <h2>Form Mengubah Nilai Subtema </h2>
    <h5>Nama : {{$siswa->nama}}</h5>
    <h5>Kelas : {{$kelas->kelas}}</h5>
    <h5>Tema : {{$nilai->tema}}</h5>
    <h5>Subtema : {{$nilai->subtema}} </h5>
    <h5>Judul Subtema : {{$subtema->judul}}</h5>
    <h5>Jenis Nilai : {{$nilai->jenis}}</h5>
    <h5>Matapelajaran : {{$nilai->mataPelajaran}}</h5>
    <h6>Tanggal mulai penilaian nilai tema  {{$info->tanggalAwal}}</h6>
    <h6>Tanggal akhir penilaian nilai tema  {{$info->tanggalAkhir}}</h6>
    </div>
    
    <div class="card-body">
        <form action="/nilaiTema/{{$nilai->id}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            @if ( $tanggal >= $info->tanggalAwal && $tanggal <= $info->tanggalAkhir ) 
            <div class="form-group" hidden>
                <label for="usr">Tema :</label>
                <select class="form-control" name="tema" id="">
                    <option value="1" @if ($nilai->tema == '1') selected @endif>1</option>
                    <option value="2" @if ($nilai->tema == '2') selected @endif>2</option>
                    <option value="3" @if ($nilai->tema == '3') selected @endif>3</option>
                    <option value="4" @if ($nilai->tema == '4') selected @endif>4</option>
                </select>
            </div>
            <div class="form-group" hidden>
                <label for="usr">Subtema :</label>
                <select class="form-control" name="subtema" id="">
                    <option value="1" @if ($nilai->subtema == '1') selected @endif>1</option>
                    <option value="2" @if ($nilai->subtema == '2') selected @endif>2</option>
                    <option value="3" @if ($nilai->subtema == '3') selected @endif>3</option>
                </select>
            </div>
            <div class="form-group" hidden>
                <label for="usr">Jenis Nilai :</label>
                <select class="form-control" name="jenis"  id="">
                    <option value="ketrampilan" @if ($nilai->jenis == 'ketrampilan') selected @endif>ketrampilan</option>
                    <option value="pengetahuan" @if ($nilai->jenis == 'pengetahuan') selected @endif>pengetahuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="usr">nilai :</label>
                <input type="number" min="0" max="100" class="form-control" name="nilai" value="{{$nilai->nilai}}">
            </div>
            <div class="form-group">
                <label for="usr">Deskripsi:</label>
                <textarea class="form-control" name="deskripsi"  cols="30" rows="10">{{$nilai->deskripsi}}</textarea>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload Hasil Kegiatan:</span>
                    </div>
                    <div class="custom-file ">
                        <input name="fotoSubtema" type="file" class="custom-file-input"
                            aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Pilih Gambar</label>
                    </div>
                </div>
            </div>


            <button type="submit" class="btn btn-primary" id="Submit"  name="Submit">simpan nilai</button>
            <form method="post">
                <input type="hidden" name="_method" value="put" />
            </form>
            
            @else
            <h4>Maaf Penilaian tema {{$nilai->tema}} belum pada jadwalnya!</h4>
            @endif

        </form>
        
    </div>

</div>
    
@endsection