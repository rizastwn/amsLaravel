<?php

namespace App\Http\Controllers;

use App\kelas;
use App\nilai;
use App\nilaiSubtema;
use App\subtema;
use App\tema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class subtemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        if (request()->has('semester')) {
            $kelas = kelas::where([
                ['idWalikelas', $user->id],
                ['kelas', $user->kelas],
                ['semester', $request->input('semester')],
            ])->first();
        } else {
            $kelas = kelas::where([
                ['idWalikelas', $user->id],
                ['kelas', $user->kelas],
                ['semester', 'ganjil'],
            ])->first();
        };

        $subtema = subtema::where([
            ['tema', $request->input('tema')],
            ['subtema', $request->input('subtema')],
            ['jenis', $request->input('jenis')],
            ['idkelas', $kelas->id],
        ])->get();

        $tema = $request->input('tema');
        $subtemaD = $request->input('subtema');
        $jenis = $request->input('jenis');
        $semester = $request->input('semester');
        return view('subtema.index')
            ->with([
                'subtema' => $subtema,
                'kelas' => $kelas,
                'tema' => $tema,
                'subtemaD' => $subtemaD,
                'jenis' => $jenis,
                'semester' => $semester,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $user = Auth::user();
        $mataPelajaran = nilai::where([
            ['kelas', $user->kelas],
            ['semester', 'genap'],
        ])->get();
        $kelas = kelas::where([
            ['idWaliKelas', $user->id],
            ['kelas', $user->kelas],
            ['tahunAjaran', date("Y")],
            ['semester', $request->input('semester')],
        ])->first();
        $temaKelas = tema::where([
            ['kelas', $user->kelas],
        ])->get();

        return view('subtema.create')->with([
            'temaKelas' => $temaKelas,
            'mataPelajaran' => $mataPelajaran,
        ]);
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
            'jenis' => 'required',
            'judul' => 'required',
            'jenis' => 'required',
            'tanggalAwal' => 'required',
            'tanggalAkhir' => 'required',
            'deskripsi' => 'required',
            'mataPelajaran' => 'required',
        ]);

        //mencari id kelas
        $user = Auth::user();
        $kelas = kelas::where([
            ['idWaliKelas', $user->id],
            ['kelas', $user->kelas],
            ['semester', $request->input('semester')],
        ])->first();
        $checkData = subtema::where([
            ['idKelas', $kelas->id],
            ['subtema',  $request->input('subtema')],
            ['tema', $request->input('tema')],
            ['mataPelajaran', $request->input('mataPelajaran')],
            ['jenis', $request->input('jenis')],
        ])->first();
        if ($checkData != null) {
            return redirect('/subtema/create')->with('error', 'subtema sudah ada pada database!');
        }

        $subtema = new subtema;
        $subtema->idKelas = $kelas->id;
        $subtema->tema = $request->input('tema');
        $subtema->subtema = $request->input('subtema');
        $subtema->judul = $request->input('judul');
        $subtema->mataPelajaran = $request->input('mataPelajaran');
        $subtema->jenis = $request->input('jenis');
        $subtema->tanggalAwal = $request->input('tanggalAwal');
        $subtema->tanggalAkhir = $request->input('tanggalAkhir');
        $subtema->deskripsi = $request->input('deskripsi');
        $subtema->save();

        // mencari seluruh siswa dalam kelas
        $kelasSiswa = kelas::where([
            ['idWaliKelas', $kelas->idWaliKelas],
            ['kelas', $user->kelas],
            ['semester', $request->input('semester')],
        ])->get();

        foreach ($kelasSiswa as $data) {
            $nilaiSubtema = new nilaiSubtema;
            $nilaiSubtema->idKelas = $data->id;
            $nilaiSubtema->tema = $request->input('tema');
            $nilaiSubtema->subtema = $request->input('subtema');
            $nilaiSubtema->jenis = $request->input('jenis');
            $nilaiSubtema->mataPelajaran = $request->input('mataPelajaran');
            $nilaiSubtema->save();
        }
        return redirect('/subtema')->with('success', 'subtema baru telah dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subtema = subtema::find($id);
        $tema = tema::where([
            ['tema', $subtema->tema],
        ])->first();
        $kelas = kelas::where('id', $subtema->idKelas)->first();
        return view('subtema.show')->with(['tema' => $tema, 'subtema' => $subtema, 'kelas' => $kelas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $mataPelajaran = nilai::where([
            ['kelas', $user->kelas],
        ])->get();
        $subtema = subtema::find($id);
        return view('subtema.edit')->with(['subtema' => $subtema, 'mataPelajaran' => $mataPelajaran]);
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
            'tema' => 'required',
            'subtema' => 'required',
            'jenis' => 'required',
            'judul' => 'required',
            'jenis' => 'required',
            'tanggalAwal' => 'required',
            'tanggalAkhir' => 'required',
            'deskripsi' => 'required',
            'mataPelajaran' => 'required',
        ]);

        //mencari id kelas
        $user = Auth::user();
        $kelas = kelas::where([
            ['idWaliKelas', $user->id],
            ['kelas', $user->kelas],
        ])->first();

        $subtema = subtema::find($id);
        $subtema->idKelas = $kelas->id;
        $subtema->tema = $request->input('tema');
        $subtema->subtema = $request->input('subtema');
        $subtema->judul = $request->input('judul');
        $subtema->mataPelajaran = $request->input('mataPelajaran');
        $subtema->jenis = $request->input('jenis');
        $subtema->tanggalAwal = $request->input('tanggalAwal');
        $subtema->tanggalAkhir = $request->input('tanggalAkhir');
        $subtema->deskripsi = $request->input('deskripsi');
        $subtema->save();
        return redirect('/subtema')->with('success', 'subtema telah diubah!');
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
