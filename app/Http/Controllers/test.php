
        $temaLoop = ['1', '2', '3', '4'];
        $subTemaLoop = ['1', '2'];
        //mencari id kelasGanjil
        $user = Auth::user();
        $kelasGanjil = kelas::where([
            ['idWaliKelas', $user->id],
            ['kelas', $user->kelas],
            ['semester', 'ganjil'],
        ])->first();

        //mencari id kelasGenap
        $user = Auth::user();
        $kelasGenap = kelas::where([
            ['idWaliKelas', $user->id],
            ['kelas', $user->kelas],
            ['semester', 'genap'],
        ])->first();

        // if (is_array($temaLoop) || is_object($temaLoop)) {
        //     foreach ($temaLoop as $data) {
        //         if (is_array($subTemaLoop) || is_object($subTemaLoop)) {
        //             foreach ($subTemaLoop as $item) {
        //                 $subtemaGanjilPenge = new subtema;
        //                 $subtemaGanjilPenge->idKelas = $kelasGanjil->id;
        //                 $subtemaGanjilPenge->tema = $data;
        //                 $subtemaGanjilPenge->subtema = $item;
        //                 $subtemaGanjilPenge->judul = $request->input('judul');
        //                 $subtemaGanjilPenge->mataPelajaran = $request->input('mataPelajaran');
        //                 $subtemaGanjilPenge->jenis = 'pengetahuan';
        //                 $subtemaGanjilPenge->tanggalAwal = $request->input('tanggalAwal');
        //                 $subtemaGanjilPenge->tanggalAkhir = $request->input('tanggalAkhir');
        //                 $subtemaGanjilPenge->deskripsi = $request->input('deskripsi');
        //                 $subtemaGanjilPenge->save();

        //                 $subtemaGanjilKetre = new subtema;
        //                 $subtemaGanjilKetre->idKelas = $kelasGanjil->id;
        //                 $subtemaGanjilKetre->tema = $data;
        //                 $subtemaGanjilKetre->subtema = $item;
        //                 $subtemaGanjilKetre->judul = $request->input('judul');
        //                 $subtemaGanjilKetre->mataPelajaran = $request->input('mataPelajaran');
        //                 $subtemaGanjilKetre->jenis = 'ketrampilan';
        //                 $subtemaGanjilKetre->tanggalAwal = $request->input('tanggalAwal');
        //                 $subtemaGanjilKetre->tanggalAkhir = $request->input('tanggalAkhir');
        //                 $subtemaGanjilKetre->deskripsi = $request->input('deskripsi');
        //                 $subtemaGanjilKetre->save();
        //             }
        //         }
        //     }
        // }
        // if (is_array($temaLoop) || is_object($temaLoop)) {
        //     foreach ($temaLoop as $data) {
        //         if (is_array($subTemaLoop) || is_object($subTemaLoop)) {
        //             foreach ($subTemaLoop as $item) {
        //                 $subtemaGenapPenge = new subtema;
        //                 $subtemaGenapPenge->idKelas = $kelasGenap->id;
        //                 $subtemaGenapPenge->tema = $data;
        //                 $subtemaGenapPenge->subtema = $item;
        //                 $subtemaGenapPenge->judul = $request->input('judul');
        //                 $subtemaGenapPenge->mataPelajaran = $request->input('mataPelajaran');
        //                 $subtemaGenapPenge->jenis = 'pengetahuan';
        //                 $subtemaGenapPenge->tanggalAwal = $request->input('tanggalAwal');
        //                 $subtemaGenapPenge->tanggalAkhir = $request->input('tanggalAkhir');
        //                 $subtemaGenapPenge->deskripsi = $request->input('deskripsi');
        //                 $subtemaGenapPenge->save();

        //                 $subtemaGenapKetre = new subtema;
        //                 $subtemaGenapKetre->idKelas = $kelasGenap->id;
        //                 $subtemaGenapKetre->tema = $data;
        //                 $subtemaGenapKetre->subtema = $item;
        //                 $subtemaGenapKetre->judul = $request->input('judul');
        //                 $subtemaGenapKetre->mataPelajaran = $request->input('mataPelajaran');
        //                 $subtemaGenapKetre->jenis = 'ketrampilan';
        //                 $subtemaGenapKetre->tanggalAwal = $request->input('tanggalAwal');
        //                 $subtemaGenapKetre->tanggalAkhir = $request->input('tanggalAkhir');
        //                 $subtemaGenapKetre->deskripsi = $request->input('deskripsi');
        //                 $subtemaGenapKetre->save();
        //             }
        //         }
        //     }
        // }

        // // mencari seluruh siswa dalam kelas ganjil
        // $kelasSiswaGanjil = kelas::where([
        //     ['idWaliKelas', $user->id],
        //     ['kelas', $user->kelas],
        //     ['semester', 'ganjil'],
        // ])->get();

        // foreach ($kelasSiswaGanjil as $data) {

        //     if (is_array($temaLoop) || is_object($temaLoop)) {
        //         foreach ($temaLoop as $data) {
        //             if (is_array($subTemaLoop) || is_object($subTemaLoop)) {
        //                 foreach ($subTemaLoop as $item) {
        //                     $nilaiSubtemaPenge = new nilaiSubtema;
        //                     $nilaiSubtemaPenge->idKelas = $kelasGanjil->id;
        //                     $nilaiSubtemaPenge->tema = $data;
        //                     $nilaiSubtemaPenge->subtema = $item;
        //                     $nilaiSubtemaPenge->jenis = 'pengetahuan';
        //                     $nilaiSubtemaPenge->jenis = rand(70, 100);
        //                     $nilaiSubtemaPenge->mataPelajaran = $request->input('mataPelajaran');
        //                     $nilaiSubtemaPenge->save();

        //                     $nilaiSubtemaPenge = new nilaiSubtema;
        //                     $nilaiSubtemaPenge->idKelas = $kelasGanjil->id;
        //                     $nilaiSubtemaPenge->tema = $data;
        //                     $nilaiSubtemaPenge->subtema = $item;
        //                     $nilaiSubtemaPenge->jenis = 'ketrampilan';
        //                     $nilaiSubtemaPenge->jenis = rand(70, 100);
        //                     $nilaiSubtemaPenge->mataPelajaran = $request->input('mataPelajaran');
        //                     $nilaiSubtemaPenge->save();
        //                 }
        //             }
        //         }
        //     }
        // }

        // // mencari seluruh siswa dalam kelas genap
        // $kelasSiswaGenap = kelas::where([
        //     ['idWaliKelas', $user->id],
        //     ['kelas', $user->kelas],
        //     ['semester', 'genap'],
        // ])->get();

        // foreach ($kelasSiswaGenap as $data) {

        //     if (is_array($temaLoop) || is_object($temaLoop)) {
        //         foreach ($temaLoop as $data) {
        //             if (is_array($subTemaLoop) || is_object($subTemaLoop)) {
        //                 foreach ($subTemaLoop as $item) {
        //                     $nilaiSubtemaPenge = new nilaiSubtema;
        //                     $nilaiSubtemaPenge->idKelas = $kelasGenap->id;
        //                     $nilaiSubtemaPenge->tema = $data;
        //                     $nilaiSubtemaPenge->subtema = $item;
        //                     $nilaiSubtemaPenge->jenis = 'pengetahuan';
        //                     $nilaiSubtemaPenge->jenis = rand(70, 100);
        //                     $nilaiSubtemaPenge->mataPelajaran = $request->input('mataPelajaran');
        //                     $nilaiSubtemaPenge->save();

        //                     $nilaiSubtemaPenge = new nilaiSubtema;
        //                     $nilaiSubtemaPenge->idKelas = $kelasGenap->id;
        //                     $nilaiSubtemaPenge->tema = $data;
        //                     $nilaiSubtemaPenge->subtema = $item;
        //                     $nilaiSubtemaPenge->jenis = 'ketrampilan';
        //                     $nilaiSubtemaPenge->jenis = rand(70, 100);
        //                     $nilaiSubtemaPenge->mataPelajaran = $request->input('mataPelajaran');
        //                     $nilaiSubtemaPenge->save();
        //                 }
        //             }
        //         }
        //     }
        // }
