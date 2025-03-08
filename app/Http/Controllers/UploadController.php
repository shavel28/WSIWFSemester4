<?php
 
 namespace App\Http\Controllers;
 
 use Illuminate\Http\Request;
 use Illuminate\Support\Facades\File;
 use Intervention\Image\Facades\Image; 
 use Intervention\Image\ImageManager;
 
 
 class UploadController extends Controller
 {
     public function upload()
     {
         return view('upload');
     }
 
     public function proses_upload(Request $request)
     {
         $this->validate($request, [
             'file' => 'required',
             'keterangan' => 'required',
         ]);
 
         // Menyimpan data file yang diupload ke variabel $file
         $file = $request->file('file');
 
         // Nama file
         echo 'File Name: ' . $file->getClientOriginalName() . '<br>';
 
         // Ekstensi file
         echo 'File Extension: ' . $file->getClientOriginalExtension() . '<br>';
 
         // Real path
         echo 'File Real Path: ' . $file->getRealPath() . '<br>';
 
         // Ukuran file
         echo 'File Size: ' . $file->getSize() . '<br>';
 
         // Tipe MIME
         echo 'File Mime Type: ' . $file->getMimeType();
 
         // Tentukan folder tujuan penyimpanan
         $tujuan_upload = 'data_file';
 
         // Upload file ke folder tujuan
         $file->move($tujuan_upload, $file->getClientOriginalName());
     }
 
     public function resize_upload(Request $request)
     {
         // Validasi input
         $this->validate($request, [
             'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             'keterangan' => 'required',
         ]);
 
         // Tentukan path lokasi upload dan folder tujuan
         $uploadPath = public_path('data_file'); // Pastikan file akan disimpan di folder yang tepat
         $path = public_path('img/logo'); // Folder tujuan untuk menyimpan gambar yang sudah di-resize
 
         // Jika folder belum ada, buat folder baru
         if (!File::isDirectory($path)) {
             File::makeDirectory($path, 0777, true, true);
         }
 
         // Ambil file image dari form
         $file = $request->file('file');
 
         // Buat nama unik untuk file dengan ekstensi asli
         $fileName = 'logo_' . uniqid() . '.' . $file->getClientOriginalExtension();
 
         // Simpan file pertama ke folder data_file
         $file->move($uploadPath, $fileName);
 
         // Menggunakan Intervention Image untuk memuat gambar
         $img = Image::make($uploadPath . '/' . $fileName);
 
         // Resize gambar
         $img->resize(200, 200); // Anda bisa menyesuaikan ukuran
 
         // Simpan gambar yang telah di-resize ke folder tujuan
         $img->save($path . '/' . $fileName);
 
         return redirect(route('upload'))->with('success', 'Data berhasil ditambahkan!');
     }
 }