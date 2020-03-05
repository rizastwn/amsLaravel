<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\siswa;
use App\User;
use App\nilaiTema;
use App\nilaiUtsUas;
use App\nilaiAkhir;
use App\nilaiAkhirSikap;
use App\kelas;
use App\nilaiSikapSpritual;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class siswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * menampilkan daftar siswa buat admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function daftarSiswa()
    {
        if (request()->has('kelas')) {
            $siswa = siswa::orderby('id', 'asc')
                ->where('kelas', request('kelas'))
                ->where('status', 'siswa')
                ->paginate(10);
            return view('siswa.daftarsiswa')->with('siswa', $siswa);
        } else if (request()->has('status')) {
            $siswa = siswa::orderby('id', 'asc')
                ->where('status', request('status'))
                ->paginate(10);
            return view('siswa.daftarsiswa')->with('siswa', $siswa);
        } else {
            $siswa = siswa::orderby('id', 'asc')
                ->where('status', 'siswa')
                ->where('kelas', '1')
                ->paginate(10);
            return view('siswa.daftarsiswa')->with('siswa', $siswa);
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
        $siswa = DB::table('siswas')
            ->join('users', 'users.idSiswa', '=', 'siswas.id')
            ->select('siswas.*')
            ->where('users.id', $user->id)
            ->where('users.status', 'aktif')
            ->first();
        return view('siswa.index')->with('siswa', $siswa);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create');
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
            'nis' => 'required',
            'nama' => 'required',
            'kelas' => ['required','integer'],
            'fotoSiswa' => 'image|nullable|max:1999',
        ]);
        //handle file upload
        if ($request->hasFile('fotoSiswa')) {
            //get filename with extension
            $filenameWithExt = $request->file('fotoSiswa')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('fotoSiswa')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //upload Image
            $path = $request->file('fotoSiswa')->storeAs('public/fotoSiswa', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $statusAktif = 'tidak aktif';
        $siswa = new siswa;
        $siswa->status = $statusAktif;
        $siswa->nama = $request->input('nama');
        $siswa->nis = $request->input('nis');
        $siswa->tempatLahir = $request->input('tempatLahir');
        $siswa->tanggalLahir = $request->input('tanggalLahir');
        $siswa->kelas = $request->input('kelas');
        $siswa->alamat = $request->input('alamat');
        $siswa->jenisDifabel = $request->input('difabel');
        $siswa->fotoSiswa = $fileNameToStore;
        $siswa->save();

        
        $siswaBaru = DB::table('siswas')->latest('created_at')->first();
        $guruBaru = user::all()->where('kelas', '=', $siswaBaru->kelas)->first();

        //buat kelas baru semester ganjil
        $kelasGanjil = new kelas;
        $kelasGanjil->idSiswa = $siswaBaru->id;
        $kelasGanjil->idWaliKelas = $guruBaru->id;
        $kelasGanjil->kelas = $siswaBaru->kelas;
        $kelasGanjil->status = 'proses pembelajaran';
        $kelasGanjil->tahunAjaran = date("Y");
        $kelasGanjil->semester = 'ganjil';
        $kelasGanjil->save();

        //buat kelar baru semester genap
        $kelasGenap = new kelas;
        $kelasGenap->idSiswa = $siswaBaru->id;
        $kelasGenap->idWaliKelas = $guruBaru->id;
        $kelasGenap->kelas = $siswaBaru->kelas;
        $kelasGenap->status = 'proses pembelajaran';
        $kelasGenap->tahunAjaran = date("Y");
        $kelasGenap->semester = 'genap';
        $kelasGenap->save();

        
        $mataPelajaran = ['Pendidikan Agama dan Budi Pekerti', 'Pendidikan Pancasila dan Kewarganegaraan', 'Bahasa Indonesia'
        , 'Matematika', 'Ilmu Pengetahuan Alam', 'Bahasa Inggris', 'Pendidikan Jasmani, Olah Raga, dan Kesehatan',
        'Prakarya', 'Program Khusus (Bina Diri)', 'Mulok (Bahasa Jawa)'];

        $tema = ['1', '2', '3', '4'];
        //nilai Tema semester ganjil

        if (is_array($tema) || is_object($tema)) {
            foreach ($tema as $data) {
                if (is_array($mataPelajaran) || is_object($mataPelajaran)) 
                {
                    foreach ($mataPelajaran as $item) {
                        $nilaiTemaGanjil = new nilaiTema;
                        $nilaiTemaGanjil->idKelas = $kelasGanjil->id;
                        $nilaiTemaGanjil->tema = $data;
                        $nilaiTemaGanjil->p1 = rand(70, 100);
                        $nilaiTemaGanjil->p2 = rand(70, 100);
                        $nilaiTemaGanjil->p3 = rand(70, 100);
                        $nilaiTemaGanjil->k1 = rand(70, 100);
                        $nilaiTemaGanjil->k2 = rand(70, 100);
                        $nilaiTemaGanjil->k3 = rand(70, 100);
                        $nilaiTemaGanjil->pRata = rand(70, 100);
                        $nilaiTemaGanjil->kRata = rand(70, 100);
                        $nilaiTemaGanjil->mataPelajaran = $item;
                        $nilaiTemaGanjil->save();
                    }
                }
            }
        }
        //nilai sikap untuk tema
        if (is_array($tema) || is_object($tema)) 
        {
            foreach ($tema as $item) {
                $nilaiSikapGanjil = new nilaiSikapSpritual;
                $nilaiSikapGanjil->idKelas = $kelasGanjil->id;
                $nilaiSikapGanjil->tema = $item;
                $nilaiSikapGanjil->sosial = 'siswa telah bisa bersosialiasi dengan teman sebaya dan guru-guru sekolah';
                $nilaiSikapGanjil->sosial = 'siswa telah bisa mengendalikan emosinya seperti senang, marah, dan bahagia';
                $nilaiSikapGanjil->save();
            }
        }

        //nilai UTS UAS ganjil
        if (is_array($mataPelajaran) || is_object($mataPelajaran)) {
            foreach ($mataPelajaran as $item) {
                $nilaiUtsUasGanjil = new nilaiUtsUas;
                $nilaiUtsUasGanjil->idKelas = $kelasGanjil->id;
                $nilaiUtsUasGanjil->mataPelajaran = $item;
                $nilaiUtsUasGanjil->utsP = rand(70, 100);
                $nilaiUtsUasGanjil->uasP = rand(70, 100);
                $nilaiUtsUasGanjil->utsK = rand(70, 100);
                $nilaiUtsUasGanjil->uasK = rand(70, 100);
                $nilaiUtsUasGanjil->save();
            }
        }
        //nilai Akhir ganjil
        if (is_array($mataPelajaran) || is_object($mataPelajaran)) {
            foreach ($mataPelajaran as $item) {
                $nilaiAkhirGanjil = new nilaiAkhir;
                $nilaiAkhirGanjil->idKelas = $kelasGanjil->id;
                $nilaiAkhirGanjil->mataPelajaran = $item;
                $nilaiUtsUasGanjil->nilaiKetrampilan = rand(70, 100);
                $nilaiUtsUasGanjil->nilaiPengetahuan = rand(70, 100);
                $nilaiUtsUasGanjil->deskripsi = 'siswa memiliki potensi dalam mata pelajaran ini, semoga bisa terus dikembangkan';
                $nilaiAkhirGanjil->save();
            }
        }
        //nilai sikap untuk nilai akhir
        $nilaiSikapGanjil = new nilaiAkhirSikap;
        $nilaiSikapGanjil->idKelas = $kelasGanjil->id;
        $nilaiSikapGanjil->sosial = 'siswa telah bisa bersosialiasi dengan teman sebaya dan guru-guru sekolah';
        $nilaiSikapGanjil->spiritual = 'siswa telah bisa mengendalikan emosinya seperti senang, marah, dan bahagia';
        $nilaiSikapGanjil->save();

        /////////
        if (is_array($tema) || is_object($tema)) {
            foreach ($tema as $data) {
                if (is_array($mataPelajaran) || is_object($mataPelajaran)) 
                {
                    foreach ($mataPelajaran as $item) {
                        $nilaiTemaGenap = new nilaiTema;
                        $nilaiTemaGenap->idKelas = $kelasGenap->id;
                        $nilaiTemaGenap->tema = $data;
                        $nilaiTemaGenap->p1 = rand(70, 100);
                        $nilaiTemaGenap->p2 = rand(70, 100);
                        $nilaiTemaGenap->p3 = rand(70, 100);
                        $nilaiTemaGenap->k1 = rand(70, 100);
                        $nilaiTemaGenap->k2 = rand(70, 100);
                        $nilaiTemaGenap->k3 = rand(70, 100);
                        $nilaiTemaGenap->pRata = rand(70, 100);
                        $nilaiTemaGenap->kRata = rand(70, 100);
                        $nilaiTemaGenap->mataPelajaran = $item;
                        $nilaiTemaGenap->save();
                    }
                }
            }
        }
        //nilai sikap untuk tema
        if (is_array($tema) || is_object($tema)) 
        {
            foreach ($tema as $item) {
                $nilaiSikapGenap = new nilaiSikapSpritual;
                $nilaiSikapGenap->idKelas = $kelasGenap->id;
                $nilaiSikapGenap->sosial = 'siswa telah bisa bersosialiasi dengan teman sebaya dan guru-guru sekolah';
                $nilaiSikapGenap->sosial = 'siswa telah bisa mengendalikan emosinya seperti senang, marah, dan bahagia';
                $nilaiSikapGenap->tema = $item;
                $nilaiSikapGenap->save();
            }
        }

        //nilai UTS UAS ganjil
        if (is_array($mataPelajaran) || is_object($mataPelajaran)) {
            foreach ($mataPelajaran as $item) {
                $nilaiUtsUasGenap = new nilaiUtsUas;
                $nilaiUtsUasGenap->idKelas = $kelasGenap->id;
                $nilaiUtsUasGenap->utsP = rand(70, 100);
                $nilaiUtsUasGenap->uasP = rand(70, 100);
                $nilaiUtsUasGenap->utsK = rand(70, 100);
                $nilaiUtsUasGenap->uasK = rand(70, 100);
                $nilaiUtsUasGenap->mataPelajaran = $item;
                $nilaiUtsUasGenap->save();
            }
        }
        //nilai Akhir ganjil
        if (is_array($mataPelajaran) || is_object($mataPelajaran)) {
            foreach ($mataPelajaran as $item) {
                $nilaiAkhirGenap = new nilaiAkhir;
                $nilaiAkhirGenap->idKelas = $kelasGenap->id;
                $nilaiAkhirGenap->mataPelajaran = $item;
                $nilaiAkhirGenap->nilaiKetrampilan = rand(70, 100);
                $nilaiAkhirGenap->nilaiPengetahuan = rand(70, 100);
                $nilaiAkhirGenap->deskripsi = 'siswa memiliki potensi dalam mata pelajaran ini, semoga bisa terus dikembangkan';
                $nilaiAkhirGenap->save();
            }
        }
        //nilai sikap untuk nilai akhir
        $nilaiSikapGenap = new nilaiAkhirSikap;
        $nilaiSikapGenap->idKelas = $kelasGenap->id;
        $nilaiSikapGenap->sosial = 'siswa telah bisa bersosialiasi dengan teman sebaya dan guru-guru sekolah';
        $nilaiSikapGenap->spiritual = 'siswa telah bisa mengendalikan emosinya seperti senang, marah, dan bahagia';
        $nilaiSikapGenap->save();

        
        return redirect('/daftarSiswa')->with('success', 'data siswa baru telah dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = siswa::find($id);
        return view('siswa.show')->with('siswa', $siswa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = siswa::find($id);
        return view('siswa.edit')->with('siswa', $siswa);
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
            'nis' => 'required',
            'nama' => 'required',
            'tempatLahir' => 'required',
            'tanggalLahir' => 'required',
            'alamat' => 'required',
            'difabel' => 'required',
            'fotoSiswa' => 'image|nullable|max:1999',

        ]);
        $siswa = siswa::find($id);
        $siswa->nama = $request->input('nama');
        $siswa->nis = $request->input('nis');
        $siswa->tempatLahir = $request->input('tempatLahir');
        $siswa->tanggalLahir = $request->input('tanggalLahir');
        $siswa->status = $request->input('status');
        $siswa->alamat = $request->input('alamat');
        $siswa->jenisDifabel = $request->input('difabel');
        //handle file upload
        if ($request->hasFile('fotoSiswa')) {
            //get filename with extension
            $filenameWithExt = $request->file('fotoSiswa')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('fotoSiswa')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //upload Image
            $path = $request->file('fotoSiswa')->storeAs('public/fotoSiswa', $fileNameToStore);
            if ($request->hasFile('fotoSiswa')) {
                Storage::delete('public/fotoSiswa/' . $siswa->fotoSiswa);
            }
            $siswa->fotoSiswa = $fileNameToStore;
        }
        $siswa->save();
        return redirect('/daftarSiswa')->with('success', 'data siswa telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = siswa::find($id);
        $siswa->status = 'alumni';
        $siswa->save();
        $kelasGanjil = kelas::where([
            ['idSiswa',$id],
            ['semester','lulus'],
            ['kelas',$siswa->kelas]
        ])
        ->first();
        $kelasGanjil->status = 'alumni';
        $kelasGanjil->save();
        $kelasGenap = kelas::where([
            ['idSiswa',$id],
            ['semester','genap'],
            ['kelas',$siswa->kelas]
        ])
        ->first();
        $kelasGenap->status = 'lulus';
        $kelasGenap->save();
        return redirect('/daftarSiswa')->with('success', 'siswa sudah masuk ke daftar alumni');
    }
}
