public function boot()
{
    Route::pattern('slug', '[a-z0-9-]+'); // Hanya menerima huruf kecil, angka, dan dash
}