<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Storage;
class waliKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->has('status')) {
            $waliKelas = user::where('role','wali kelas')
            ->where('status',request('status'))
            ->get();
            return view('walikelas.index')->with('waliKelas', $waliKelas);
        }else{
            $waliKelas = user::where('role','wali kelas')
            ->where('status','aktif')
            ->get();
            return view('walikelas.index')->with('waliKelas', $waliKelas);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('walikelas.create');
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
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255' ],
            'password' => ['required', 'string', 'min:8' ],
            'kelas' => ['required'],
            'alamat' => ['required'],
            'tempatLahir' => ['required'],
            'tanggalLahir' => ['required'],
            'fotoGuru' => 'image|nullable|max:1999',
        ]);
        
        if ($request->hasFile('fotoGuru')) {
            //get filename with extension
            $filenameWithExt = $request->file('fotoGuru')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('fotoGuru')->getClientOriginalExtension();
            //filename to store
            $fotoGuru = $filename . '_' . time() . '.' . $extension;
            //upload Image
            $path = $request->file('fotoGuru')->storeAs('public/fotoGuru', $fotoGuru);
        } else {
            $fotoGuru = 'noimage.jpg';
        }
        $pass = Hash::make($request->input('password'));
        $role = 'wali kelas';
        $status = 'aktif';
        $walikelas = new User;
        $walikelas->name = $request->input('nama');
        $walikelas->email = $request->input('email');
        $walikelas->password = $pass;
        $walikelas->alamat = $request->input('alamat');
        $walikelas->pekerjaan = $request->input('pekerjaan');
        $walikelas->tempatLahir = $request->input('tempatLahir');
        $walikelas->tanggalLahir = $request->input('tanggalLahir');
        $walikelas->kelas = $request->input('kelas');
        $walikelas->status = $status;
        $walikelas->role = $role;
        $walikelas->foto = $fotoGuru;
        $walikelas->save();
        return redirect('/waliKelas')->with('success', 'data wali kelas baru telah dibuat!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $waliKelas = user::find($id);
        return view('walikelas.show')->with('waliKelas', $waliKelas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $waliKelas = user::find($id);
        return view('walikelas.edit')->with('waliKelas', $waliKelas);
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
            'nama' => ['required', 'string', 'max:255'],
            'kelas' => ['required'],
            'alamat' => ['required'],
            'tempatLahir' => ['required'],
            'tanggalLahir' => ['required'],
            'fotoGuru' => 'image|nullable|max:1999',
        ]);
        $walikelas = user::find($id);
        $walikelas->name = $request->input('nama');
        $walikelas->alamat = $request->input('alamat');
        $walikelas->pekerjaan = $request->input('pekerjaan');
        $walikelas->tempatLahir = $request->input('tempatLahir');
        $walikelas->tanggalLahir = $request->input('tanggalLahir');
        $walikelas->kelas = $request->input('kelas');
        $walikelas->status = $request->input('status');
        //handle file upload
        if ($request->hasFile('fotoGuru')) {
            //get filename with extension
            $filenameWithExt = $request->file('fotoGuru')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('fotoGuru')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //upload Image
            $path = $request->file('fotoGuru')->storeAs('public/fotoGuru', $fileNameToStore);
            if ($request->hasFile('fotoGuru')) {
                Storage::delete('public/fotoGuru/' . $walikelas->fotoGuru);

            }
            $walikelas->foto = $fileNameToStore;
        }
        $walikelas->save();
        return redirect('/waliKelas')->with('success', 'data wali kelas telah diubah!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $waliKelas = user::find($id);
        $waliKelas->status = 'tidak aktif';
        $waliKelas->save();
        return redirect('/waliKelas')->with('success', 'wali kelas sudah masuk ke daftar tidak aktif');
    }
}
