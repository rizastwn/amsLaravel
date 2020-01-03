<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jadwal;
class jadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = jadwal::where([
            ['kelas','1'],
            ['semester','ganjil']
        ])->get();
        $infoJadwal =  jadwal::where([
            ['kelas','1'],
            ['semester','ganjil']
        ])->first();
        return view('jadwal.index')->with(['jadwal' => $jadwal,'infoJadwal' => $infoJadwal ]);
    }
    public function lihatJadwal(Request $request)
    {
        $jadwal = jadwal::where([
            ['kelas',$request->input('kelas')],
            ['semester',$request->input('semester')]
        ])->get();
        $infoJadwal =  jadwal::where([
            ['kelas',$request->input('kelas')],
            ['semester',$request->input('semester')]
        ])->first();
        return view('jadwal.index')->with(['jadwal' => $jadwal,'infoJadwal' => $infoJadwal ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jadwal.create');
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
            'jenis' => 'required',
            'tanggalMulai' => 'date',
            'tanggalAkhir' => 'date',            
        ]);
        $jadwal = new jadwal;
        $jadwal->kelas = $request->input('kelas');
        $jadwal->semester = $request->input('semester');
        $jadwal->jenis = $request->input('jenis');
        $jadwal->tanggalAwal = $request->input('tanggalAwal');
        $jadwal->tanggalAkhir = $request->input('tanggalAkhir');
        $jadwal->save();
        return redirect('/jadwalAkademik')->with('success', 'jadwal akademik baru telah dibuat!');

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
        $jadwal = jadwal::find($id);
        return view('jadwal.edit')->with(['jadwal' => $jadwal ]);
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
            'jenis' => 'required',
            'tanggalMulai' => 'date',
            'tanggalAkhir' => 'date',            
        ]);
        $jadwal = jadwal::find($id);
        $jadwal->kelas = $request->input('kelas');
        $jadwal->semester = $request->input('semester');
        $jadwal->namaKegiatan = $request->input('namaKegiatan');
        $jadwal->jenis = $request->input('jenis');
        $jadwal->tanggalAwal = $request->input('tanggalAwal');
        $jadwal->tanggalAkhir = $request->input('tanggalAkhir');
        $jadwal->save();
        return redirect('/jadwalAkademik')->with('success', 'jadwal akademik baru telah dibuat!');

        
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
