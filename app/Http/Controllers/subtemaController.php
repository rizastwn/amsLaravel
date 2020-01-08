<?php

namespace App\Http\Controllers;

use App\subtema;
use Illuminate\Support\Facades\Auth;
use App\kelas;
use App\nilai;
use Illuminate\Http\Request;

class subtemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $kelas = kelas::where('idWalikelas',$user->id)->first();
        $subtema = subtema::where([
            ['idkelas',$kelas->id]
        ])->get();
        return view('subtema.index')->with('subtema',$subtema);
        // return view('subtema.index')->with(['nilai' => $nilai,'infonilai' => $infonilai ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $mataPelajaran = nilai::where([
            ['kelas',$user->kelas]
        ])->get();
        return view('subtema.create')->with('mataPelajaran',$mataPelajaran);
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
        ])->first();

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
        return view('subtema.show');
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
            ['kelas',$user->kelas]
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

        $subtema =  subtema::find($id);
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
        return redirect('/subtema')->with('success', 'subtema baru telah dibuat!');
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
