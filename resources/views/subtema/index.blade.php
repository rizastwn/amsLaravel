@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
    <h2>Rancangan Subtema</h2>
    
    <a href="/subtema/create" class="btn btn-info">Tambah subtema baru</a><br><br>
        <form action="/subtema" method="GET"  class="row" role="form">
            {{ csrf_field() }}
            <div class="form-group col-md-2">
                <label for="sel1">Tema :  </label>
                <select name="tema"  class="form-control" id="sel1">
                    <option @if ($tema == 1) selected @endif value="1" >1</option>
                    <option @if ($tema == 2) selected @endif value="2" >2</option>
                    <option @if ($tema == 3) selected @endif value="3" >3</option>
                    <option @if ($tema == 4) selected @endif value="3"  >4</option>
                </select>
            </div>
            <div class="form-group col-md-2" >
                <label for="sel1">Subtema :  </label>
                <select name="subtema" class="form-control" id="sel1">
                    <option @if ($subtemaD == 1) selected @endif value="1">1</option>
                    <option @if ($subtemaD == 2) selected @endif value="2" >2</option>
                    <option @if ($subtemaD == 3) selected @endif value="3" >3</option>
                    <option @if ($subtemaD== 4) selected @endif value="3" >4</option>
                    
                </select>
            </div>
            <div class="form-group col-md-3" >
                <label for="sel1">Jenis :  </label>
                <select name="jenis" class="form-control" id="sel1">
                    <option @if ($jenis == 'pengetahuan') selected @endif  value="pengetahuan">Pengetahuan</option>
                    <option @if ($jenis == 'ketrampilan') selected @endif value="ketrampilan" >Ketrampilan</option>
                </select>
            </div> 
            <div class="form-group col-md-3" >
                <label for="sel1">Semester :  </label>
                <select name="semester" class="form-control" id="sel1">
                    <option @if ($semester == 'ganjil') selected @endif value="ganjil">Ganjil</option>
                    <option  @if ($semester == 'genap') selected @endif value="genap" >Genap</option>
                </select>
            </div>
            <div class="col-md-2">
                <br>
                <input type="submit" value="Cari Tema" class="btn btn-info">
            </div>
            
                
        </form>
 
    </div>
    @if ($subtema !== null)
    <div class="card-body ">
        <table class="table bordered">
            <thead align="justify">
                <tr >
                <th scope="col">Mata Pelajaran</th>
                <th scope="col">Judul</th>
                <th scope="col">Menu</th>
                </tr>
            </thead>
            <tbody align="left" >
                @foreach ($subtema as $item)
                <tr >
                    <td>{{$item->mataPelajaran}}</td>
                    <td>{{$item->judul}}</td>
                    <td align="">
                        <form  action="{{action('subtemaController@destroy', $item['id'])}}" method="post">
                            @csrf
                            <a href="/subtema/{{$item->id}}" class="btn btn-success">Lihat </a> 
                            <a href="/subtema/{{$item->id}}/edit" class="btn btn-info">Ubah </a> 
                            
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