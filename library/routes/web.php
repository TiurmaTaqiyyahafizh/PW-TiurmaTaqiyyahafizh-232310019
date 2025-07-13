// routes/web.php

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController; // Penting: import BookController

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
| Tanggal saat ini: 13 Juli 2025
*/

// Route untuk halaman utama. Akan mengarahkan ke daftar buku.
Route::get('/', function () {
    return redirect()->route('books.index');
});

// Resource routes untuk BookController.
// Ini akan membuat 7 rute CRUD sekaligus: index, create, store, show, edit, update, destroy.
Route::resource('books', BookController::class);