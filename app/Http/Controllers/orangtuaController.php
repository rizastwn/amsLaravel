<?php

namespace App\Http\Controllers;

use App\siswa;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class orangtuaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * menampilkan daftar orang tua untuk admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function daftarOrangtua()
    {
        if (request()->has('kelas')) {
            $orangtua = DB::table('siswas')
                ->join('users', 'users.idSiswa', '=', 'siswas.id')
                ->select('users.*', 'siswas.nama', 'siswas.kelas')
                ->where('siswas.kelas', request('kelas'))
                ->where('users.status', 'aktif')
                ->get();
            return view('orangtua.daftarOrangtua')->with('orangtua', $orangtua);
        }else if(request()->has('status')){
            $orangtua = DB::table('siswas')
            ->join('users', 'users.idSiswa', '=', 'siswas.id')
            ->select('users.*', 'siswas.nama', 'siswas.kelas')
            ->where('users.status',request('status'))
            ->get();
            return view('orangtua.daftarOrangtua')->with('orangtua', $orangtua);
        }else{
            $orangtua = DB::table('siswas')
            ->join('users', 'users.idSiswa', '=', 'siswas.id')
            ->select('users.*', 'siswas.nama', 'siswas.kelas')
            ->where('siswas.kelas', '1')
            ->where('users.status', 'aktif')
            ->get();
            return view('orangtua.daftarOrangtua')->with('orangtua', $orangtua);
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $orangtua = User::where('id',$user->id)->first();
        return view('orangtua.show')->with('orangtua', $orangtua);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = siswa::where('status','=','tidak aktif')->get();
        return view('orangtua.create')->with('siswa', $siswa);
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
            'namaAyah' => ['required', 'string', 'max:255'],
            'emailAyah' => ['required', 'string', 'email', 'max:255'],
            'passwordAyah' => ['required', 'string', 'min:8'],
            'idSiswa' => ['required','integer'],
            'alamatAyah' => ['required'],
            'pekerjaanAyah' => ['required'],
            'tempatLahirAyah' => ['required'],
            'tanggalLahirAyah' => ['required'],
            'fotoAyah' => 'image|nullable|max:1999',

            'namaIbu' => ['required', 'string', 'max:255'],
            'emailIbu' => ['required', 'string', 'email', 'max:255'],
            'passwordIbu' => ['required', 'string', 'min:8'],
            'alamatIbu' => ['required'],
            'pekerjaanIbu' => ['required'],
            'tempatLahirIbu' => ['required'],
            'tanggalLahirIbu' => ['required'],
            'fotoIbu' => 'image|nullable|max:1999',
        ]);
        // menyimpan file ayah
        //handle file upload
        if ($request->hasFile('fotoAyah')) {
            //get filename with extension
            $filenameWithExt = $request->file('fotoAyah')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('fotoAyah')->getClientOriginalExtension();
            //filename to store
            $fileNameToStoreAyah = $filename . '_' . time() . '.' . $extension;
            //upload Image
            $pathAyah = $request->file('fotoAyah')->storeAs('public/foto', $fileNameToStoreAyah);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $passAyah = Hash::make($request->input('passwordAyah'));
        $role = 'orang tua';
        $status = 'aktif';
        $ayah = new User;
        $ayah->name = $request->input('namaAyah');
        $ayah->email = $request->input('emailAyah');
        $ayah->password = $passAyah;
        $ayah->idSiswa = $request->input('idSiswa');
        $ayah->alamat = $request->input('alamatAyah');
        $ayah->pekerjaan = $request->input('pekerjaanAyah');
        $ayah->tempatLahir = $request->input('tempatLahirAyah');
        $ayah->tanggalLahir = $request->input('tanggalLahirAyah');
        $ayah->role = $role;
        $ayah->status = $status;
        $ayah->foto = $fileNameToStoreAyah;
        $ayah->save();

        // menyimpan data ibu
        //handle file upload
        if ($request->hasFile('fotoIbu')) {
            //get filename with extension
            $filenameWithExt = $request->file('fotoIbu')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('fotoIbu')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //upload Image
            $pathIbu = $request->file('fotoIbu')->storeAs('public/foto', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $passIbu = Hash::make($request->input('passwordIbu'));
        $ibu = new User;
        $ibu->name = $request->input('namaIbu');
        $ibu->email = $request->input('emailIbu');
        $ibu->password = $passIbu;
        $ibu->idSiswa = $request->input('idSiswa');
        $ibu->alamat = $request->input('alamatIbu');
        $ibu->pekerjaan = $request->input('pekerjaanIbu');
        $ibu->tempatLahir = $request->input('tempatLahirIbu');
        $ibu->tanggalLahir = $request->input('tanggalLahirIbu');
        $ibu->role = $role;
        $ibu->status = $status;
        $ibu->foto = $fileNameToStore;
        $ibu->save();

        $siswa = siswa::find($request->input('idSiswa'));
        $siswa->status = 'siswa';
        $siswa->save();
        return redirect('/daftarOrangtua')->with('success', 'data orang tua baru telah dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orangtua = DB::table('siswas')
            ->join('users', 'users.idSiswa', '=', 'siswas.id')
            ->select('users.*', 'siswas.nama', 'siswas.kelas')
            ->where('users.id', '=', $id)
            ->where('users.status', 'aktif')
            ->first();
        return view('orangtua.show')->with('orangtua', $orangtua);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orangtua = user::find($id);
        return view('orangtua.edit')->with('orangtua', $orangtua);
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
            'alamat' => ['required'],
            'pekerjaan' => ['required'],
            'tempatLahir' => ['required'],
            'tanggalLahir' => ['required'],
            'status' => ['required'],
            'foto' => 'image|nullable|max:1999',

        ]);

        $orangtua = user::find($id);
        $orangtua->name = $request->input('nama');
        $orangtua->pekerjaan = $request->input('alamat');
        $orangtua->pekerjaan = $request->input('pekerjaan');
        $orangtua->tempatLahir = $request->input('tempatLahir');
        $orangtua->tanggalLahir = $request->input('tanggalLahir');
        $orangtua->status = $request->input('status');
        //handle file upload
        if ($request->hasFile('foto')) {
            //get filename with extension
            $filenameWithExt = $request->file('foto')->getClientOriginalName();
            //get just file name
            $filename = pathinfo ($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('foto')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //upload Image
            $path = $request->file('foto')->storeAs('public/foto', $fileNameToStore);
            if ($request->hasFile('foto')) {
                Storage::delete('public/foto/' . $orangtua->foto);

            }
            $orangtua->foto = $fileNameToStore;
        }
        $orangtua->save();
        $user = Auth::user();
        if ($user->role == 'admin') {
            return redirect('/daftarOrangtua')->with('success', 'data orang tua baru telah diubah!');
        }
        return redirect('/orangtua')->with('success', 'data orang tua baru telah diubah!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orangtua = user::find($id);
        $orangtua->status = 'tidak aktif';
        $orangtua->save();
        return redirect('/daftarOrangtua')->with('success', 'orang tua sudah masuk ke daftar alumni');

    }
}
