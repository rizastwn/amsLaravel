<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nilaiSikapSpritual;
use App\kelas;
use App\nilaiAkhir;
use App\nilaiAkhirSikap;
use App\nilaiTema;
use App\nilaiUtsUas;
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
        // $nilai = nilaiSikapSpritual::find($id);
        // $nilai->sosial = $request->input('sosial');
        // $nilai->spiritual = $request->input('spiritual');
        // $nilai->save();

        // $nilaiTema = nilaiTema::all();
        // foreach ($nilaiTema as $item) {

        //     $nilaiTemaScore = nilaiTema::find($item->id);
        //     $nilaiTemaScore->p1 = rand(70, 100);
        //     $nilaiTemaScore->p2 = rand(70, 100);
        //     $nilaiTemaScore->p3 = rand(70, 100);
        //     $nilaiTemaScore->k1 = rand(70, 100);
        //     $nilaiTemaScore->k2 = rand(70, 100);
        //     $nilaiTemaScore->k3 = rand(70, 100);
        //     $nilaiTemaScore->pRata = rand(70, 100);
        //     $nilaiTemaScore->kRata = rand(70, 100);
        //     $nilaiTemaScore->Deskripsi =  'siswa memiliki potensi dalam mata pelajaran ini, semoga bisa terus dikembangkan';
        //     $nilaiTemaScore->save();
        // }

        // $nilaiUts = nilaiUtsUas::all();
        // foreach ($nilaiUts as $data) {
        //     $uts = nilaiUtsUas::find($data->id);
        //     $uts->utsP =  rand(70, 100);
        //     $uts->uasP =  rand(70, 100);
        //     $uts->utsK =  rand(70, 100);
        //     $uts->uasK =  rand(70, 100);
        //     $uts->save();
        // }

        // $nilaiUts = nilaiAkhir::all();
        // foreach ($nilaiUts as $data) {
        //     $rapot = nilaiAkhir::find($data->id);
        //     $rapot->nilaiPengetahuan =  rand(70, 100);
        //     $rapot->nilaiKetrampilan =  rand(70, 100);
        //     $rapot->Deskripsi =  'siswa memiliki potensi dalam mata pelajaran ini, semoga bisa terus dikembangkan';
        //     $rapot->save();
        // }

        $nilai = nilaiSikapSpritual::all();
        foreach ($nilai as $data) {
                $rapot = nilaiSikapSpritual::find($data->id);
                $rapot->sosial = 'siswa telah bisa bersosialiasi dengan teman sebaya dan guru-guru sekolah';
                $rapot->spiritual = 'siswa telah bisa mengendalikan emosinya seperti senang, marah, dan bahagia';
                $rapot->save();
            }
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
