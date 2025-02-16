<?php

namespace App\Http\Controllers; // ✅ Namespace harus sesuai dengan struktur folder

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // ✅ Impor Controller jika perlu

class UserController extends Controller
{
    public function show($id)
    {
        return "Hello, User dengan ID: " . $id;
    }
}
