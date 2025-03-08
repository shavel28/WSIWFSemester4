<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CobaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->segment(2) !== null) {
            $nama = $request->segment(2);

             // Jika nama adalah "admin", kembalikan 403 Forbidden
             if ($nama === 'admin') {
                abort(403, 'Akses dilarang!');
            }
            
            echo $nama;
        } else {
            abort(404);
        }
    }
}
