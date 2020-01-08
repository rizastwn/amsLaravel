@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
    <h2>Rancangan Subtema</h2>
    <h5>Kelas : </h5>
    <h5>Tema : </h5>
    <h5>Jenis :</h5>
    <a href="/subtema/create" class="btn btn-info">Tambah subtema baru</a><br><br>
        <form action="/" method="GET"  class="form-inline" role="form">
            {{ csrf_field() }}
            <div class="form-group col-md-2">
                <label for="sel1">Tema :  </label>
                <select name="kelas"  class="form-control" id="sel1">
                    <option value="1" >1</option>
                    <option value="2" >2</option>
                    <option value="3" >3</option>
                    <option value="3" >4</option>
                </select>
            </div>
            <div class="form-group col-md-3" >
                <label for="sel1">Subtema :  </label>
                <select name="subtema" class="form-control" id="sel1">
                    <option value="1" >1</option>
                    <option value="2" >2</option>
                    <option value="3" >3</option>
                    <option value="3" >4</option>
                </select>
            </div>
            <div class="form-group col-md-3" >
                <label for="sel1">Jenis :  </label>
                <select name="jenis" class="form-control" id="sel1">
                    <option value="pengetahuan">Pengetahuan</option>
                    <option value="ketrampilan">Ketrampilan</option>
                </select>
            </div> 
                <input type="submit" value="Cari" class="btn btn-info">
        </form>
 
    </div>
    <div class="card-body">
        <table class="table bordered">
            <thead>
                <tr align="justify">
                <th scope="col">Mata Pelajaran</th>
                <th scope="col">Judul</th> 
                <th scope="col">Menu</th>
                </tr>
            </thead>
            <tbody >
                @foreach ($subtema as $item)
                <tr align="justify">
                    <td>{{$item->mataPelajaran}}</td>
                    <td>{{$item->judul}}</td>
                    <td>
                        <form action="{{action('subtemaController@destroy', $item['id'])}}" method="post">
                            @csrf
                            <a href="/subtema/{{$item->id}}/edit" class="btn btn-info">ubah nilai</a>
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit">Hapus</button>
                          </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection