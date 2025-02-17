<?php

use Illuminate\Support\Facades\Route;
use illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RouteCheckController;
use App\Http\Controllers\ManagementUserController;

/*
 /\_/\  
( -.- )  Zzz...
(  >💻 )  
*/


//-------------------------------------------- ACARA 3 ------------------------------------------------------
// Route::get('/', function () {
//     return view('welcome');
// });

// // Route::get('/blog', function () {
// //     $a = 2;
// //     $b = 4;
// //     $c = $a + $b;
// //     return 'hasil dari a + b = '.$c;
// // });

// Route::get('coba', function () {
//     return view ('coba');
// });

// Route::view('/coba', 'coba');

// Route::get('/coba', function () {
//     return view('coba', ['data' => 'saya programmer pemula']);
// });

// Route::view('/coba', 'coba', ['data' => 'saya programmer pemula'] );

// // Route::get('/coba', function (){
//     $profile = 'aku programmer';
//     return view('coba', ['data' => $profile]);
// });

//route parameter
// Route::get('/coba/{id}', function ($id){
//     return 'ini adalah '.$id;
// });

// Route::get('/coba/{id}', function (Request $request){
//     return 'ini adalah '.$request->id;
// });

// Route untuk menampilkan halaman form
// Route::get('/form', function () {
//     return view('form'); // Menampilkan form di `resources/views/form.blade.php`
// });  


// // Route untuk menangani GET dan POST di /submit
// Route::match(['get', 'post'], '/submit',function (Request $request) {
//     if ($request->isMethod('get')) {
//         return redirect('/form');
//     }
//     return "Form submitted successsfully!";
// });

// // Redirect dari /here ke /there secara permanen (301)
// Route::redirect('/here', '/there', 301);

// // Route untuk /there agar bisa diakses
// Route::get('/there', function () {
//     return "Anda telah dialihkan ke halaman /there";
// });

// // Parameter Opsional
// Route::get('/user/{name?}', function ($name = "Guest") {
//     return "Hello, " . ucfirst($name);
// });

// //Regular Expression Constraints
// Route::get('user/{name}', function ($name) {
//     return "Hello, " . ucfirst($name);
// })->where('name', '[A-Za-z]+');
// Route::get('user/{id}', function ($id) {
//     return "User ID: " . $id;
// })->where('id', '[0-9]+');
// Route::get('user/{id}/{name}', function ($id, $name) {
//     return "User ID: " . $id . ", Name: " . ucfirst($name);
// })->where(['id' => '[0-9]+', 'name' => '[a-z]+']);


// Route::get('/post/{slug}', function ($slug) {
//     return "Post: $slug";
// });

// // Global Constraints (Tambahkan di `app/Providers/RouteServiceProvider.php`)
// Route::get('/post/{slug}', function ($slug) {
//     return "Post: $slug";
// });

// // Encoded Forward Slashes
// Route::get('/search/{query}', function ($query) {
//     return "Search query: " . urldecode($query);
// })->where('query', '.*'); // Mengizinkan `/` dalam parameter


//--------------------------------------------------- ACARA 4 --------------------------------------------------

// //Generate url bernama
// Route::get('/profile/{id}', [UserController::class, 'show'])->name('profile.show');

// //Memeriksa rute saat ini
// Route::get('/check-route', [RouteCheckController::class, 'checkRoute'])->name('check.route');

// //Middleware
// Route::get('/check-route', function () {
//     return response()->json(['message' => 'Rute berhasil diakses!']);
// })->middleware('check.route')->name('check.route');

// // Route dengan Middleware
// Route::get('/admin', function () {
//     return "Halaman Admin";
// })->middleware('check.role');

// // Route menggunakan Controller
// Route::get('/user/{id}', [UserController::class, 'show']);

// //Name Space
// Route::get('/user/{id}', [UserController::class, 'show']);

// //Subdomain route
// // Route::domain('sub.yourdomain.com')->group(function () {
// //     Route::get('/', function () {
// //         return 'Ini halaman subdomain';
// //     });

// //     Route::get('/dashboard', function () {
// //         return 'Dashboard subdomain';
// //     });
// // });

// //Route Prefixes
// Route::prefix('admin')->group(function () {
//     Route::get('users', function () {
//         return 'Daftar Users';
//     });
// });

// Route::name('admin.')->group(function (){
//     Route::get('users', function (){

//     })->name('users');
// });



//-------------------------------------ACARA 5-----------------------------------------------

// Rute untuk menampilkan daftar user
Route::get('/user', [ManagementUserController::class, 'index']);

// Rute untuk resource controller (CRUD otomatis)
Route::resource('user', ManagementUserController::class);