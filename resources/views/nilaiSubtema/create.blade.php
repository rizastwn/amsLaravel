@extends('layouts.app')
@section('content')
<div class="card">
    <div class=" card-header">
        <h2>Tambah Nilai Subtema Baru </h2> 
        <h5>Nama Siswa : {{$siswa->nama}}</h5>
        <h5>Kelas : {{$kelas->kelas}}</h5>
        <h5>Semester : {{$kelas->semester}}</h5>
        
    <div class="card-body">
        <form action="/nilaiTema" method="POST" name="form1" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <div class="form-group">
                <label for="usr">Tema :</label>
                <select class="form-control" name="tema" id="">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
            <div class="form-group">
                <label for="usr">Subtema :</label>
                <select class="form-control" name="subtema" id="">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="usr">Mata Pelajaran :</label>
                <select class="form-control" name="mataPelajaran">
                    @foreach ($mataPelajaran as $item)
                <option value="{{$item->mataPelajaran}}">{{$item->mataPelajaran}}</option>
                @endforeach   
                </select>  
            </div>
            <div class="form-group">
                <label for="usr">Jenis Nilai :</label>
                <select class="form-control" name="jenis"  id="">
                    <option value="ketrampilan">ketrampilan</option>
                    <option value="pengetahuan">pengetahuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="usr">nilai :</label>
                <input type="number" min="0" max="100" class="form-control" name="nilai" value="">
            </div>
            <div class="form-group">
                <label for="usr">Deskripsi:</label>
                <textarea class="form-control" name="deskripsi"  cols="30" rows="10"></textarea>
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
            <button type="submit" class="btn btn-primary" id="Submit" name="Submit">simpan nilai</button>
        </form>
    </div>

</div>
    
@endsection