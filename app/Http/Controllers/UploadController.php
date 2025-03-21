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

    // Acara 20: ke 1 Tambahkan function dropzone dan dropzone_store
    public function dropzone()
    {
        return view('dropzone');
    }

    public function dropzone_store(Request $request)
    {
        $image = $request->file('file');
        $imageName = time() . '-' . $image->getClientOriginalName();
        $image->move(public_path('img/dropzone'), $imageName);

        return response()->json(['success' => $imageName]);
    }


    //acara 20 ke 2
    // Menampilkan halaman upload
    public function pdf_upload()
    {
        return view('pdf_upload');
    }

    // Menyimpan file PDF yang di-upload
    public function pdf_store(Request $request)
    {
        // Validasi file yang di-upload
        $request->validate([
            'file.*' => 'required|mimes:pdf|max:10240'  // Mendukung banyak file
        ]);

        // Pastikan folder tujuan ada
        $destinationPath = public_path('pdf/dropzone');
        if (!File::isDirectory($destinationPath)) {
            File::makeDirectory($destinationPath, 0777, true, true);
        }

        // Array untuk menyimpan nama file yang berhasil diunggah
        $uploadedFiles = [];

        // Loop untuk menangani banyak file
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $pdf) {
                // Buat nama file unik
                $pdfName = 'pdf_' . time() . '_' . uniqid() . '.' . $pdf->extension();

                // Simpan file di folder public/pdf/dropzone
                $pdf->move($destinationPath, $pdfName);

                // Tambahkan ke daftar file yang diunggah
                $uploadedFiles[] = $pdfName;
            }

            // Kembalikan respons JSON dengan daftar file yang berhasil di-upload
            return response()->json(['success' => true, 'files' => $uploadedFiles]);
        }

        return response()->json(['success' => false, 'message' => 'No files uploaded'], 400);
    }
}
