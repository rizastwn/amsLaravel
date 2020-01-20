@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
    <h2>Rancangan Subtema</h2>
    @if ($info==null)
        <h4>Silahkan menggunakan form pencarian</h4>
    @else
    
    <h5>Tema : {{$info->tema}}</h5>
    <h5>Tema : {{$info->subtema}}</h5>
    <h5>Jenis : {{$info->jenis}}</h5>
    @endif
    <a href="/subtema/create" class="btn btn-info">Tambah subtema baru</a><br><br>
        <form action="/subtema" method="GET"  class="form-inline" role="form">
            {{ csrf_field() }}
            <div class="form-group col-md-2">
                <label for="sel1">Tema :  </label>
                <select name="tema"  class="form-control" id="sel1">
                    <option value="1" >1</option>
                    <option value="2" >2</option>
                    <option value="3" >3</option>
                    <option value="3"  >4</option>
                </select>
            </div>
            <div class="form-group col-md-3" >
                <label for="sel1">Subtema :  </label>
                <select name="subtema" class="form-control" id="sel1">
                    <option value="1">1</option>
                    <option value="2" >2</option>
                    <option value="3" >3</option>
                    
                </select>
            </div>
            <div class="form-group col-md-3" >
                <label for="sel1">Jenis :  </label>
                <select name="jenis" class="form-control" id="sel1">
                    <option value="pengetahuan">Pengetahuan</option>
                    <option value="ketrampilan" >Ketrampilan</option>
                </select>
            </div> 
                <input type="submit" value="Cari" class="btn btn-info">
        </form>
 
    </div>
    @if ($subtema !== null)
    <div class="card-body ">
        <table class="table bordered">
            <thead align="justify">
                <tr >
                <th scope="col">Mata Pelajaran</th>
                <th scope="col">Judul</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Menu</th>
                </tr>
            </thead>
            <tbody align="left" >
                @foreach ($subtema as $item)
                <tr >
                    <td>{{$item->mataPelajaran}}</td>
                    <td>{{$item->judul}}</td>
                    <td>{{$item->deskripsi}}</td>
                    <td >
                        <form action="{{action('subtemaController@destroy', $item['id'])}}" method="post">
                            @csrf
                            <a href="/subtema/{{$item->id}}" class="btn btn-info">Lihat </a> <br>
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit">Hapus</button>
                          </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <h5>Data tidak ditemukan!</h5>
    @endif
    

</div>
@endsection