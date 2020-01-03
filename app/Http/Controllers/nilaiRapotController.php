<?php

namespace App\Http\Controllers;

use App\Charts\rataTema;
use App\jadwal;
use App\kelas;
use App\nilai;
use App\nilaiAkhir;
use App\nilaiAkhirSikap;
use App\nilaiTema;
use App\nilaiUtsUas;
use App\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class nilaiRapotController extends Controller
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
    public function daftarNilaiRapot()
    {
        $user = Auth::user();
        if(request()->has('semester')){
            $namaSiswa = DB::table('siswas')
            ->join('kelas', 'kelas.idSiswa', '=', 'siswas.id')
            ->select('siswas.*','kelas.*')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.kelas', $user->kelas)
            ->where('kelas.semester',request('semester'))
            
            ->get('nilai_temas.pRata');
        }else {
            $namaSiswa = DB::table('siswas')
            ->join('kelas', 'kelas.idSiswa', '=', 'siswas.id')
            ->select('siswas.*','kelas.*')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.kelas', $user->kelas)
            ->where('kelas.semester','ganjil')
            
            ->get('nilai_temas.pRata');
        }

        //membuat chart
        //chart nilai UTS ganjil
        $pagUtsGanjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Pendidikan Agama dan Budi Pekerti')
            ->get()
            ->avg('nilaiPengetahuan');

        $pknUtsGanjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Pendidikan Pancasila dan Kewarganegaraan')
            ->get()
            ->avg('nilaiPengetahuan');

        $biUtsGanjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Bahasa Indonesia')
            ->get()
            ->avg('nilaiPengetahuan');

        $mtkUtsGanjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Matematika')
            ->get()
            ->avg('nilaiPengetahuan');

        $ipaUtsGanjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Ilmu Pengetahuan Alam')
            ->get()
            ->avg('nilaiPengetahuan');

        $bingUtsGanjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Bahasa Inggris')
            ->get()
            ->avg('nilaiPengetahuan');

        $penjasUtsGanjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Pendidikan Jasmani, Olah Raga, dan Kesehatan')
            ->get()
            ->avg('nilaiPengetahuan');

        $prakUtsGanjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Prakarya')
            ->get()
            ->avg('nilaiPengetahuan');

        $pkbnUtsGanjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Program Khusus (Bina Diri)')
            ->get()
            ->avg('nilaiPengetahuan');

        $mulokUtsGanjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Mulok (Bahasa Jawa)')
            ->get()
            ->avg('nilaiPengetahuan');

        //nilai uts genap
        $pagUtsgenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Pendidikan Agama dan Budi Pekerti')
            ->get()
            ->avg('nilaiPengetahuan');

        $pknUtsgenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Pendidikan Pancasila dan Kewarganegaraan')
            ->get()
            ->avg('nilaiPengetahuan');

        $biUtsgenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Bahasa Indonesia')
            ->get()
            ->avg('nilaiPengetahuan');

        $mtkUtsgenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Matematika')
            ->get()
            ->avg('nilaiPengetahuan');

        $ipaUtsgenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Ilmu Pengetahuan Alam')
            ->get()
            ->avg('nilaiPengetahuan');

        $bingUtsgenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Bahasa Inggris')
            ->get()
            ->avg('nilaiPengetahuan');

        $penjasUtsgenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Pendidikan Jasmani, Olah Raga, dan Kesehatan')
            ->get()
            ->avg('nilaiPengetahuan');

        $prakUtsgenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Prakarya')
            ->get()
            ->avg('nilaiPengetahuan');

        $pkbnUtsgenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Program Khusus (Bina Diri)')
            ->get()
            ->avg('nilaiPengetahuan');

        $mulokUtsgenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Mulok (Bahasa Jawa)')
            ->get()
            ->avg('nilaiPengetahuan');
//chart nilai UAS genap
        $pagUASGenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Pendidikan Agama dan Budi Pekerti')
            ->get()
            ->avg('nilaiKetrampilan');

        $pknUASGenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Pendidikan Pancasila dan Kewarganegaraan')
            ->get()
            ->avg('nilaiKetrampilan');

        $biUASGenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Bahasa Indonesia')
            ->get()
            ->avg('nilaiKetrampilan');

        $mtkUASGenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Matematika')
            ->get()
            ->avg('nilaiKetrampilan');

        $ipaUASGenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Ilmu Pengetahuan Alam')
            ->get()
            ->avg('nilaiKetrampilan');

        $bingUASGenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Bahasa Inggris')
            ->get()
            ->avg('nilaiKetrampilan');

        $penjasUASGenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Pendidikan Jasmani, Olah Raga, dan Kesehatan')
            ->get()
            ->avg('nilaiKetrampilan');

        $prakUASGenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Prakarya')
            ->get()
            ->avg('nilaiKetrampilan');

        $pkbnUASGenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Program Khusus (Bina Diri)')
            ->get()
            ->avg('nilaiKetrampilan');

        $mulokUASGenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Mulok (Bahasa Jawa)')
            ->get()
            ->avg('nilaiKetrampilan');

//chart nilai UAS ganjil
        $pagUASganjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Pendidikan Agama dan Budi Pekerti')
            ->get()
            ->avg('nilaiKetrampilan');

        $pknUASganjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Pendidikan Pancasila dan Kewarganegaraan')
            ->get()
            ->avg('nilaiKetrampilan');

        $biUASganjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Bahasa Indonesia')
            ->get()
            ->avg('nilaiKetrampilan');

        $mtkUASganjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Matematika')
            ->get()
            ->avg('nilaiKetrampilan');

        $ipaUASganjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Ilmu Pengetahuan Alam')
            ->get()
            ->avg('nilaiKetrampilan');

        $bingUASganjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Bahasa Inggris')
            ->get()
            ->avg('nilaiKetrampilan');

        $penjasUASganjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Pendidikan Jasmani, Olah Raga, dan Kesehatan')
            ->get()
            ->avg('nilaiKetrampilan');

        $prakUASganjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Prakarya')
            ->get()
            ->avg('nilaiKetrampilan');

        $pkbnUASganjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Program Khusus (Bina Diri)')
            ->get()
            ->avg('nilaiKetrampilan');

        $mulokUASganjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', 'Mulok (Bahasa Jawa)')
            ->get()
            ->avg('nilaiKetrampilan');

        $uts = new rataTema;
        $uts->labels(['Semester Ganjil', 'Semester Genap']);
        $uts->dataset('Pendidikan Agama dan Budi Pekerti', 'line', [$pagUtsGanjil, $pagUtsgenap]);
        $uts->dataset('Pendidikan Pancasila dan Kewarganegaraan', 'line', [$pknUtsGanjil, $pknUtsgenap]);
        $uts->dataset('Bahasa Indonesia', 'line', [$biUtsGanjil, $biUtsgenap]);
        $uts->dataset('Matematika', 'line', [$mtkUtsGanjil, $mtkUtsgenap]);
        $uts->dataset('Ilmu Pengetahuan Alam', 'line', [$ipaUtsGanjil, $ipaUtsgenap]);
        $uts->dataset('Bahasa Inggris', 'line', [$bingUtsGanjil, $bingUtsgenap]);
        $uts->dataset('Pendidikan Jasmani, Olah Raga, dan Kesehatan', 'line', [$penjasUtsGanjil, $penjasUtsgenap]);
        $uts->dataset('Prakarya', 'line', [$prakUtsGanjil, $prakUtsGanjil]);
        $uts->dataset('Program Khusus (Bina Diri)', 'line', [$pkbnUtsGanjil, $pkbnUtsGanjil]);
        $uts->dataset('Mulok (Bahasa Jawa)', 'line', [$mulokUtsGanjil, $mulokUtsGanjil]);

        $uas = new rataTema;
        $uas->labels(['Semester Ganjil', 'Semester Genap']);
        $uas->dataset('Pendidikan Agama dan Budi Pekerti', 'line', [$pagUASganjil, $pagUASGenap]);
        $uas->dataset('Pendidikan Pancasila dan Kewarganegaraan', 'line', [$pknUASganjil, $pknUASGenap]);
        $uas->dataset('Bahasa Indonesia', 'line', [$biUASganjil, $biUASGenap]);
        $uas->dataset('Matematika', 'line', [$mtkUASganjil, $mtkUASGenap]);
        $uas->dataset('Ilmu Pengetahuan Alam', 'line', [$ipaUASganjil, $ipaUASGenap]);
        $uas->dataset('Bahasa Inggris', 'line', [$bingUASganjil, $bingUASGenap]);
        $uas->dataset('Pendidikan Jasmani, Olah Raga, dan Kesehatan', 'line', [$penjasUASganjil, $penjasUASGenap]);
        $uas->dataset('Prakarya', 'line', [$prakUASganjil, $prakUASGenap]);
        $uas->dataset('Program Khusus (Bina Diri)', 'line', [$pkbnUASganjil, $pkbnUASGenap]);
        $uas->dataset('Mulok (Bahasa Jawa)', 'line', [$mulokUASganjil, $mulokUASGenap]);
        // pie chart per mata pelajaran
        $nilai = nilai::where([
            ['mataPelajaran', 'Pendidikan Agama dan Budi Pekerti'],
            ['kelas', $user->kelas],
        ])->first();
        $pagUtsTinggiGanjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_akhirs.nilaiPengetahuan', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiPengetahuan');
        $pagUtsRendahGanjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_akhirs.nilaiPengetahuan', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiPengetahuan');

        $agamaGanjil = new rataTema;
        $agamaGanjil->labels(['Lulus', 'Tidak Lulus']);
        $agamaGanjil->dataset('Pendidikan Agama dan Budi Pekerti', 'pie', [$pagUtsTinggiGanjil, $pagUtsRendahGanjil]);

        $pagUasTinggiGenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_akhirs.nilaiKetrampilan', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiKetrampilan');
        $pagUasRendahGenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_akhirs.nilaiKetrampilan', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiKetrampilan');
        $agamaGenap = new rataTema;
        $agamaGenap->labels(['Lulus', 'Tidak Lulus']);
        $agamaGenap->dataset('Pendidikan Agama dan Budi Pekerti', 'pie', [$pagUasTinggiGenap, $pagUasRendahGenap]);

        $nilai = nilai::where([
            ['mataPelajaran', 'Pendidikan Pancasila dan Kewarganegaraan'],
            ['kelas', $user->kelas],
        ])->first();
        $pknUtsTinggiGanjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_akhirs.nilaiPengetahuan', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiPengetahuan');
        $pknUtsRendahGanjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_akhirs.nilaiPengetahuan', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiPengetahuan');
        $pknGanjil = new rataTema;
        $pknGanjil->labels(['Lulus', 'Tidak Lulus']);
        $pknGanjil->dataset($nilai->mataPelajaran, 'pie', [$pknUtsTinggiGanjil, $pknUtsRendahGanjil]);

        $pknUasTinggiGenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_akhirs.nilaiKetrampilan', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiKetrampilan');
        $pknUasRendahGenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_akhirs.nilaiKetrampilan', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiKetrampilan');
        $pknGenap = new rataTema;
        $pknGenap->labels(['Lulus', 'Tidak Lulus']);
        $pknGenap->dataset('$nilai->mataPelajaran', 'pie', [$pknUasTinggiGenap, $pknUasRendahGenap]);

        $nilai = nilai::where([
            ['mataPelajaran', 'Bahasa Indonesia'],
            ['kelas', $user->kelas],
        ])->first();
        $biUtsTinggiGanjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_akhirs.nilaiPengetahuan', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiPengetahuan');
        $biUtsRendahGanjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_akhirs.nilaiPengetahuan', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiPengetahuan');
        $biGanjil = new rataTema;
        $biGanjil->labels(['Lulus', 'Tidak Lulus']);
        $biGanjil->dataset($nilai->mataPelajaran, 'pie', [$biUtsTinggiGanjil, $biUtsRendahGanjil]);

        $biUasTinggiGenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_akhirs.nilaiKetrampilan', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiKetrampilan');
        $biUasRendahGenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_akhirs.nilaiKetrampilan', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiKetrampilan');
        $biGenap = new rataTema;
        $biGenap->labels(['Lulus', 'Tidak Lulus']);
        $biGenap->dataset('$nilai->mataPelajaran', 'pie', [$biUasTinggiGenap, $biUasRendahGenap]);

        $nilai = nilai::where([
            ['mataPelajaran', 'Matematika'],
            ['kelas', $user->kelas],
        ])->first();
        $mtkTinggiGanjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_akhirs.nilaiPengetahuan', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiPengetahuan');
        $mtkRendahGanjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_akhirs.nilaiPengetahuan', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiPengetahuan');
        $mtkGanjil = new rataTema;
        $mtkGanjil->labels(['Lulus', 'Tidak Lulus']);
        $mtkGanjil->dataset($nilai->mataPelajaran, 'pie', [$mtkTinggiGanjil, $mtkRendahGanjil]);

        $mtkUasTinggiGenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_akhirs.nilaiKetrampilan', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiKetrampilan');
        $mtkUasRendahGenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_akhirs.nilaiKetrampilan', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiKetrampilan');
        $mtkGenap = new rataTema;
        $mtkGenap->labels(['Lulus', 'Tidak Lulus']);
        $mtkGenap->dataset('$nilai->mataPelajaran', 'pie', [$mtkUasTinggiGenap, $mtkUasRendahGenap]);

        $nilai = nilai::where([
            ['mataPelajaran', 'Ilmu Pengetahuan Alam'],
            ['kelas', $user->kelas],
        ])->first();
        $ipaTinggiGanjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_akhirs.nilaiPengetahuan', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiPengetahuan');
        $ipaRendahGanjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_akhirs.nilaiPengetahuan', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiPengetahuan');
        $ipaGanjil = new rataTema;
        $ipaGanjil->labels(['Lulus', 'Tidak Lulus']);
        $ipaGanjil->dataset($nilai->mataPelajaran, 'pie', [$ipaTinggiGanjil, $ipaRendahGanjil]);

        $ipaUasTinggiGenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_akhirs.nilaiKetrampilan', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiKetrampilan');
        $ipaUasRendahGenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_akhirs.nilaiKetrampilan', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiKetrampilan');
        $ipaGenap = new rataTema;
        $ipaGenap->labels(['Lulus', 'Tidak Lulus']);
        $ipaGenap->dataset('$nilai->mataPelajaran', 'pie', [$ipaUasTinggiGenap, $ipaUasRendahGenap]);

        $nilai = nilai::where([
            ['mataPelajaran', 'Bahasa Inggris'],
            ['kelas', $user->kelas],
        ])->first();
        $bingTinggiGanjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_akhirs.nilaiPengetahuan', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiPengetahuan');
        $bingRendahGanjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_akhirs.nilaiPengetahuan', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiPengetahuan');
        $bingGanjil = new rataTema;
        $bingGanjil->labels(['Lulus', 'Tidak Lulus']);
        $bingGanjil->dataset($nilai->mataPelajaran, 'pie', [$bingTinggiGanjil, $bingRendahGanjil]);

        $bingUasTinggiGenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_akhirs.nilaiKetrampilan', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiKetrampilan');
        $bingUasRendahGenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_akhirs.nilaiKetrampilan', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiKetrampilan');
        $bingGenap = new rataTema;
        $bingGenap->labels(['Lulus', 'Tidak Lulus']);
        $bingGenap->dataset('$nilai->mataPelajaran', 'pie', [$bingUasTinggiGenap, $bingUasRendahGenap]);

        $nilai = nilai::where([
            ['mataPelajaran', 'Pendidikan Jasmani, Olah Raga, dan Kesehatan'],
            ['kelas', $user->kelas],
        ])->first();
        $penjasTinggiGanjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_akhirs.nilaiPengetahuan', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiPengetahuan');
        $penjasRendahGanjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_akhirs.nilaiPengetahuan', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiPengetahuan');
        $penjasGanjil = new rataTema;
        $penjasGanjil->labels(['Lulus', 'Tidak Lulus']);
        $penjasGanjil->dataset($nilai->mataPelajaran, 'pie', [$penjasTinggiGanjil, $penjasRendahGanjil]);

        $penjasUasTinggiGenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_akhirs.nilaiKetrampilan', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiKetrampilan');
        $penjasUasRendahGenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_akhirs.nilaiKetrampilan', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiKetrampilan');
        $penjasGenap = new rataTema;
        $penjasGenap->labels(['Lulus', 'Tidak Lulus']);
        $penjasGenap->dataset('$nilai->mataPelajaran', 'pie', [$penjasUasTinggiGenap, $penjasUasRendahGenap]);

        $nilai = nilai::where([
            ['mataPelajaran', 'Prakarya'],
            ['kelas', $user->kelas],
        ])->first();
        $prakTinggiGanjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_akhirs.nilaiPengetahuan', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiPengetahuan');
        $prakRendahGanjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_akhirs.nilaiPengetahuan', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiPengetahuan');
        $prakGanjil = new rataTema;
        $prakGanjil->labels(['Lulus', 'Tidak Lulus']);
        $prakGanjil->dataset($nilai->mataPelajaran, 'pie', [$prakTinggiGanjil, $prakRendahGanjil]);

        $prakUasTinggiGenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_akhirs.nilaiKetrampilan', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiKetrampilan');
        $prakUasRendahGenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_akhirs.nilaiKetrampilan', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiKetrampilan');
        $prakGenap = new rataTema;
        $prakGenap->labels(['Lulus', 'Tidak Lulus']);
        $prakGenap->dataset('$nilai->mataPelajaran', 'pie', [$prakUasTinggiGenap, $prakUasRendahGenap]);

        $nilai = nilai::where([
            ['mataPelajaran', 'Program Khusus (Bina Diri)'],
            ['kelas', $user->kelas],
        ])->first();
        $pkbnTinggiGanjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_akhirs.nilaiPengetahuan', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiPengetahuan');
        $pkbnRendahGanjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_akhirs.nilaiPengetahuan', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiPengetahuan');
        $pkbnGanjil = new rataTema;
        $pkbnGanjil->labels(['Lulus', 'Tidak Lulus']);
        $pkbnGanjil->dataset($nilai->mataPelajaran, 'pie', [$pkbnTinggiGanjil, $pkbnRendahGanjil]);

        $pkbnUasTinggiGenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_akhirs.nilaiKetrampilan', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiKetrampilan');
        $pkbnUasRendahGenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_akhirs.nilaiKetrampilan', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiKetrampilan');
        $pkbnGenap = new rataTema;
        $pkbnGenap->labels(['Lulus', 'Tidak Lulus']);
        $pkbnGenap->dataset('$nilai->mataPelajaran', 'pie', [$pkbnUasTinggiGenap, $pkbnUasRendahGenap]);
        // $mataPelajaran = ['Pendidikan Agama dan Budi Pekerti', 'Pendidikan Pancasila dan Kewarganegaraan', 'Bahasa Indonesia'
        //     , 'Matematika', 'Ilmu Pengetahuan Alam', 'Bahasa Inggris', 'Pendidikan Jasmani, Olah Raga, dan Kesehatan',
        //     'Prakarya', 'Program Khusus (Bina Diri)', 'Mulok (Bahasa Jawa)'];

        $nilai = nilai::where([
            ['mataPelajaran', 'Mulok (Bahasa Jawa)'],
            ['kelas', $user->kelas],
        ])->first();
        $mulokTinggiGanjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_akhirs.nilaiPengetahuan', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiPengetahuan');
        $mulokRendahGanjil = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiPengetahuan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_akhirs.nilaiPengetahuan', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiPengetahuan');
        $mulokGanjil = new rataTema;
        $mulokGanjil->labels(['Lulus', 'Tidak Lulus']);
        $mulokGanjil->dataset($nilai->mataPelajaran, 'pie', [$mulokTinggiGanjil, $mulokRendahGanjil]);

        $mulokUasTinggiGenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_akhirs.nilaiKetrampilan', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiKetrampilan');
        $mulokUasRendahGenap = DB::table('nilai_akhirs')
            ->join('kelas', 'kelas.id', '=', 'nilai_akhirs.idKelas')
            ->select('nilai_akhirs.nilaiKetrampilan')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_akhirs.nilaiKetrampilan', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_akhirs.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('nilaiKetrampilan');
        $mulokGenap = new rataTema;
        $mulokGenap->labels(['Lulus', 'Tidak Lulus']);
        $mulokGenap->dataset('$nilai->mataPelajaran', 'pie', [$mulokUasTinggiGenap, $mulokUasRendahGenap]);

        return view('rapot.daftarNilaiRapot')->with([
            'agamaGenap' => $agamaGenap,
            'agamaGanjil' => $agamaGanjil,
            'pknGenap' => $pknGenap,
            'pknGanjil' => $pknGanjil,
            'biGenap' => $biGenap,
            'biGanjil' => $biGanjil,
            'mtkGenap' => $mtkGenap,
            'mtkGanjil' => $mtkGanjil,
            'ipaGenap' => $ipaGenap,
            'ipaGanjil' => $ipaGanjil,
            'bingGenap' => $bingGenap,
            'bingGanjil' => $bingGanjil,
            'penjasGenap' => $penjasGenap,
            'penjasGanjil' => $penjasGanjil,
            'prakGenap' => $prakGenap,
            'prakGanjil' => $prakGanjil,
            'pkbnGenap' => $pkbnGenap,
            'pkbnGanjil' => $pkbnGanjil,
            'mulokGenap' => $mulokGenap,
            'mulokGanjil' => $mulokGanjil,
            'namaSiswa' => $namaSiswa,
            'uts' => $uts,
            'uas' => $uas,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $dataSiswa = siswa::find($user->idSiswa);
        $kelas = kelas::where([
            ['idSiswa', '=', $dataSiswa->id],
            ['kelas', '=', $dataSiswa->kelas],
            ['semester', '=', 'ganjil'],
        ])->first();
        $nilai = nilaiAkhir::where([
            ['idKelas', $kelas->id],
        ])->get();
        return view('rapot.index')->with(['kelas' => $kelas, 'nilai' => $nilai]);
    }

    public function lihatNilai(Request $request)
    {
        $user = Auth::user();
        $dataSiswa = siswa::find($user->idSiswa);
        $kelas = kelas::where([
            ['idSiswa', '=', $dataSiswa->id],
            ['kelas', '=', $request->input('kelas')],
            ['semester', '=', $request->input('semester')],
        ])->first();
        $nilai = nilaiAkhir::where([
            ['idKelas', $kelas->id],
        ])->get();

        return view('rapot.index')->with(['kelas' => $kelas, 'nilai' => $nilai]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rapot.index');
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
        if (request()->has('semester')) {
            $kelas = kelas::where([
                ['idSiswa', $id],
                ['semester', request('semester')],
            ])->first();
            $siswa = DB::table('siswas')
                ->join('kelas', 'kelas.idSiswa', '=', 'siswas.id')
                ->select('siswas.id', 'siswas.nama', 'kelas.kelas', 'kelas.semester')
                ->where('kelas.id', $kelas->id)
                ->first();
            $nilai = DB::table('siswas')
                ->join('kelas', 'kelas.idSiswa', '=', 'siswas.id')
                ->join('nilai_akhirs', 'nilai_akhirs.idKelas', '=', 'kelas.id')
                ->select('siswas.nama', 'nilai_akhirs.*', 'kelas.kelas', 'kelas.semester', 'kelas.tahunAjaran')
                ->where('kelas.id', $kelas->id)
                ->where('kelas.semester', request('semester'))
                ->get();
            $sikap = nilaiAkhirSikap::where([
                ['idKelas', $kelas->id],
            ])->first();
        } else {
            $kelas = kelas::where([
                ['id', $id],
                ['semester', 'ganjil'],
            ])->first();
            $siswa = DB::table('siswas')
                ->join('kelas', 'kelas.idSiswa', '=', 'siswas.id')
                ->select('siswas.id', 'siswas.nama', 'kelas.kelas', 'kelas.semester')
                ->where('kelas.id', $kelas->id)
                ->first();
            $nilai = DB::table('siswas')
                ->join('kelas', 'kelas.idSiswa', '=', 'siswas.id')
                ->join('nilai_akhirs', 'nilai_akhirs.idKelas', '=', 'kelas.id')
                ->select('siswas.nama', 'nilai_akhirs.*', 'kelas.kelas', 'kelas.semester', 'kelas.tahunAjaran')
                ->where('kelas.id', $kelas->id)
                ->where('kelas.semester', 'ganjil')
                ->get();
            $sikap = nilaiAkhirSikap::where([
                ['idkelas', $kelas->id],
            ])->first();
        }
        return view('rapot.show')->with(['siswa' => $siswa, 'nilai' => $nilai, 'sikap' => $sikap]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nilaiRapot = nilaiAkhir::findOrFail($id);
        $kelas = kelas::find($nilaiRapot->idKelas);
        $siswa = siswa::find($kelas->idSiswa);
        $sikap = nilaiAkhirSikap::where('idKelas', '=', $kelas->id)->first();
        $utsUas = nilaiUtsUas::where([
            ['idKelas', '=', $kelas->id],
            ['mataPelajaran', '=', $nilaiRapot->mataPelajaran],
        ])->first();

        //mencari rata rata nilai tema
        $rataP = nilaiTema::where([
            ['idKelas', '=', $kelas->id],
            ['mataPelajaran', '=', $nilaiRapot->mataPelajaran],
        ])->avg('pRata');
        $rataK = nilaiTema::where([
            ['idKelas', '=', $kelas->id],
            ['mataPelajaran', '=', $nilaiRapot->mataPelajaran],
        ])->avg('kRata');

        //menghitung rata-rata dari semua nilai
        $nilaiAkhirPengetahuan = ($rataP + $utsUas->nilaiPengetahuan + $utsUas->nilaiPengetahuan) / 3;
        $nilaiAkhirKetrampilan = ($rataK + $utsUas->utsK + $utsUas->uasK) / 3;

        $info = jadwal::where([
            ['kelas', $kelas->kelas],
            ['semester', $kelas->semester],
            ['jenis', 'Nilai Akhir'],
        ])->first();
        $tanggal = date('Y-m-d');
        return view('rapot.edit')->with(
            [
                'tanggal' => $tanggal,
                'info' => $info,
                'nilaiRapot' => $nilaiRapot,
                'kelas' => $kelas,
                'siswa' => $siswa,
                'sikap' => $sikap,
                'nilaiAkhirPengetahuan' => $nilaiAkhirPengetahuan,
                'nilaiAkhirKetrampilan' => $nilaiAkhirKetrampilan,
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
        $nilaiRapot = nilaiAkhir::find($id);
        $nilaiRapot->nilaiPengetahuan = $request->input('nilaiPengetahuan');
        $nilaiRapot->nilaiKetrampilan = $request->input('nilaiKetrampilan');
        $nilaiRapot->deskripsi = $request->input('deskripsi');
        $nilaiRapot->save();

        $nilai = nilaiAkhirSikap::where('idKelas', $nilaiRapot->idKelas)->first();
        $nilaiSikap = nilaiAkhirSikap::find($nilai->id);
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
