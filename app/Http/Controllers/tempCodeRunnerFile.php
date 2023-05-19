<?php
public function store(Request $request)
    {
        $inputs = $request->input('inputs');
    
        foreach ($inputs as $input) {
            $validator = Validator::make($input, [
                'kum_id' => 'required',
                'idjenispelaksanaan' => 'required',
                'semester_id' => 'required',
                'nama_kegiatan' => 'required',
                'tempat_instansi' => 'required',
                'jumlah_angka_kredit' == 0 ,
                'bukti' => 'required',
            ]);
    
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
    
            $pelaksanaan_pendidikan = new pelaksanaan_pendidikan();
            $pelaksanaan_pendidikan->kum_id = $input['kum_id'];
            $pelaksanaan_pendidikan->idjenispelaksanaan = $input['idjenispelaksanaan'];
            $pelaksanaan_pendidikan->semester_id = $input['semester_id'];
            $pelaksanaan_pendidikan->nama_kegiatan = $input['nama_kegiatan'];
            $pelaksanaan_pendidikan->tempat_instansi = $input['tempat_instansi'];
            $pelaksanaan_pendidikan->jumlah_angka_kredit = $input['jumlah_angka_kredit'];
            $pelaksanaan_pendidikan->bukti = $input['bukti'];
            $pelaksanaan_pendidikan->save();
        }
    
        return back()->with('success', 'Data berhasil disimpan');
    }