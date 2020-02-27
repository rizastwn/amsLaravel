@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">

    </div>
    <div class="card-body">
        <form action="/subtema/{{$subtema->id}}" method="POST" name="form1"  >
            {{ csrf_field() }}
            <div class="form-group">
                <label for="usr">Tema :</label>
                <select name="tema"  class="form-control" id="sel1">
                    <option value="1" @if ($subtema->tema=='1') selected @endif >1</option>
                    <option value="2" @if ($subtema->tema=='2') selected @endif >2</option>
                    <option value="3" @if ($subtema->tema=='3') selected @endif >3</option>
                    <option value="3" @if ($subtema->tema=='4') selected @endif >4</option>
                </select>
            </div>
            <div class="form-group">
                <label for="usr">Subtema :</label>
                <select name="subtema" class="form-control" id="sel1">
                    <option value="1" @if ($subtema->subtema=='1') selected @endif  >1</option>
                    <option value="2" @if ($subtema->subtema=='2') selected @endif>2</option>
                    <option value="3" @if ($subtema->subtema=='3') selected @endif>3</option>
                    <option value="3" @if ($subtema->subtema=='4') selected @endif>4</option>
                </select>
            </div>
            <div class="form-group">
                <label for="usr">Mata Pelajaran :</label>
                <select name="mataPelajaran" class="form-control" id="sel1">
                    @foreach ($mataPelajaran as $item)
                    <option value="{{$item->mataPelajaran}}" @if ($subtema->mataPelajaran == $item->mataPelajaran) selected @endif>{{$item->mataPelajaran}}</option>
                    @endforeach
                    
                </select>
            </div>
            <div class="form-group">
                <label for="usr">jenis :</label>
                <select name="jenis" class="form-control" id="sel1">
                    <option value="pengetahuan" @if ($subtema->jenis=='pengetahuan') selected @endif>Pengetahuan</option>
                    <option value="ketrampilan" @if ($subtema->jenis=='ketrampilan') selected @endif>Ketrampilan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="usr">judul :</label>
                <input type="text" class="form-control" name="judul" value="{{$subtema->judul}}">
            </div>
            <div class="form-group">
                <label for="usr">Penjelasan  subTema:</label>
                <textarea class="form-control" name="deskripsi" id="article-ckeditor" cols="30" rows="10">{{$subtema->deskripsi}}</textarea>
            </div>
            <div class="form-group">
                <label for="usr">Tanggal Mulai :</label>
                <input type="date" class="form-control" name="tanggalAwal" value="{{$subtema->tanggalAwal}}">
            </div>
            <div class="form-group">
                <label for="usr">Tanggal Selesai :</label>
                <input type="date" class="form-control" name="tanggalAkhir" value="{{$subtema->tanggalAkhir}}">
            </div>
            
            <button type="submit" class="btn btn-primary" id="Submit" name="Submit">simpan data subtema</button>
            <form method="post">
                <input type="hidden" name="_method" value="put" />
            </form>
        </form>
    </div>

</div>
    
@endsection