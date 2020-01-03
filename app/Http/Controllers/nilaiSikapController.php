<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nilaiSikapSpritual;
use App\kelas;
use App\siswa;
class nilaiSikapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nilai = nilaiSikapSpritual::find($id);
        $kelas = kelas::find($nilai->idKelas);
        $siswa = siswa::find($kelas->idSiswa);
       
        return view('tema.editSikap')->with(['siswa' => $siswa, 'nilai' => $nilai, 'kelas' => $kelas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nilai = nilaiSikapSpritual::find($id);
        $nilai->sosial = $request->input('sosial');
        $nilai->spiritual = $request->input('spiritual');
        $nilai->save();
        return redirect('/daftarNilaiTema')->with('success', 'nilai sikap tema berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
