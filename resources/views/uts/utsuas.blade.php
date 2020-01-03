@extends('layouts.app')
@section('content')
<div class="card">
    <div class=" card-header">
        <h2> Nilai UTS dan UAS Siswa</h2>
        <h5>Nama : Riza Setiawan</h5>
        <h5>Kelas : </h5>
        <h5>Semester: </h5>
    <div class="card-body">
        <table class="table bordered">
            <thead>
                <tr align="center">
                <th scope="col">Mata Pelajaran</th>
                <th scope="col">UTS</th>
                <th scope="col">UAS</th>
                </tr>
            </thead>
            <tbody>
                <tr align="center">
                    <th><a href="/siswa">Bahasa Indonesia</a></th>
                    <th>80</th>
                    <th>80</th>
                    <th>
                        <a href="/tema" class="btn btn-info">Ubah Nilai</a>
                    </th>
                </tr>
                
            </tbody>
        </table>
    </div>

</div>
    
@endsection