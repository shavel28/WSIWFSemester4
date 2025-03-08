<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    //PARAMETER VARIABEL
    // // public function index($nama){
    //     return $nama;
    // }

    //SEGMENT VARIABEL
    public function index(Request $request)
    {
        return $request->segment(2);
    }

    //menangkap data melalui inputan (menampilkan formulir)
    public function formulir(){
        return view('formulir');
    }
    
    // public function proses(Request $request){
    //     $nama = $request->input('nama');
    //     $alamat = $request->input('alamat');
    
    //     return "Nama : ".$nama.", Alamat : ".$alamat;
    // }

    //acara   // Proses input form dengan validasi
    public function proses(Request $request){
        $messages = [
            'required' => 'Input :attribute wajib diisi!',
            'min' => 'Input :attribute harus diisi minimal :min karakter!',
            'max' => 'Input :attribute harus diisi maksimal :max karakter!',
        ];

        $this->validate($request,[
            'nama' => 'required|min:5|max:20',
            'alamat' => 'required|alpha'
        ], $messages);

        $nama = $request->input('nama');
        $alamat = $request->input('alamat');

        return "Nama : ".$nama.", Alamat : ".$alamat;
    }
    
}
