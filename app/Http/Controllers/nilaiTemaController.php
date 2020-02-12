<?php

namespace App\Http\Controllers;

use App\jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\siswa;
use App\User;
use App\kelas;
use App\nilaiSikapSpritual;
use App\nilaiTema;
use App\Charts\nilaiTemaChart;
use App\Charts\rataTema;
use App\nilaiSubtema;
use App\tema;
use App\nilai;
use App\subtema;
use Illuminate\Support\Facades\Auth;

class nilaiTemaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function daftarNilaiTema()
    {
        $user = Auth::user();
        if(request()->has('semester')){
            $siswa = DB::table('siswas')
            ->join('kelas', 'kelas.idSiswa', '=', 'siswas.id')
            ->select('siswas.*','kelas.*')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.kelas', $user->kelas)
            ->where('kelas.semester',request('semester'))
            ->where('kelas.status', 'proses pembelajaran')
            ->get('nilai_temas.pRata');
        }else {
            $siswa = DB::table('siswas')
            ->join('kelas', 'kelas.idSiswa', '=', 'siswas.id')
            ->select('siswas.*','kelas.*')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.kelas', $user->kelas)
            ->where('kelas.semester','ganjil')
            ->where('kelas.status', 'proses pembelajaran')
            ->get('nilai_temas.pRata');
        }

        //membuat chart
        //rata rata tiap tema semester ganjil
        $pag1 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Pendidikan Agama dan Budi Pekerti')
        ->where('nilai_temas.tema', '1')
        ->get()
        ->avg('pRata');
        $pag2 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Pendidikan Agama dan Budi Pekerti')
        ->where('nilai_temas.tema', '2')
        ->get()
        ->avg('pRata');
        $pag3 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Pendidikan Agama dan Budi Pekerti')
        ->where('nilai_temas.tema', '3')
        ->get()
        ->avg('pRata');
        $pag4 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Pendidikan Agama dan Budi Pekerti')
        ->where('nilai_temas.tema', '4')
        ->get()
        ->avg('pRata');

        $pkn1 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Pendidikan Pancasila dan Kewarganegaraan')
        ->where('nilai_temas.tema', '1')
        ->get()
        ->avg('pRata');
        $pkn2 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Pendidikan Pancasila dan Kewarganegaraan')
        ->where('nilai_temas.tema', '2')
        ->get()
        ->avg('pRata');
        $pkn3 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Pendidikan Pancasila dan Kewarganegaraan')
        ->where('nilai_temas.tema', '3')
        ->get()
        ->avg('pRata');
        $pkn4 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Pendidikan Pancasila dan Kewarganegaraan')
        ->where('nilai_temas.tema', '4')
        ->get()
        ->avg('pRata');

        $bi1 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Bahasa Indonesia')
        ->where('nilai_temas.tema', '1')
        ->get()
        ->avg('pRata');
        $bi2 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Bahasa Indonesia')
        ->where('nilai_temas.tema', '2')
        ->get()
        ->avg('pRata');
        $bi3 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Bahasa Indonesia')
        ->where('nilai_temas.tema', '3')
        ->get()
        ->avg('pRata');
        $bi4 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Bahasa Indonesia')
        ->where('nilai_temas.tema', '4')
        ->get()
        ->avg('pRata');

        
        $mtk1 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Matematika')
        ->where('nilai_temas.tema', '1')
        ->get()
        ->avg('pRata');
        $mtk2 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Matematika')
        ->where('nilai_temas.tema', '2')
        ->get()
        ->avg('pRata');
        $mtk3 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Matematika')
        ->where('nilai_temas.tema', '3')
        ->get()
        ->avg('pRata');
        $mtk4 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Matematika')
        ->where('nilai_temas.tema', '4')
        ->get()
        ->avg('pRata');

        $ipa1 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Ilmu Pengetahuan Alam')
        ->where('nilai_temas.tema', '1')
        ->get()
        ->avg('pRata');
        $ipa2 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Ilmu Pengetahuan Alam')
        ->where('nilai_temas.tema', '2')
        ->get()
        ->avg('pRata');
        $ipa3 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Ilmu Pengetahuan Alam')
        ->where('nilai_temas.tema', '3')
        ->get()
        ->avg('pRata');
        $ipa4 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Ilmu Pengetahuan Alam')
        ->where('nilai_temas.tema', '4')
        ->get()
        ->avg('pRata');

        $bing1 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Bahasa Inggris')
        ->where('nilai_temas.tema', '1')
        ->get()
        ->avg('pRata');
        $bing2 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Bahasa Inggris')
        ->where('nilai_temas.tema', '2')
        ->get()
        ->avg('pRata');
        $bing3 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Bahasa Inggris')
        ->where('nilai_temas.tema', '3')
        ->get()
        ->avg('pRata');
        $bing4 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Bahasa Inggris')
        ->where('nilai_temas.tema', '4')
        ->get()
        ->avg('pRata');

        $penjas1 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Pendidikan Jasmani, Olah Raga, dan Kesehatan')
        ->where('nilai_temas.tema', '1')
        ->get()
        ->avg('pRata');
        $penjas2 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Pendidikan Jasmani, Olah Raga, dan Kesehatan')
        ->where('nilai_temas.tema', '2')
        ->get()
        ->avg('pRata');
        $penjas3 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Pendidikan Jasmani, Olah Raga, dan Kesehatan')
        ->where('nilai_temas.tema', '3')
        ->get()
        ->avg('pRata');
        $penjas4 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Pendidikan Jasmani, Olah Raga, dan Kesehatan')
        ->where('nilai_temas.tema', '4')
        ->get()
        ->avg('pRata');

        $prak1 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Prakarya')
        ->where('nilai_temas.tema', '1')
        ->get()
        ->avg('pRata');
        $prak2 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Prakarya')
        ->where('nilai_temas.tema', '2')
        ->get()
        ->avg('pRata');
        $prak3 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Prakarya')
        ->where('nilai_temas.tema', '3')
        ->get()
        ->avg('pRata');
        $prak4 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Prakarya')
        ->where('nilai_temas.tema', '4')
        ->get()
        ->avg('pRata');

        $pkbn1 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Program Khusus (Bina Diri)')
        ->where('nilai_temas.tema', '1')
        ->get()
        ->avg('pRata');
        $pkbn2 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Program Khusus (Bina Diri)')
        ->where('nilai_temas.tema', '2')
        ->get()
        ->avg('pRata');
        $pkbn3 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Program Khusus (Bina Diri)')
        ->where('nilai_temas.tema', '3')
        ->get()
        ->avg('pRata');
        $pkbn4 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Program Khusus (Bina Diri)')
        ->where('nilai_temas.tema', '4')
        ->get()
        ->avg('pRata');
        
        $mulok1 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Mulok (Bahasa Jawa)')
        ->where('nilai_temas.tema', '1')
        ->get()
        ->avg('pRata');
        $mulok2 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Mulok (Bahasa Jawa)')
        ->where('nilai_temas.tema', '2')
        ->get()
        ->avg('pRata');
        $mulok3 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Mulok (Bahasa Jawa)')
        ->where('nilai_temas.tema', '3')
        ->get()
        ->avg('pRata');
        $mulok4 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Mulok (Bahasa Jawa)')
        ->where('nilai_temas.tema', '4')
        ->get()
        ->avg('pRata');
        
        $mulok4 = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Mulok (Bahasa Jawa)')
        ->where('nilai_temas.tema', '4')
        ->get()
        ->avg('pRata');

        //rata rata tiap tema semester genap
        $pag1Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Pendidikan Agama dan Budi Pekerti')
        ->where('nilai_temas.tema', '1')
        ->get()
        ->avg('pRata');
        $pag2Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Pendidikan Agama dan Budi Pekerti')
        ->where('nilai_temas.tema', '2')
        ->get()
        ->avg('pRata');
        $pag3Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Pendidikan Agama dan Budi Pekerti')
        ->where('nilai_temas.tema', '3')
        ->get()
        ->avg('pRata');
        $pag4Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Pendidikan Agama dan Budi Pekerti')
        ->where('nilai_temas.tema', '4')
        ->get()
        ->avg('pRata');

        $pkn1Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Pendidikan Pancasila dan Kewarganegaraan')
        ->where('nilai_temas.tema', '1')
        ->get()
        ->avg('pRata');
        $pkn2Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Pendidikan Pancasila dan Kewarganegaraan')
        ->where('nilai_temas.tema', '2')
        ->get()
        ->avg('pRata');
        $pkn3Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Pendidikan Pancasila dan Kewarganegaraan')
        ->where('nilai_temas.tema', '3')
        ->get()
        ->avg('pRata');
        $pkn4Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Pendidikan Pancasila dan Kewarganegaraan')
        ->where('nilai_temas.tema', '4')
        ->get()
        ->avg('pRata');

        $bi1Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Bahasa Indonesia')
        ->where('nilai_temas.tema', '1')
        ->get()
        ->avg('pRata');
        $bi2Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Bahasa Indonesia')
        ->where('nilai_temas.tema', '2')
        ->get()
        ->avg('pRata');
        $bi3Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Bahasa Indonesia')
        ->where('nilai_temas.tema', '3')
        ->get()
        ->avg('pRata');
        $bi4Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Bahasa Indonesia')
        ->where('nilai_temas.tema', '4')
        ->get()
        ->avg('pRata');

        
        $mtk1Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Matematika')
        ->where('nilai_temas.tema', '1')
        ->get()
        ->avg('pRata');
        $mtk2Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Matematika')
        ->where('nilai_temas.tema', '2')
        ->get()
        ->avg('pRata');
        $mtk3Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Matematika')
        ->where('nilai_temas.tema', '3')
        ->get()
        ->avg('pRata');
        $mtk4Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Matematika')
        ->where('nilai_temas.tema', '4')
        ->get()
        ->avg('pRata');

        $ipa1Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Ilmu Pengetahuan Alam')
        ->where('nilai_temas.tema', '1')
        ->get()
        ->avg('pRata');
        $ipa2Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Ilmu Pengetahuan Alam')
        ->where('nilai_temas.tema', '2')
        ->get()
        ->avg('pRata');
        $ipa3Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Ilmu Pengetahuan Alam')
        ->where('nilai_temas.tema', '3')
        ->get()
        ->avg('pRata');
        $ipa4Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Ilmu Pengetahuan Alam')
        ->where('nilai_temas.tema', '4')
        ->get()
        ->avg('pRata');

        $bing1Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Bahasa Inggris')
        ->where('nilai_temas.tema', '1')
        ->get()
        ->avg('pRata');
        $bing2Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Bahasa Inggris')
        ->where('nilai_temas.tema', '2')
        ->get()
        ->avg('pRata');
        $bing3Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Bahasa Inggris')
        ->where('nilai_temas.tema', '3')
        ->get()
        ->avg('pRata');
        $bing4Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Bahasa Inggris')
        ->where('nilai_temas.tema', '4')
        ->get()
        ->avg('pRata');

        $penjas1Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Pendidikan Jasmani, Olah Raga, dan Kesehatan')
        ->where('nilai_temas.tema', '1')
        ->get()
        ->avg('pRata');
        $penjas2Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Pendidikan Jasmani, Olah Raga, dan Kesehatan')
        ->where('nilai_temas.tema', '2')
        ->get()
        ->avg('pRata');
        $penjas3Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','ganjil')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Pendidikan Jasmani, Olah Raga, dan Kesehatan')
        ->where('nilai_temas.tema', '3')
        ->get()
        ->avg('pRata');
        $penjas4Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Pendidikan Jasmani, Olah Raga, dan Kesehatan')
        ->where('nilai_temas.tema', '4')
        ->get()
        ->avg('pRata');

        $prak1Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Prakarya')
        ->where('nilai_temas.tema', '1')
        ->get()
        ->avg('pRata');
        $prak2Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Prakarya')
        ->where('nilai_temas.tema', '2')
        ->get()
        ->avg('pRata');
        $prak3Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Prakarya')
        ->where('nilai_temas.tema', '3')
        ->get()
        ->avg('pRata');
        $prak4Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Prakarya')
        ->where('nilai_temas.tema', '4')
        ->get()
        ->avg('pRata');

        $pkbn1Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Program Khusus (Bina Diri)')
        ->where('nilai_temas.tema', '1')
        ->get()
        ->avg('pRata');
        $pkbn2Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Program Khusus (Bina Diri)')
        ->where('nilai_temas.tema', '2')
        ->get()
        ->avg('pRata');
        $pkbn3Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Program Khusus (Bina Diri)')
        ->where('nilai_temas.tema', '3')
        ->get()
        ->avg('pRata');
        $pkbn4Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Program Khusus (Bina Diri)')
        ->where('nilai_temas.tema', '4')
        ->get()
        ->avg('pRata');
        
        $mulok1Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Mulok (Bahasa Jawa)')
        ->where('nilai_temas.tema', '1')
        ->get()
        ->avg('pRata');
        $mulok2Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Mulok (Bahasa Jawa)')
        ->where('nilai_temas.tema', '2')
        ->get()
        ->avg('pRata');
        $mulok3Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Mulok (Bahasa Jawa)')
        ->where('nilai_temas.tema', '3')
        ->get()
        ->avg('pRata');
        $mulok4Genap = DB::table('nilai_temas')
        ->join('kelas', 'kelas.id', '=', 'nilai_temas.idKelas')            
        ->select('nilai_temas.pRata')
        ->where('kelas.idWaliKelas', $user->id)
        ->where('kelas.semester','genap')
        ->where('kelas.kelas', $user->kelas)
        ->where('nilai_temas.mataPelajaran', 'Mulok (Bahasa Jawa)')
        ->where('nilai_temas.tema', '4')
        ->get()
        ->avg('pRata');
        
       
        
        
        $rataTema = new rataTema;
        $rataTema->labels(['Tema 1', 'Tema 2', 'Tema 3', 'Tema 4']);
        $rataTema->dataset('Pendidikan Agama dan Budi Pekerti', 'line', [$pag1,$pag2,$pag3,$pag4]);
        $rataTema->dataset('Pendidikan Pancasila dan Kewarganegaraan', 'line', [$pkn1,$pkn2,$pkn3,$pkn4]);
        $rataTema->dataset('Bahasa Indonesia', 'line', [$bi1,$bi2,$bi3,$bi4]);
        $rataTema->dataset('Matematika', 'line', [$mtk1,$mtk2,$mtk3,$mtk4]);
        $rataTema->dataset('Ilmu Pengetahuan Alam', 'line', [$ipa1,$ipa2,$ipa3,$ipa4]);
        $rataTema->dataset('Bahasa Inggris', 'line', [$bing1,$bing2,$bing3,$bing4]);
        $rataTema->dataset('Pendidikan Jasmani, Olah Raga, dan Kesehatan', 'line', [$penjas1,$penjas2,$penjas3,$penjas4]);
        $rataTema->dataset('Prakarya', 'line', [$prak1,$prak2,$prak3,$prak4]);
        $rataTema->dataset('Program Khusus (Bina Diri)', 'line', [$pkbn1,$pkbn2,$pkbn3,$pkbn4]);
        $rataTema->dataset('Mulok (Bahasa Jawa)', 'line', [$mulok1,$mulok2,$mulok3,$mulok4]);
        
        $rataTemaGenap = new rataTema;
        $rataTemaGenap->labels(['Tema 1', 'Tema 2', 'Tema 3', 'Tema 4']);
        $rataTemaGenap->dataset('Pendidikan Agama dan Budi Pekerti', 'line', [$pag1Genap,$pag2Genap,$pag3Genap,$pag4Genap]);
        $rataTemaGenap->dataset('Pendidikan Pancasila dan Kewarganegaraan', 'line', [$pkn1Genap,$pkn2Genap,$pkn3Genap,$pkn4Genap]);
        $rataTemaGenap->dataset('Bahasa Indonesia', 'line', [$bi1Genap,$bi2Genap,$bi3Genap,$bi4Genap]);
        $rataTemaGenap->dataset('Matematika', 'line', [$mtk1Genap,$mtk2Genap,$mtk3Genap,$mtk4Genap]);
        $rataTemaGenap->dataset('Ilmu Pengetahuan Alam', 'line', [$ipa1Genap,$ipa2Genap,$ipa3Genap,$ipa4Genap]);
        $rataTemaGenap->dataset('Bahasa Inggris', 'line', [$bing1Genap,$bing2Genap,$bing3Genap,$bing4Genap]);
        $rataTemaGenap->dataset('Pendidikan Jasmani, Olah Raga, dan Kesehatan', 'line', [$penjas1Genap,$penjas2Genap,$penjas3Genap,$penjas4Genap]);
        $rataTemaGenap->dataset('Prakarya', 'line', [$prak1Genap,$prak2Genap,$prak3Genap,$prak4Genap]);
        $rataTemaGenap->dataset('Program Khusus (Bina Diri)', 'line', [$pkbn1Genap,$pkbn2Genap,$pkbn3Genap,$pkbn4Genap]);
        $rataTemaGenap->dataset('Mulok (Bahasa Jawa)', 'line', [$mulok1Genap,$mulok2Genap,$mulok3Genap,$mulok4Genap]);
        
        
        return view('tema.daftarNilaiTema')->with(['siswa'=> $siswa,'rataTema'=>$rataTema,'rataTemaGenap'=>$rataTemaGenap]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $siswa = siswa::find($user->idSiswa);
        $kelasSiswa = kelas::where([
            ['idSiswa','=',$siswa->id],
            ['semester','=','ganjil'],
        ])->get();
        $kelas = kelas::where([
            ['idSiswa','=',$siswa->id],
            ['kelas','=',$siswa->kelas],
            ])->first();
        $nilaiTema = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','1']
        ])->first();
        $nilai = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','1']
        ])->get();
        $nilaiSikap = nilaiSikapSpritual::where([
            ['idKelas',$kelas->id],
        ])->first();
        $judul = tema::where([
            ['tema',$nilaiTema->tema]
        ])->first();

        //mebuat chart
        $pag1 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','1'],
            ['mataPelajaran','Pendidikan Agama dan Budi Pekerti']
        ])->first();
        $pag2 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','2'],
            ['mataPelajaran','Pendidikan Agama dan Budi Pekerti']
        ])->first();
        $pag3 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','3'],
            ['mataPelajaran','Pendidikan Agama dan Budi Pekerti']
        ])->first();
        $pag4 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','4'],
            ['mataPelajaran','Pendidikan Agama dan Budi Pekerti']
        ])->first();
        $pkn1 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','1'],
            ['mataPelajaran','Pendidikan Pancasila dan Kewarganegaraan']
        ])->first();
        $pkn2 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','2'],
            ['mataPelajaran','Pendidikan Pancasila dan Kewarganegaraan']
        ])->first();
        $pkn3 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','3'],
            ['mataPelajaran','Pendidikan Pancasila dan Kewarganegaraan']
        ])->first();
        $pkn4 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','4'],
            ['mataPelajaran','Pendidikan Pancasila dan Kewarganegaraan']
        ])->first();
        $bi1 =  nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','1'],
            ['mataPelajaran','Bahasa Indonesia']
        ])->first();
        $bi2 =  nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','2'],
            ['mataPelajaran','Bahasa Indonesia']
        ])->first();
        $bi3 =  nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','3'],
            ['mataPelajaran','Bahasa Indonesia']
        ])->first();
        $bi4 =  nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','4'],
            ['mataPelajaran','Bahasa Indonesia']
        ])->first();
        $mtk1 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','1'],
            ['mataPelajaran','Matematika']
        ])->first();
        $mtk2 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','2'],
            ['mataPelajaran','Matematika']
        ])->first();
        $mtk3 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','3'],
            ['mataPelajaran','Matematika']
        ])->first();
        $mtk4 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','4'],
            ['mataPelajaran','Matematika']
        ])->first();

        $ipa1 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','1'],
            ['mataPelajaran','Ilmu Pengetahuan Alam']
        ])->first();
        $ipa2 =nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','2'],
            ['mataPelajaran','Ilmu Pengetahuan Alam']
        ])->first();
        $ipa3 =nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','3'],
            ['mataPelajaran','Ilmu Pengetahuan Alam']
        ])->first();
        $ipa4 =nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','4'],
            ['mataPelajaran','Ilmu Pengetahuan Alam']
        ])->first();
        $bing1 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','1'],
            ['mataPelajaran','Bahasa Inggris']
        ])->first();
        $bing2 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','2'],
            ['mataPelajaran','Bahasa Inggris']
        ])->first();
        $bing3 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','3'],
            ['mataPelajaran','Bahasa Inggris']
        ])->first();
        $bing4 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','4'],
            ['mataPelajaran','Bahasa Inggris']
        ])->first();

        $penjas1 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','1'],
            ['mataPelajaran','Pendidikan Jasmani, Olah Raga, dan Kesehatan']
        ])->first();
        $penjas2 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','2'],
            ['mataPelajaran','Pendidikan Jasmani, Olah Raga, dan Kesehatan']
        ])->first();
        $penjas3 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','3'],
            ['mataPelajaran','Pendidikan Jasmani, Olah Raga, dan Kesehatan']
        ])->first();
        $penjas4 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','4'],
            ['mataPelajaran','Pendidikan Jasmani, Olah Raga, dan Kesehatan']
        ])->first();
        $prak1 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','1'],
            ['mataPelajaran','Prakarya']
        ])->first();
        $prak2 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','2'],
            ['mataPelajaran','Prakarya']
        ])->first();
        $prak3 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','3'],
            ['mataPelajaran','Prakarya']
        ])->first();
        $prak4 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','4'],
            ['mataPelajaran','Prakarya']
        ])->first();      
        $pkbn1 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','1'],
            ['mataPelajaran','Program Khusus (Bina Diri)']
        ])->first();
        $pkbn2 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','2'],
            ['mataPelajaran','Program Khusus (Bina Diri)']
        ])->first();
        $pkbn3 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','3'],
            ['mataPelajaran','Program Khusus (Bina Diri)']
        ])->first();
        $pkbn4 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','4'],
            ['mataPelajaran','Program Khusus (Bina Diri)']
        ])->first();
        $mulok1 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','1'],
            ['mataPelajaran','Mulok (Bahasa Jawa)']
        ])->first();
        $mulok2 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','2'],
            ['mataPelajaran','Mulok (Bahasa Jawa)']
        ])->first();
        $mulok3 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','3'],
            ['mataPelajaran','Mulok (Bahasa Jawa)']
        ])->first();
        $mulok4 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','4'],
            ['mataPelajaran','Mulok (Bahasa Jawa)']
        ])->first();

        
        $nilaiTemaChart = new nilaiTemaChart;
        $nilaiTemaChart->labels(['Tema 1', 'Tema 2', 'Tema 3', 'Tema 4']);
        $nilaiTemaChart->dataset('Pendidikan Agama dan Budi Pekerti', 'line', [$pag1->pRata,$pag2->pRata,$pag3->pRata,$pag4->pRata]);
        $nilaiTemaChart->dataset('Pendidikan Pancasila dan Kewarganegaraan', 'line', [$pkn1->pRata,$pkn2->pRata,$pkn3->pRata,$pkn4->pRata]);
        $nilaiTemaChart->dataset('Bahasa Indonesia', 'line', [$bi1->pRata,$bi2->pRata,$bi3->pRata,$bi4->pRata]);
        $nilaiTemaChart->dataset('Matematika', 'line', [$mtk1->pRata,$mtk2->pRata,$mtk3->pRata,$mtk4->pRata]);
        $nilaiTemaChart->dataset('Ilmu Pengetahuan Alam', 'line', [$ipa1->pRata,$ipa2->pRata,$ipa3->pRata,$ipa4->pRata]);
        $nilaiTemaChart->dataset('Bahasa Inggris', 'line', [$bing1->pRata,$bing2->pRata,$bing3->pRata,$bing4->pRata]);
        $nilaiTemaChart->dataset('Pendidikan Jasmani, Olah Raga, dan Kesehatan', 'line', [$penjas1->pRata,$penjas2->pRata,$penjas3->pRata,$penjas4->pRata]);
        $nilaiTemaChart->dataset('Prakarya', 'line', [$prak1->pRata,$prak2->pRata,$prak3->pRata,$prak4->pRata]);
        $nilaiTemaChart->dataset('Program Khusus (Bina Diri)', 'line', [$pkbn1->pRata,$pkbn2->pRata,$pkbn3->pRata,$pkbn4->pRata]);
        $nilaiTemaChart->dataset('Mulok (Bahasa Jawa)', 'line', [$mulok1->pRata,$mulok2->pRata,$mulok3->pRata,$mulok4->pRata]);
        
        return view('tema.index')->with(
            ['nilaiTemaChart' => $nilaiTemaChart,
            'kelas' => $kelas, 'nilai' => $nilai,
            'nilaiTema' => $nilaiTema,
            'nilaiSikap' => $nilaiSikap,
            'judul' => $judul,
            'kelasSiswa'=>$kelasSiswa
            ]);

    }
    
    public function lihatNilai(Request $request){
        $user = Auth::user();
        $siswa = siswa::find($user->idSiswa);
        $kelasSiswa = kelas::where([
            ['idSiswa','=',$siswa->id],
            ['semester','=','ganjil'],
        ])->get();
        $kelas = kelas::where([
            ['idSiswa','=',$siswa->id],
            ['kelas','=',$request->input('kelas')],
            ['semester','=',$request->input('semester')]
            ])->first();
        $nilaiTema = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema',$request->input('tema')]
        ])->first();
        $nilai = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema',$request->input('tema')]
        ])->get();
        $nilaiSikap = nilaiSikapSpritual::where([
            ['idKelas',$kelas->id],
        ])->first();
        $judul = tema::where([
            ['tema',$nilaiTema->tema]
        ])->first();
        //mebuat chart
        $pag1 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','1'],
            ['mataPelajaran','Pendidikan Agama dan Budi Pekerti']
        ])->first();
        $pag2 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','2'],
            ['mataPelajaran','Pendidikan Agama dan Budi Pekerti']
        ])->first();
        $pag3 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','3'],
            ['mataPelajaran','Pendidikan Agama dan Budi Pekerti']
        ])->first();
        $pag4 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','4'],
            ['mataPelajaran','Pendidikan Agama dan Budi Pekerti']
        ])->first();


        $pkn1 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','1'],
            ['mataPelajaran','Pendidikan Pancasila dan Kewarganegaraan']
        ])->first();
        $pkn2 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','2'],
            ['mataPelajaran','Pendidikan Pancasila dan Kewarganegaraan']
        ])->first();
        $pkn3 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','3'],
            ['mataPelajaran','Pendidikan Pancasila dan Kewarganegaraan']
        ])->first();
        $pkn4 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','4'],
            ['mataPelajaran','Pendidikan Pancasila dan Kewarganegaraan']
        ])->first();


        $bi1 =  nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','1'],
            ['mataPelajaran','Bahasa Indonesia']
        ])->first();
        $bi2 =  nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','2'],
            ['mataPelajaran','Bahasa Indonesia']
        ])->first();
        $bi3 =  nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','3'],
            ['mataPelajaran','Bahasa Indonesia']
        ])->first();
        $bi4 =  nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','4'],
            ['mataPelajaran','Bahasa Indonesia']
        ])->first();


        $mtk1 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','1'],
            ['mataPelajaran','Matematika']
        ])->first();
        $mtk2 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','2'],
            ['mataPelajaran','Matematika']
        ])->first();
        $mtk3 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','3'],
            ['mataPelajaran','Matematika']
        ])->first();
        $mtk4 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','4'],
            ['mataPelajaran','Matematika']
        ])->first();

        $ipa1 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','1'],
            ['mataPelajaran','Ilmu Pengetahuan Alam']
        ])->first();
        $ipa2 =nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','2'],
            ['mataPelajaran','Ilmu Pengetahuan Alam']
        ])->first();
        $ipa3 =nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','3'],
            ['mataPelajaran','Ilmu Pengetahuan Alam']
        ])->first();
        $ipa4 =nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','4'],
            ['mataPelajaran','Ilmu Pengetahuan Alam']
        ])->first();

        $bing1 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','1'],
            ['mataPelajaran','Bahasa Inggris']
        ])->first();
        $bing2 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','2'],
            ['mataPelajaran','Bahasa Inggris']
        ])->first();
        $bing3 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','3'],
            ['mataPelajaran','Bahasa Inggris']
        ])->first();
        $bing4 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','4'],
            ['mataPelajaran','Bahasa Inggris']
        ])->first();

        $penjas1 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','1'],
            ['mataPelajaran','Pendidikan Jasmani, Olah Raga, dan Kesehatan']
        ])->first();
        $penjas2 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','2'],
            ['mataPelajaran','Pendidikan Jasmani, Olah Raga, dan Kesehatan']
        ])->first();
        $penjas3 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','3'],
            ['mataPelajaran','Pendidikan Jasmani, Olah Raga, dan Kesehatan']
        ])->first();
        $penjas4 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','4'],
            ['mataPelajaran','Pendidikan Jasmani, Olah Raga, dan Kesehatan']
        ])->first();
        $prak1 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','1'],
            ['mataPelajaran','Prakarya']
        ])->first();
        $prak2 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','2'],
            ['mataPelajaran','Prakarya']
        ])->first();
        $prak3 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','3'],
            ['mataPelajaran','Prakarya']
        ])->first();
        $prak4 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','4'],
            ['mataPelajaran','Prakarya']
        ])->first();
        
        $pkbn1 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','1'],
            ['mataPelajaran','Program Khusus (Bina Diri)']
        ])->first();
        $pkbn2 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','2'],
            ['mataPelajaran','Program Khusus (Bina Diri)']
        ])->first();
        $pkbn3 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','3'],
            ['mataPelajaran','Program Khusus (Bina Diri)']
        ])->first();
        $pkbn4 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','4'],
            ['mataPelajaran','Program Khusus (Bina Diri)']
        ])->first();
        $mulok1 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','1'],
            ['mataPelajaran','Mulok (Bahasa Jawa)']
        ])->first();
        $mulok2 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','2'],
            ['mataPelajaran','Mulok (Bahasa Jawa)']
        ])->first();
        $mulok3 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','3'],
            ['mataPelajaran','Mulok (Bahasa Jawa)']
        ])->first();
        $mulok4 = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema','4'],
            ['mataPelajaran','Mulok (Bahasa Jawa)']
        ])->first();

        
        $nilaiTemaChart = new nilaiTemaChart;
        $nilaiTemaChart->labels(['Tema 1', 'Tema 2', 'Tema 3', 'Tema 4']);
        $nilaiTemaChart->dataset('Pendidikan Agama dan Budi Pekerti', 'line', [$pag1->pRata,$pag2->pRata,$pag3->pRata,$pag4->pRata]);
        $nilaiTemaChart->dataset('Pendidikan Pancasila dan Kewarganegaraan', 'line', [$pkn1->pRata,$pkn2->pRata,$pkn3->pRata,$pkn4->pRata]);
        $nilaiTemaChart->dataset('Bahasa Indonesia', 'line', [$bi1->pRata,$bi2->pRata,$bi3->pRata,$bi4->pRata]);
        $nilaiTemaChart->dataset('Matematika', 'line', [$mtk1->pRata,$mtk2->pRata,$mtk3->pRata,$mtk4->pRata]);
        $nilaiTemaChart->dataset('Ilmu Pengetahuan Alam', 'line', [$ipa1->pRata,$ipa2->pRata,$ipa3->pRata,$ipa4->pRata]);
        $nilaiTemaChart->dataset('Bahasa Inggris', 'line', [$bing1->pRata,$bing2->pRata,$bing3->pRata,$bing4->pRata]);
        $nilaiTemaChart->dataset('Pendidikan Jasmani, Olah Raga, dan Kesehatan', 'line', [$penjas1->pRata,$penjas2->pRata,$penjas3->pRata,$penjas4->pRata]);
        $nilaiTemaChart->dataset('Prakarya', 'line', [$prak1->pRata,$prak2->pRata,$prak3->pRata,$prak4->pRata]);
        $nilaiTemaChart->dataset('Program Khusus (Bina Diri)', 'line', [$pkbn1->pRata,$pkbn2->pRata,$pkbn3->pRata,$pkbn4->pRata]);
        $nilaiTemaChart->dataset('Mulok (Bahasa Jawa)', 'line', [$mulok1->pRata,$mulok2->pRata,$mulok3->pRata,$mulok4->pRata]);
        

        
         
        return view('tema.index')->with(
            ['nilaiTemaChart' => $nilaiTemaChart,
            'kelas' => $kelas,
             'nilai' => $nilai,
            'nilaiTema' => $nilaiTema,
            'judul' => $judul,
            'nilaiSikap' => $nilaiSikap,
            'kelasSiswa' => $kelasSiswa,

            ]);
    }

    public function daftarNilaiSubtema(Request $request)
    {
        $user = Auth::user();
            if(request()->has('semester')){
                $namaSiswa = DB::table('siswas')
                ->join('kelas', 'kelas.idSiswa', '=', 'siswas.id')
                ->select('siswas.nama','kelas.*')
                ->where('kelas.idWaliKelas', $user->id)
                ->where('kelas.kelas', $user->kelas)
                ->where('kelas.semester',request('semester'))
                ->where('kelas.status', 'proses pembelajaran')
                ->get();
            }else {
                $namaSiswa = DB::table('siswas')
                ->join('kelas', 'kelas.idSiswa', '=', 'siswas.id')
                ->select('siswas.nama','kelas.*')
                ->where('kelas.idWaliKelas', $user->id)
                ->where('kelas.kelas', $user->kelas)
                ->where('kelas.semester','ganjil')
                ->where('kelas.status', 'proses pembelajaran')
                ->get();
            }
        return view('nilaiSubtema.daftarNilai')->with(['namaSiswa'=> $namaSiswa]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $kelas = kelas::where([
            ['idWaliKelas',$user->id],
            ['kelas', $user->kelas],
            ])->first();
        $siswa= siswa::where('id',$kelas->idSiswa)->first();
        $mataPelajaran = nilai::where([
            ['kelas',$user->kelas]
            ])->get();
        return view('nilaiSubtema.create')->with(['siswa'=> $siswa,'mataPelajaran'=> $mataPelajaran,'kelas'=>$kelas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tema' => 'required',
            'subtema' => 'required',
            'mataPelajaran' => 'required',
            'jenis' => 'required',
            'nilai' => 'required',
            'deskripsi' => 'required',
            'fotoSubtema' => 'image|nullable|max:1999',
        ]);
        //handle file upload
        if ($request->hasFile('fotoSubtema')) {
            //get filename with extension
            $filenameWithExt = $request->file('fotoSubtema')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('fotoSubtema')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //upload Image
            $path = $request->file('fotoSubtema')->storeAs('public/fotoSubtema', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $user = Auth::user();
        $kelas = kelas::where([
            ['idWaliKelas',$user->id],
            ['kelas', $user->kelas],
            ])->first();

        $nilai = new nilaiSubtema;
        $nilai->idKelas= $kelas->id; 
        $nilai->tema = $request->input('tema');
        $nilai->subtema = $request->input('subtema');
        $nilai->mataPelajaran = $request->input('mataPelajaran');
        $nilai->jenis = $request->input('jenis');
        $nilai->nilai = $request->input('nilai');
        $nilai->deskripsi = $request->input('deskripsi');
        $nilai->fotoHasil = $fileNameToStore;
        $nilai->save();
        
        //menyimpan nilai subtema ke dalam nilai tema
        $tema = nilaiTema::where([
            ['idKelas',$kelas->id],
            ['tema', $request->input('tema')],
            ['mataPelajaran', $request->input('mataPelajaran')]
        ])->first();
        if ($request->input('subtema')=='1' && $request->input('jenis')=='pengetahuan') {
            $tema->p1 = $request->input('nilai');
        }
        else if($request->input('subtema')=='2' && $request->input('jenis')=='pengetahuan')
        {
            $tema->p2 = $request->input('nilai');
        }
        else if($request->input('subtema')=='3' && $request->input('jenis')=='pengetahuan')
        {
            $tema->p3 = $request->input('nilai');
        }
        else if ($request->input('subtema')=='1' && $request->input('jenis')=='ketrampilan') {
            $tema->k1 = $request->input('nilai');
        }
        else if($request->input('subtema')=='2' && $request->input('jenis')=='ketrampilan')
        {
            $tema->k2  = $request->input('nilai');
        }
        else if($request->input('subtema')=='3' && $request->input('jenis')=='ketrampilan')
        {
            $tema->k3 = $request->input('nilai');
        }
        //menghitung nilai rata rata tema
        $pRata = ($tema->p3+$tema->p2+$tema->p1)/3;
        $kRata = ($tema->k1+$tema->k2+$tema->k3)/3;
        $tema->pRata = $pRata;
        $tema->kRata = $kRata;
        $tema->save();
        return redirect('/daftarNilaiSubtema')->with('success', 'nilai subtema telah dibuat!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (request()->has('tema')) {
        $kelas = kelas::find($id);
        $siswa = DB::table('siswas')
            ->join('kelas', 'kelas.idSiswa', '=', 'siswas.id')
            ->join('nilai_temas','nilai_temas.idKelas','=','kelas.id')
            ->select('siswas.nama','kelas.*','nilai_temas.tema')
            ->where('nilai_temas.tema',request('tema'))
            ->where('kelas.id', $kelas->id)
            ->first();
        $nilai = DB::table('siswas')
            ->join('kelas', 'kelas.idSiswa', '=', 'siswas.id')
            ->join('nilai_temas','nilai_temas.idKelas','=','kelas.id')
            ->select('siswas.nama','nilai_temas.*','kelas.kelas','kelas.semester','kelas.tahunAjaran')
            ->where('nilai_temas.tema',request('tema'))
            ->where('kelas.id', $kelas->id)
            ->get('nilai_temas.pRata');

        $nilaiSikap = DB::table('siswas')
        ->join('kelas', 'kelas.idSiswa', '=', 'siswas.id')
        ->join('nilai_sikap_sprituals','nilai_sikap_sprituals.idKelas','=','kelas.id')
        ->select('siswas.nama','kelas.*','nilai_sikap_sprituals.*')
        ->where('nilai_sikap_sprituals.tema',request('tema'))
        ->where('kelas.id', $kelas->id)
        ->first();
        }
        
        return view('tema.show')->with(['siswa' => $siswa, 'nilai' => $nilai, 'nilaiSikap' => $nilaiSikap]);

    }

    //untuk melihat nilai subtema siswa
    public function nilaiSubtema(Request $request, $id)
    {
        if(request()->has('tema'))
        {
            $kelas = kelas::find($id);
            $siswa = siswa::where('id',$kelas->idSiswa)->first();
            $nilaiTema = nilaiSubtema::where([
                ['idKelas',$kelas->id],
                ['tema',$request->input('tema')],
                ['jenis',$request->input('jenis')],
                ['subtema',$request->input('subtema')],
                ])->first();
            $nilai = nilaiSubtema::where([
                ['idKelas',$kelas->id],
                ['tema',$request->input('tema')],
                ['jenis',$request->input('jenis')],
                ['subtema',$request->input('subtema')],
                ])->get();
        }else{
            $kelas = kelas::find($id);
            $siswa = siswa::where('id',$kelas->idSiswa)->first();
            $nilaiTema = nilaiSubtema::where('idKelas',$kelas->id)->first();
            $nilai = nilaiSubtema::where([
                ['idKelas',$kelas->id],
                ['tema','1'],
                ['jenis','ketrampilan'],
                ['subtema','1'],
                ])->get();
        }
        
        return view('tema.showSubtema')->with(['nilaiTema' => $nilaiTema,'siswa' => $siswa, 'nilai' => $nilai, 'kelas' => $kelas]);
    }

    //melihat detail nilaiSubtema siswa
    public function showSubtema($id)
    {   
        $nilaiSubtema = nilaiSubtema::find($id);
        $kelas = kelas::where('id',$nilaiSubtema->idKelas)->first();
        $siswa = siswa::where('id',$kelas->idSiswa)->first();
        $subtema = subtema::where([
            ['idKelas',$kelas->id],
            ['tema',$nilaiSubtema->tema],
            ['subtema',$nilaiSubtema->subtema],
        ])->first();
        return view('nilaiSubtema.show')->with(['subtema' => $subtema,'nilaiSubtema' => $nilaiSubtema, 'siswa' => $siswa,  'kelas' => $kelas]);
    }

    //melihat nilai subtema dari sisi wali murid
    public function subtemaSiswa(Request $request)
    {
        $user = Auth::user();
        $siswa = siswa::where('id',$user->idSiswa)->first();
        $kelas = kelas::where([
            ['idSiswa',$siswa->id],
            ['kelas',$siswa->kelas]
        ])->first();
        if(request()->has('tema'))
        {
            
            $siswa = siswa::where('id',$kelas->idSiswa)->first();
            $nilaiTema = nilaiSubtema::where([
                ['idKelas',$kelas->id],
                ['tema',$request->input('tema')],
                ['jenis',$request->input('jenis')],
                ['subtema',$request->input('subtema')],
                ])->first();
            $nilai = nilaiSubtema::where([
                ['idKelas',$kelas->id],
                ['tema',$request->input('tema')],
                ['jenis',$request->input('jenis')],
                ['subtema',$request->input('subtema')],
                ])->get();
        }else{
            
            $siswa = siswa::where('id',$kelas->idSiswa)->first();
            $nilaiTema = nilaiSubtema::where('idKelas',$kelas->id)->first();
            $nilai = nilaiSubtema::where([
                ['idKelas',$kelas->id],
                ['tema','1'],
                ['jenis','ketrampilan'],
                ['subtema','1'],
                ])->get();
        }
        
        return view('nilaiSubtema.index')->with(['nilaiTema' => $nilaiTema,'siswa' => $siswa, 'nilai' => $nilai, 'kelas' => $kelas]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nilai = nilaiSubtema::find($id);
        $kelas = kelas::find($nilai->idKelas);
        $siswa = siswa::find($kelas->idSiswa);
        $info = jadwal::where([
            ['kelas', $kelas->kelas],
            ['semester', $kelas->semester],
            ['jenis', $nilai->tema]
        ])->first();
        $tanggal = date('Y-m-d');
        $subtema = subtema::where('tema',$nilai->tema)->first();
        return view('tema.edit')->with([
            'siswa' => $siswa, 'nilai' => $nilai, 'kelas' => $kelas,
             'info' => $info, 'tanggal' => $tanggal,'subtema'=>$subtema,
             ]);
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
            
            'nilai' => 'required',
            'deskripsi' => 'required',
            'fotoSubtema' => 'image|nullable|max:1999',
        ]);

        $nilai =  nilaiSubtema::find($id);
        $nilai->nilai = $request->input('nilai');
        $nilai->deskripsi = $request->input('deskripsi');
        //handle file upload
        if ($request->hasFile('fotoSubtema')) {
            //get filename with extension
            $filenameWithExt = $request->file('fotoSubtema')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('fotoSubtema')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //upload Image
            $path = $request->file('fotoSubtema')->storeAs('public/fotoSubtema', $fileNameToStore);
            if ($request->hasFile('fotoSubtema')) {
                Storage::delete('public/fotoSubtema/' . $nilai->fotoSubtema);
            }
            $nilai->fotoSubtema = $fileNameToStore;
        }
        $nilai->save();

        //menyimpan nilai subtema ke dalam nilai tema
        $tema = nilaiTema::where([
            ['idKelas',$nilai->idKelas],
            ['tema', $nilai->tema],
            ['mataPelajaran', $nilai->mataPelajaran]
        ])->first();
        if ($request->input('subtema')=='1' && $request->input('jenis')=='pengetahuan') {
            $tema->p1 = $request->input('nilai');
        }
        else if($request->input('subtema')=='2' && $request->input('jenis')=='pengetahuan')
        {
            $tema->p2 = $request->input('nilai');
        }
        else if($request->input('subtema')=='3' && $request->input('jenis')=='pengetahuan')
        {
            $tema->p3 = $request->input('nilai');
        }
        else if ($request->input('subtema')=='1' && $request->input('jenis')=='ketrampilan') {
            $tema->k1 = $request->input('nilai');
        }
        else if($request->input('subtema')=='2' && $request->input('jenis')=='ketrampilan')
        {
            $tema->k2  = $request->input('nilai');
        }
        else if($request->input('subtema')=='3' && $request->input('jenis')=='ketrampilan')
        {
            $tema->k3 = $request->input('nilai');
        }
        //menghitung nilai rata rata tema
        $pRata = ($tema->p3+$tema->p2+$tema->p1)/3;
        $kRata = ($tema->k1+$tema->k2+$tema->k3)/3;
        $tema->pRata = $pRata;
        $tema->kRata = $kRata;
        $tema->save();
        return redirect('/daftarNilaiSubtema')->with('success', 'nilai subtema telah dibuat!');

        return redirect('/daftarNilaiTema')->with('success', 'nilai tema berhasil diubah!');

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
