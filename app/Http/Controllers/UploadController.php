<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gambar;

class UploadController extends Controller
{
    public function upload ()
    {
        $gambar = Gambar::get();
        return view ('upload', [
            'gambar' => $gambar
        ]);
    }

    public function prosesUpload (Request $request)
    {
        $this->validate($request, [
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'keterangan' => 'required'
        ]);

        // menyimpan data request ke variable file
        $file = $request->file('file');

        $nama_file = time() . '_' . $file->getClientOriginalName();

        // // nama file
        // echo 'File Name : ' . $file->getClientOriginalName();
        // echo '<br>';

        // // ekstensi file
        // echo 'File Ekstensi : ' . $file->getClientOriginalExtension();
        // echo '<br>';

        // // real path
        // echo 'File Real Path : ' . $file->getRealPath();
        // echo '<br>';

        // // ukuran file
        // echo 'File Size : ' . $file->getSize();
        // echo '<br>';

        // // tipe mime
        // echo 'File Mime Type : ' . $file->getMimeType();
        // echo '<br>';

        // folder upload file
        $tujuan_upload = 'data_file';

        // upload file
        $file->move($tujuan_upload, $nama_file);

        Gambar::create([
            'file' => $nama_file,
            'keterangan' => $request->keterangan
        ]);

        return redirect('/upload')->with('success', 'Data Berhasil Disimpan');
    }

    public function edit ($id)
    {
        $data = Gambar::find($id);

        return view ('edit', [
            'data' => $data
        ]);
    }

    public function update (Request $request, $id)
    {
        $request->validate([
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'keterangan' => 'required'
        ]);

        $data = Gambar::find($id);

        // request file
        $file = $request->file('file');
        $nama_file = time() . '_' . $file->getClientOriginalName();

        // upload file
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload, $nama_file);

        // save file
        $data->file = $nama_file;
        $data->keterangan = $request->keterangan;

        $data->save();

        return redirect('/upload')->with('success', 'Data Berhasil Diupdate');
    }

    public function delete ($id) {
        $data = Gambar::find($id);
        $data->delete();

        return redirect('/upload')->with('success', 'Data Berhasil Dihapus');
    }
}
