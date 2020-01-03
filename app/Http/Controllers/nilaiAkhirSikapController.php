<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\siswa;
use App\kelas;
use App\nilaiAkhirSikap;
use DB;
class nilaiAkhirSikapController extends Controller
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nilai = nilaiAkhirSikap::find($id);
        $siswa = DB::table('siswas')
            ->join('kelas', 'kelas.idSiswa', '=', 'siswas.id')
            ->select('siswas.nama', 'kelas.*')
            ->where('kelas.id', $nilai->idKelas)
            ->first();
        
        return view('rapot.editNilaiSikap')->with(['siswa' => $siswa, 'nilai' => $nilai, ]);
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
        $nilaiSikap = nilaiAkhirSikap::find($id);
        $nilaiSikap->spritual = $request->input('spritual');
        $nilaiSikap->sosial = $request->input('sosial');
        $nilaiSikap->save();
        return redirect('/daftarNilaiRapot')->with('success', 'nilai rapot berhasil diubah!');
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
