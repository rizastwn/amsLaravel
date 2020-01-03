<?php

namespace App\Http\Controllers;

use App\nilai;
use Illuminate\Http\Request;

class nilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilai = nilai::where([
            ['kelas','1'],
            ['semester','ganjil']
        ])->get();
        $infonilai =  nilai::where([
            ['kelas','1'],
            ['semester','ganjil']
        ])->first();
        return view('nilai.index')->with(['nilai' => $nilai,'infonilai' => $infonilai ]);
    }
    public function lihat(Request $request)
    {
        $nilai = nilai::where([
            ['kelas',$request->input('kelas')],
            ['semester',$request->input('semester')]
        ])->get();
        $infonilai =  nilai::where([
            ['kelas',$request->input('kelas')],
            ['semester',$request->input('semester')]
        ])->first();
        return view('nilai.index')->with(['nilai' => $nilai,'infonilai' => $infonilai ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nilai.create');
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
            'kelas' => 'required',
            'semester' => 'required',
            'mataPelajaran' => 'required',
            'nilai' => 'required',            
        ]);
       
        $tema = new tema;
        $tema->kelas = $request->input('kelas');
        $tema->semester = $request->input('semester');
        $tema->mataPelajaran = $request->input('mataPelajaran');
        $tema->nilai = $request->input('nilai');
        $tema->save();
        return redirect('/standarNilai')->with('success', 'nilai baru telah dibuat!');
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
        $nilai = nilai::find($id);
        return view('nilai.edit')->with(['nilai' => $nilai ]);
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
            'kelas' => 'required',
            'semester' => 'required',
            'mataPelajaran' => 'required',
            'nilai' => 'required',            
        ]);
        $tema = tema::find($id);
        $tema->kelas = $request->input('kelas');
        $tema->semester = $request->input('semester');
        $tema->mataPelajaran = $request->input('mataPelajaran');
        $tema->nilai = $request->input('nilai');
        $tema->save();
        return redirect('/standarNilai')->with('success', 'nilai telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nilai = nilai::find($id);
        $nilai->delete();
        return redirect('/standarNilai')->with('success', 'nilai telah di hapus');
    }
}
