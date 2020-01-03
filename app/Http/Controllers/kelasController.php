<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\siswa;
use App\User;
use App\nilaiTema;
use App\nilaiUtsUas;
use App\nilaiAkhir;
use App\nilaiAkhirSikap;
use App\kelas;
use App\nilaiSikapSpritual;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class kelasController extends Controller
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
        $siswa = siswa::find($id);
        $kelas = kelas::where([
            ['idSiswa',$id],
            ['kelas',$siswa->kelas],
        ])->first();
        return view('siswa.naikKelas')->with(['siswa'=> $siswa, 'kelas'=>$kelas]);
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
        $this->validate($request, [
            'kelas' => 'integer',
        ]);
        $siswa = siswa::find($id);
        $siswa->kelas = $request->input('kelas');
        $siswa->save();

        $kelasLamaGanjil = kelas::where([
            ['idSiswa',$siswa->id],
            ['semester','ganjil'],
            ['kelas',$siswa->kelas]
        ])
        ->first();
        $kelasLamaGanjil->status = 'lulus';
        $kelasLamaGanjil->save();
        $kelasLamaGenap = kelas::where([
            ['idSiswa',$siswa->id],
            ['semester','genap']
            ,
            ['kelas',$siswa->kelas]
        ])
        ->first();
        $kelasLamaGenap->status = 'lulus';
        $kelasLamaGenap->save();
       
        $guruBaru = user::all()->where('kelas', '=', $siswa->kelas)->first();
        
        //buat kelas baru semester ganjil
        $kelasGanjil = new kelas;
        $kelasGanjil->idSiswa = $siswa->id;
        $kelasGanjil->idWaliKelas = $guruBaru->id;
        $kelasGanjil->kelas = $siswa->kelas;
        $kelasGanjil->tahunAjaran = date("Y");
        $kelasGanjil->semester = 'ganjil';
        $kelasGanjil->save();

        //buat kelar baru semester genap
        $kelasGenap = new kelas;
        $kelasGenap->idSiswa = $siswa->id;
        $kelasGenap->idWaliKelas = $guruBaru->id;
        $kelasGenap->kelas = $siswa->kelas;
        $kelasGenap->tahunAjaran = date("Y");
        $kelasGenap->semester = 'genap';
        $kelasGenap->save();

        
        $mataPelajaran = ['Pendidikan Agama dan Budi Pekerti', 'Pendidikan Pancasila dan Kewarganegaraan', 'Bahasa Indonesia'
        , 'Matematika', 'Ilmu Pengetahuan Alam', 'Bahasa Inggris', 'Pendidikan Jasmani, Olah Raga, dan Kesehatan',
        'Prakarya', 'Program Khusus (Bina Diri)', 'Mulok (Bahasa Jawa)'];

        $tema = ['1', '2', '3', '4'];
        //nilai Tema semester ganjil

        if (is_array($tema) || is_object($tema)) {
            foreach ($tema as $data) {
                if (is_array($mataPelajaran) || is_object($mataPelajaran)) 
                {
                    foreach ($mataPelajaran as $item) {
                        $nilaiTemaGanjil = new nilaiTema;
                        $nilaiTemaGanjil->idKelas = $kelasGanjil->id;
                        $nilaiTemaGanjil->tema = $data;
                        $nilaiTemaGanjil->mataPelajaran = $item;
                        $nilaiTemaGanjil->save();
                    }
                }
            }
        }
        //nilai sikap untuk tema
        if (is_array($tema) || is_object($tema)) 
        {
            foreach ($tema as $item) {
                $nilaiSikapGanjil = new nilaiSikapSpritual;
                $nilaiSikapGanjil->idKelas = $kelasGanjil->id;
                $nilaiSikapGanjil->tema = $item;
                $nilaiSikapGanjil->save();
            }
        }

        //nilai UTS UAS ganjil
        if (is_array($mataPelajaran) || is_object($mataPelajaran)) {
            foreach ($mataPelajaran as $item) {
                $nilaiUtsUasGanjil = new nilaiUtsUas;
                $nilaiUtsUasGanjil->idKelas = $kelasGanjil->id;
                $nilaiUtsUasGanjil->mataPelajaran = $item;
                $nilaiUtsUasGanjil->save();
            }
        }
        //nilai Akhir ganjil
        if (is_array($mataPelajaran) || is_object($mataPelajaran)) {
            foreach ($mataPelajaran as $item) {
                $nilaiAkhirGanjil = new nilaiAkhir;
                $nilaiAkhirGanjil->idKelas = $kelasGanjil->id;
                $nilaiAkhirGanjil->mataPelajaran = $item;
                $nilaiAkhirGanjil->save();
            }
        }
        //nilai sikap untuk nilai akhir
        $nilaiSikapGanjil = new nilaiAkhirSikap;
        $nilaiSikapGanjil->idKelas = $kelasGanjil->id;
        $nilaiSikapGanjil->save();

        /////////
        if (is_array($tema) || is_object($tema)) {
            foreach ($tema as $data) {
                if (is_array($mataPelajaran) || is_object($mataPelajaran)) 
                {
                    foreach ($mataPelajaran as $item) {
                        $nilaiTemaGenap = new nilaiTema;
                        $nilaiTemaGenap->idKelas = $kelasGenap->id;
                        $nilaiTemaGenap->tema = $data;
                        $nilaiTemaGenap->mataPelajaran = $item;
                        $nilaiTemaGenap->save();
                    }
                }
            }
        }
        //nilai sikap untuk tema
        if (is_array($tema) || is_object($tema)) 
        {
            foreach ($tema as $item) {
                $nilaiSikapGenap = new nilaiSikapSpritual;
                $nilaiSikapGenap->idKelas = $kelasGenap->id;
                $nilaiSikapGenap->tema = $item;
                $nilaiSikapGenap->save();
            }
        }

        //nilai UTS UAS ganjil
        if (is_array($mataPelajaran) || is_object($mataPelajaran)) {
            foreach ($mataPelajaran as $item) {
                $nilaiUtsUasGenap = new nilaiUtsUas;
                $nilaiUtsUasGenap->idKelas = $kelasGenap->id;
                $nilaiUtsUasGenap->mataPelajaran = $item;
                $nilaiUtsUasGenap->save();
            }
        }
        //nilai Akhir ganjil
        if (is_array($mataPelajaran) || is_object($mataPelajaran)) {
            foreach ($mataPelajaran as $item) {
                $nilaiAkhirGenap = new nilaiAkhir;
                $nilaiAkhirGenap->idKelas = $kelasGenap->id;
                $nilaiAkhirGenap->mataPelajaran = $item;
                $nilaiAkhirGenap->save();
            }
        }
        //nilai sikap untuk nilai akhir
        $nilaiSikapGenap = new nilaiAkhirSikap;
        $nilaiSikapGenap->idKelas = $kelasGenap->id;
        $nilaiSikapGenap->save();

        
        return redirect('/daftarSiswa')->with('success', 'data siswa baru telah dibuat!');
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
