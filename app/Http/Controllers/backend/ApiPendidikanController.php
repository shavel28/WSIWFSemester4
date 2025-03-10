<?php

namespace App\Http\Controllers\backend;

use App\Models\Pendidikan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class ApiPendidikanController extends Controller
{
    public function getAll()
    {
        $pendidikan = Pendidikan::all(); // Ambil semua data pendidikan dari database
        return Response::json($pendidikan, 201); // Kirim sebagai response JSON
    }

    //acara 21
public function getPen($id)
{
    $pendidikan = Pendidikan::find($id);

    return Response::json($pendidikan, 200);
}

public function createPen(Request $request)
{
    $request->validate([
        'nama' => 'required|string',
        'tingkatan' => 'required|string',
        'tahun_masuk' => 'required|integer',
        'tahun_keluar' => 'required|integer',
    ]);

    Pendidikan::create($request->all());

    return response()->json([
        'status' => 'ok',
        'message' => 'Pendidikan berhasil ditambahkan!'
    ], 201);
}

public function updatePen($id, Request $request)
{
    Pendidikan::find($id)->update($request->all());

    return response()->json([
        'status' => 'ok',
        'message' => 'Pendidikan berhasil dirubah!'
    ], 201);
}

public function deletePen($id)
{
    Pendidikan::destroy($id);

    return response()->json([
        'status' => 'ok',
        'message' => 'Pendidikan berhasil dihapus!'
    ], 201);
}


}