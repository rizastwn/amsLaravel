<?php

namespace App\Http\Controllers;

use App\Charts\rataTema;
use App\jadwal;
use App\kelas;
use App\nilai;
use App\nilaiUtsUas;
use App\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class nilaiUtsUasController extends Controller
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
    public function daftarNilaiUtsUas()
    {
        $user = Auth::user();
            if(request()->has('semester')){
                $namaSiswa = DB::table('siswas')
                ->join('kelas', 'kelas.idSiswa', '=', 'siswas.id')
                ->select('siswas.*','kelas.*')
                ->where('kelas.idWaliKelas', $user->id)
                ->where('kelas.kelas', $user->kelas)
                ->where('kelas.semester',request('semester'))
                ->where('kelas.status', 'proses pembelajaran')
                ->get('nilai_temas.pRata');
            }else {
                $namaSiswa = DB::table('siswas')
                ->join('kelas', 'kelas.idSiswa', '=', 'siswas.id')
                ->select('siswas.*','kelas.*')
                ->where('kelas.idWaliKelas', $user->id)
                ->where('kelas.kelas', $user->kelas)
                ->where('kelas.semester','ganjil')
                ->where('kelas.status', 'proses pembelajaran')
                ->get('nilai_temas.pRata');
            }
        //membuat chart
        //chart nilai UTS ganjil
        $pagUtsGanjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Pendidikan Agama dan Budi Pekerti')
            ->get()
            ->avg('utsP');

        $pknUtsGanjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Pendidikan Pancasila dan Kewarganegaraan')
            ->get()
            ->avg('utsP');

        $biUtsGanjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Bahasa Indonesia')
            ->get()
            ->avg('utsP');

        $mtkUtsGanjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Matematika')
            ->get()
            ->avg('utsP');

        $ipaUtsGanjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Ilmu Pengetahuan Alam')
            ->get()
            ->avg('utsP');

        $bingUtsGanjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Bahasa Inggris')
            ->get()
            ->avg('utsP');

        $penjasUtsGanjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Pendidikan Jasmani, Olah Raga, dan Kesehatan')
            ->get()
            ->avg('utsP');

        $prakUtsGanjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Prakarya')
            ->get()
            ->avg('utsP');

        $pkbnUtsGanjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Program Khusus (Bina Diri)')
            ->get()
            ->avg('utsP');

        $mulokUtsGanjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Mulok (Bahasa Jawa)')
            ->get()
            ->avg('utsP');

        //nilai uts genap
        $pagUtsgenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Pendidikan Agama dan Budi Pekerti')
            ->get()
            ->avg('utsP');

        $pknUtsgenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Pendidikan Pancasila dan Kewarganegaraan')
            ->get()
            ->avg('utsP');

        $biUtsgenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Bahasa Indonesia')
            ->get()
            ->avg('utsP');

        $mtkUtsgenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Matematika')
            ->get()
            ->avg('utsP');

        $ipaUtsgenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Ilmu Pengetahuan Alam')
            ->get()
            ->avg('utsP');

        $bingUtsgenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Bahasa Inggris')
            ->get()
            ->avg('utsP');

        $penjasUtsgenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Pendidikan Jasmani, Olah Raga, dan Kesehatan')
            ->get()
            ->avg('utsP');

        $prakUtsgenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Prakarya')
            ->get()
            ->avg('utsP');

        $pkbnUtsgenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Program Khusus (Bina Diri)')
            ->get()
            ->avg('utsP');

        $mulokUtsgenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Mulok (Bahasa Jawa)')
            ->get()
            ->avg('utsP');

        //chart nilai UAS genap
        $pagUASGenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Pendidikan Agama dan Budi Pekerti')
            ->get()
            ->avg('uasP');

        $pknUASGenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Pendidikan Pancasila dan Kewarganegaraan')
            ->get()
            ->avg('uasP');

        $biUASGenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Bahasa Indonesia')
            ->get()
            ->avg('uasP');

        $mtkUASGenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Matematika')
            ->get()
            ->avg('uasP');

        $ipaUASGenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Ilmu Pengetahuan Alam')
            ->get()
            ->avg('uasP');

        $bingUASGenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Bahasa Inggris')
            ->get()
            ->avg('uasP');

        $penjasUASGenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Pendidikan Jasmani, Olah Raga, dan Kesehatan')
            ->get()
            ->avg('uasP');

        $prakUASGenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Prakarya')
            ->get()
            ->avg('uasP');

        $pkbnUASGenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Program Khusus (Bina Diri)')
            ->get()
            ->avg('uasP');

        $mulokUASGenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Mulok (Bahasa Jawa)')
            ->get()
            ->avg('uasP');

        //chart nilai UAS ganjil
        $pagUASganjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Pendidikan Agama dan Budi Pekerti')
            ->get()
            ->avg('uasP');

        $pknUASganjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Pendidikan Pancasila dan Kewarganegaraan')
            ->get()
            ->avg('uasP');

        $biUASganjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Bahasa Indonesia')
            ->get()
            ->avg('uasP');

        $mtkUASganjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Matematika')
            ->get()
            ->avg('uasP');

        $ipaUASganjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Ilmu Pengetahuan Alam')
            ->get()
            ->avg('uasP');

        $bingUASganjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Bahasa Inggris')
            ->get()
            ->avg('uasP');

        $penjasUASganjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Pendidikan Jasmani, Olah Raga, dan Kesehatan')
            ->get()
            ->avg('uasP');

        $prakUASganjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Prakarya')
            ->get()
            ->avg('uasP');

        $pkbnUASganjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Program Khusus (Bina Diri)')
            ->get()
            ->avg('uasP');

        $mulokUASganjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', 'Mulok (Bahasa Jawa)')
            ->get()
            ->avg('uasP');

        $uts = new rataTema;
        $uts->labels(['Ujian Tengah Semester Ganjil', 'Ujian Tengah Semester Genap']);
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
        $uas->labels(['Ujian Akhir Semester Ganjil', 'Ujian Akhir Semester Genap']);
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
        $pagUtsTinggiGanjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_uts_uas.utsP', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('utsP');
        $pagUtsRendahGanjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_uts_uas.utsP', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('utsP');

        $agamaGanjil = new rataTema;
        $agamaGanjil->labels(['Lulus', 'Tidak Lulus']);
        $agamaGanjil->dataset('Pendidikan Agama dan Budi Pekerti', 'pie', [$pagUtsTinggiGanjil, $pagUtsRendahGanjil]);

        $pagUasTinggiGenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_uts_uas.uasP', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('uasP');
        $pagUasRendahGenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_uts_uas.uasP', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('uasP');
        $agamaGenap = new rataTema;
        $agamaGenap->labels(['Lulus', 'Tidak Lulus']);
        $agamaGenap->dataset('Pendidikan Agama dan Budi Pekerti', 'pie', [$pagUasTinggiGenap, $pagUasRendahGenap]);

        $nilai = nilai::where([
            ['mataPelajaran', 'Pendidikan Pancasila dan Kewarganegaraan'],
            ['kelas', $user->kelas],
        ])->first();
        $pknUtsTinggiGanjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_uts_uas.utsP', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('utsP');
        $pknUtsRendahGanjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_uts_uas.utsP', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('utsP');
        $pknGanjil = new rataTema;
        $pknGanjil->labels(['Lulus', 'Tidak Lulus']);
        $pknGanjil->dataset($nilai->mataPelajaran, 'pie', [$pknUtsTinggiGanjil, $pknUtsRendahGanjil]);

        $pknUasTinggiGenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_uts_uas.uasP', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('uasP');
        $pknUasRendahGenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_uts_uas.uasP', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('uasP');
        $pknGenap = new rataTema;
        $pknGenap->labels(['Lulus', 'Tidak Lulus']);
        $pknGenap->dataset('$nilai->mataPelajaran', 'pie', [$pknUasTinggiGenap, $pknUasRendahGenap]);

        $nilai = nilai::where([
            ['mataPelajaran', 'Bahasa Indonesia'],
            ['kelas', $user->kelas],
        ])->first();
        $biUtsTinggiGanjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_uts_uas.utsP', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('utsP');
        $biUtsRendahGanjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_uts_uas.utsP', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('utsP');
        $biGanjil = new rataTema;
        $biGanjil->labels(['Lulus', 'Tidak Lulus']);
        $biGanjil->dataset($nilai->mataPelajaran, 'pie', [$biUtsTinggiGanjil, $biUtsRendahGanjil]);

        $biUasTinggiGenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_uts_uas.uasP', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('uasP');
        $biUasRendahGenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_uts_uas.uasP', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('uasP');
        $biGenap = new rataTema;
        $biGenap->labels(['Lulus', 'Tidak Lulus']);
        $biGenap->dataset('$nilai->mataPelajaran', 'pie', [$biUasTinggiGenap, $biUasRendahGenap]);


        $nilai = nilai::where([
            ['mataPelajaran', 'Matematika'],
            ['kelas', $user->kelas],
        ])->first();
        $mtkTinggiGanjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_uts_uas.utsP', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('utsP');
        $mtkRendahGanjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_uts_uas.utsP', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('utsP');
        $mtkGanjil = new rataTema;
        $mtkGanjil->labels(['Lulus', 'Tidak Lulus']);
        $mtkGanjil->dataset($nilai->mataPelajaran, 'pie', [$mtkTinggiGanjil, $mtkRendahGanjil]);

        $mtkUasTinggiGenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_uts_uas.uasP', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('uasP');
        $mtkUasRendahGenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_uts_uas.uasP', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('uasP');
        $mtkGenap = new rataTema;
        $mtkGenap->labels(['Lulus', 'Tidak Lulus']);
        $mtkGenap->dataset('$nilai->mataPelajaran', 'pie', [$mtkUasTinggiGenap, $mtkUasRendahGenap]);


        $nilai = nilai::where([
            ['mataPelajaran', 'Ilmu Pengetahuan Alam'],
            ['kelas', $user->kelas],
        ])->first();
        $ipaTinggiGanjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_uts_uas.utsP', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('utsP');
        $ipaRendahGanjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_uts_uas.utsP', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('utsP');
        $ipaGanjil = new rataTema;
        $ipaGanjil->labels(['Lulus', 'Tidak Lulus']);
        $ipaGanjil->dataset($nilai->mataPelajaran, 'pie', [$ipaTinggiGanjil, $ipaRendahGanjil]);

        $ipaUasTinggiGenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_uts_uas.uasP', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('uasP');
        $ipaUasRendahGenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_uts_uas.uasP', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('uasP');
        $ipaGenap = new rataTema;
        $ipaGenap->labels(['Lulus', 'Tidak Lulus']);
        $ipaGenap->dataset('$nilai->mataPelajaran', 'pie', [$ipaUasTinggiGenap, $ipaUasRendahGenap]);


        $nilai = nilai::where([
            ['mataPelajaran', 'Bahasa Inggris'],
            ['kelas', $user->kelas],
        ])->first();
        $bingTinggiGanjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_uts_uas.utsP', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('utsP');
        $bingRendahGanjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_uts_uas.utsP', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('utsP');
        $bingGanjil = new rataTema;
        $bingGanjil->labels(['Lulus', 'Tidak Lulus']);
        $bingGanjil->dataset($nilai->mataPelajaran, 'pie', [$bingTinggiGanjil, $bingRendahGanjil]);

        $bingUasTinggiGenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_uts_uas.uasP', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('uasP');
        $bingUasRendahGenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_uts_uas.uasP', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('uasP');
        $bingGenap = new rataTema;
        $bingGenap->labels(['Lulus', 'Tidak Lulus']);
        $bingGenap->dataset('$nilai->mataPelajaran', 'pie', [$bingUasTinggiGenap, $bingUasRendahGenap]);

        
        $nilai = nilai::where([
            ['mataPelajaran', 'Pendidikan Jasmani, Olah Raga, dan Kesehatan'],
            ['kelas', $user->kelas],
        ])->first();
        $penjasTinggiGanjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_uts_uas.utsP', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('utsP');
        $penjasRendahGanjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_uts_uas.utsP', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('utsP');
        $penjasGanjil = new rataTema;
        $penjasGanjil->labels(['Lulus', 'Tidak Lulus']);
        $penjasGanjil->dataset($nilai->mataPelajaran, 'pie', [$penjasTinggiGanjil, $penjasRendahGanjil]);

        $penjasUasTinggiGenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_uts_uas.uasP', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('uasP');
        $penjasUasRendahGenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_uts_uas.uasP', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('uasP');
        $penjasGenap = new rataTema;
        $penjasGenap->labels(['Lulus', 'Tidak Lulus']);
        $penjasGenap->dataset('$nilai->mataPelajaran', 'pie', [$penjasUasTinggiGenap, $penjasUasRendahGenap]);

        
        $nilai = nilai::where([
            ['mataPelajaran', 'Prakarya'],
            ['kelas', $user->kelas],
        ])->first();
        $prakTinggiGanjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_uts_uas.utsP', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('utsP');
        $prakRendahGanjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_uts_uas.utsP', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('utsP');
        $prakGanjil = new rataTema;
        $prakGanjil->labels(['Lulus', 'Tidak Lulus']);
        $prakGanjil->dataset($nilai->mataPelajaran, 'pie', [$prakTinggiGanjil, $prakRendahGanjil]);

        $prakUasTinggiGenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_uts_uas.uasP', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('uasP');
        $prakUasRendahGenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_uts_uas.uasP', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('uasP');
        $prakGenap = new rataTema;
        $prakGenap->labels(['Lulus', 'Tidak Lulus']);
        $prakGenap->dataset('$nilai->mataPelajaran', 'pie', [$prakUasTinggiGenap, $prakUasRendahGenap]);

        $nilai = nilai::where([
            ['mataPelajaran', 'Program Khusus (Bina Diri)'],
            ['kelas', $user->kelas],
        ])->first();
        $pkbnTinggiGanjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_uts_uas.utsP', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('utsP');
        $pkbnRendahGanjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_uts_uas.utsP', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('utsP');
        $pkbnGanjil = new rataTema;
        $pkbnGanjil->labels(['Lulus', 'Tidak Lulus']);
        $pkbnGanjil->dataset($nilai->mataPelajaran, 'pie', [$pkbnTinggiGanjil, $pkbnRendahGanjil]);

        $pkbnUasTinggiGenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_uts_uas.uasP', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('uasP');
        $pkbnUasRendahGenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_uts_uas.uasP', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('uasP');
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
        $mulokTinggiGanjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_uts_uas.utsP', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('utsP');
        $mulokRendahGanjil = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.utsP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'ganjil')
            ->where('nilai_uts_uas.utsP', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('utsP');
        $mulokGanjil = new rataTema;
        $mulokGanjil->labels(['Lulus', 'Tidak Lulus']);
        $mulokGanjil->dataset($nilai->mataPelajaran, 'pie', [$mulokTinggiGanjil, $mulokRendahGanjil]);

        $mulokUasTinggiGenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_uts_uas.uasP', '>=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('uasP');
        $mulokUasRendahGenap = DB::table('nilai_uts_uas')
            ->join('kelas', 'kelas.id', '=', 'nilai_uts_uas.idKelas')
            ->select('nilai_uts_uas.uasP')
            ->where('kelas.idWaliKelas', $user->id)
            ->where('kelas.semester', 'genap')
            ->where('nilai_uts_uas.uasP', '<=', $nilai->nilai)
            ->where('kelas.kelas', $user->kelas)
            ->where('nilai_uts_uas.mataPelajaran', $nilai->mataPelajaran)
            ->get()
            ->count('uasP');
        $mulokGenap = new rataTema;
        $mulokGenap->labels(['Lulus', 'Tidak Lulus']);
        $mulokGenap->dataset('$nilai->mataPelajaran', 'pie', [$mulokUasTinggiGenap, $mulokUasRendahGenap]);
        return view('uts.daftarNilaiUtsUas')->with([
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
            'uas' => $uas,
            'uts' => $uts,
            'namaSiswa' => $namaSiswa]);

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
        $kelasSiswa = kelas::where([
            ['idSiswa','=',$dataSiswa->id],
            ['semester','=','ganjil'],
        ])->get();
        $kelas = kelas::where([
            ['idSiswa', '=', $dataSiswa->id],
            ['kelas', '=', $dataSiswa->kelas],
            ['semester', '=', 'ganjil'],
        ])->first();
        $nilai = nilaiUtsUas::where([
            ['idKelas', $kelas->id],
        ])->get();

        return view('uts.index')->with(['kelasSiswa' => $kelasSiswa,'kelas' => $kelas, 'nilai' => $nilai]);
    }
    public function lihatNilai(Request $request)
    {
        $user = Auth::user();
        $dataSiswa = siswa::find($user->idSiswa);
        $kelasSiswa = kelas::where([
            ['idSiswa','=',$dataSiswa->id],
            ['semester','=','ganjil'],
        ])->get();
        $kelas = kelas::where([
            ['idSiswa', '=', $dataSiswa->id],
            ['kelas', '=', $request->input('kelas')],
            ['semester', '=', $request->input('semester')],
        ])->first();
        $nilai = nilaiUtsUas::where([
            ['idKelas', $kelas->id],
        ])->get();
        return view('uts.index')->with(['kelasSiswa' => $kelasSiswa,'kelas' => $kelas, 'nilai' => $nilai]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('uts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
                ->join('nilai_uts_uas', 'nilai_uts_uas.idKelas', '=', 'kelas.id')
                ->select('siswas.nama', 'nilai_uts_uas.*', 'kelas.kelas', 'kelas.semester', 'kelas.tahunAjaran')
                ->where('kelas.id', $kelas->id)
                ->where('kelas.semester', request('semester'))
                ->get();
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
                ->join('nilai_uts_uas', 'nilai_uts_uas.idKelas', '=', 'kelas.id')
                ->select('siswas.nama', 'nilai_uts_uas.*', 'kelas.kelas', 'kelas.semester', 'kelas.tahunAjaran')
                ->where('kelas.id', $kelas->id)
                ->where('kelas.semester', 'ganjil')
                ->get();
        }

        return view('uts.show')->with(['siswa' => $siswa, 'nilai' => $nilai, 'kelas' => $kelas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nilai = nilaiUtsUas::findOrFail($id);
        $kelas = kelas::find($nilai->idKelas);
        $siswa = siswa::find($kelas->idSiswa);
        $infoUTS = jadwal::where([
            ['kelas', $kelas->kelas],
            ['semester', $kelas->semester],
            ['jenis', 'UTS'],
        ])->first();
        $infoUAS = jadwal::where([
            ['kelas', $kelas->kelas],
            ['semester', $kelas->semester],
            ['jenis', 'UAS'],
        ])->first();
        $tanggal = date('Y-m-d');
        return view('uts.edit')->with(['infoUTS' => $infoUTS, 'infoUAS' => $infoUAS, 'tanggal' => $tanggal, 'siswa' => $siswa, 'nilai' => $nilai, 'kelas' => $kelas]);
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
        $nilai = nilaiUtsUas::find($id);
        // $kelas = kelas::find($nilai->idKelas);
        $nilai->utsP = $request->input('utsP');
        $nilai->uasP = $request->input('uasP');
        $nilai->utsK = $request->input('utsK');
        $nilai->uasK = $request->input('uasK');
        $nilai->save();
        //return redirect('/nilaiUtsUas/$kelas->id')->with('success', 'Nilai UTS dan UAS siswa telah di ubah!');
        return redirect('/daftarNilaiUtsUas')->with('success', 'Nilai UTS dan UAS siswa telah di ubah!');
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
