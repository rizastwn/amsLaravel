<?php

namespace App\Http\Controllers;

use App\tema;
use Illuminate\Http\Request;

class temaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tema = tema::where([
            ['kelas', '1'],
            ['semester', 'ganjil'],
        ])->get();
        $semester = $request->input('semester');
        $kelas = $request->input('kelas');
        return view('penjelasanTema.index')
            ->with(
                [
                    'tema' => $tema,
                    'kelas' => $kelas,
                    'semester' => $semester,
                ]);
    }
    public function lihat(Request $request)
    {
        $tema = tema::where([
            ['kelas', $request->input('kelas')],
            ['semester', $request->input('semester')],
        ])->get();
        $semester = $request->input('semester');
        $kelas = $request->input('kelas');
        return view('penjelasanTema.index')
            ->with(
                [
                    'tema' => $tema,
                    'kelas' => $kelas,
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
        $semester = $request->input('semester');
        $kelas = $request->input('kelas');
        return view('penjelasanTema.create')->with(
            [
                'kelas' => $kelas,
                'semester' => $semester,
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
            'kelas' => 'required',
            'semester' => 'required',
            'judul' => 'required',
            'isi' => 'required',
        ]);
        $tema = new tema;
        $tema->tema = $request->input('tema');
        $tema->kelas = $request->input('kelas');
        $tema->semester = $request->input('semester');
        $tema->judul = $request->input('judul');
        $tema->isi = $request->input('isi');
        $tema->save();
        return redirect('/daftarTema')->with('success', 'tema baru telah dibuat!');
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
        $tema = tema::find($id);
        return view('penjelasanTema.edit')->with(['tema' => $tema]);
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
            'kelas' => 'required',
            'semester' => 'required',
            'judul' => 'required',
            'isi' => 'required',
        ]);
        $tema = tema::find($id);
        $tema->tema = $request->input('tema');
        $tema->kelas = $request->input('kelas');
        $tema->semester = $request->input('semester');
        $tema->judul = $request->input('judul');
        $tema->isi = $request->input('isi');
        $tema->save();
        return redirect('/daftarTema')->with('success', 'tema baru telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tema = tema::find($id);
        $tema->delete();
        return redirect('/standarNilai')->with('success', 'tema telah di hapus');
    }
}
