<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RouteCheckController;
use App\Http\Controllers\ManagementUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Backend\PengalamanKerjaController;
use App\Http\Controllers\Backend\PendidikanController;

/*
 /\_/\  
( -.- )  Zzz...
(  >💻 )  
*/


//-------------------------------------------- ACARA 3 ------------------------------------------------------
Route::get('/', function () {
    return view('welcome');
});

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

// // Rute untuk menampilkan daftar user
// Route::get('/user', [ManagementUserController::class, 'index']);

// // Rute untuk resource controller (CRUD otomatis)
// Route::resource('user', ManagementUserController::class);

// //-----------------------------------ACARA 6-------------------------------------------------------------------
// //membuat view sederhana
// Route::get("/home", function(){
//     return view("home");
// });

// Route::group(['namespace' => 'Frontend'], function(){
//     Route::resource('home', 'HomeController');
// });
Route::get('/home', [HomeController::class, 'index']);

// Rute untuk resource controller (CRUD otomatis)
Route::resource('/home', HomeController::class);

//ACARA 8
Route::resource('dashboard', DashboardController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//acara 13
Route::group(['namespace' => ''], function()
{
    Route::resource('pendidikan', 'PendidikanController');
    Route::resource('pengalaman_kerja', PengalamanKerjaController::class);
});

Route::group(['namespace' => 'Backend'], function()
{
    Route::resource('dashboard', 'DashboardController');
    Route::resource('pendidikan', 'PendidikanController');
});

//acara 15
Route::resource('pendidikan', PendidikanController::class);

//acara 17 
//create
use App\Http\Controllers\SessionController;
Route::get('/session/create', [SessionController::class, 'create']);
//show
Route::get('/session/show', [SessionController::class, 'show']);
//delete
Route::get('/session/delete', [SessionController::class, 'delete']);
//menangkap data melalui URL
use App\Http\Controllers\PegawaiController;

Route::get('/pegawai/{nama}', [PegawaiController::class, 'index']);
//menangkap data melalui inputan
Route::get('/formulir', [PegawaiController::class, 'formulir']);
Route::post('/formulir/proses', [PegawaiController::class, 'proses']);

//acara 18
Route::post('/formulir/proses', [PegawaiController::class, 'proses']);
//cobaerror
use App\Http\Controllers\CobaController;

Route::get('/cobaerror/{nama?}', [CobaController::class, 'index']);

//acara 19
use App\Http\Controllers\UploadController;

Route::get('/upload', [UploadController::class, 'upload'])->name('upload');
Route::post('/upload/proses', [UploadController::class, 'proses_upload'])->name('upload.proses');

Route::get('/upload', [UploadController::class, 'upload'])->name('upload');
Route::post('/upload/resize', [UploadController::class, 'resize_upload'])->name('upload.resize');

//acara 20
//acara 20 ke 1
Route::get('/dropzone', [UploadController::class, 'dropzone']);
Route::post('/dropzone/store', [UploadController::class, 'dropzone_store'])->name('dropzone.store');

//acara 20 ke 2
Route::get('/pdf_upload', [UploadController::class, 'pdf_upload'])->name('pdf_upload');
Route::post('/pdf_store', [UploadController::class, 'pdf_store'])->name('pdf_store');
