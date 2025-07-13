<?php

namespace App\Http\Controllers;

use App\Models\Book; // Import model Book
use Illuminate\Http\Request; // Import Request

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     * Menampilkan daftar semua buku.
     */
    public function index()
    {
        $books = Book::all(); // Mengambil semua data buku dari database
        return view('books.index', compact('books')); // Mengirim data ke view 'books.index'
    }

    /**
     * Show the form for creating a new resource.
     * Menampilkan form untuk menambah buku baru.
     */
    public function create()
    {
        return view('books.create'); // Menampilkan view 'books.create'
    }

    /**
     * Store a newly created resource in storage.
     * Menyimpan data buku baru yang dikirim dari form.
     */
    public function store(Request $request)
    {
        // Validasi data yang masuk dari form
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            // Validasi tahun: harus angka, minimal 1000, maksimal tahun sekarang
            'year_published' => 'required|integer|min:1000|max:' . date('Y'),
            // 'available' akan menjadi 0 atau 1 dari checkbox. 'boolean' cukup untuk validasi.
            'available' => 'boolean',
        ]);

        // Membuat record buku baru di database menggunakan data dari request
        Book::create($request->all());

        // Redirect kembali ke halaman daftar buku dengan pesan sukses
        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    /**
     * Display the specified resource. (Opsional untuk CRUD sederhana)
     * Menampilkan detail satu buku (jika diperlukan halaman detail terpisah).
     */
    public function show(Book $book)
    {
        // Untuk proyek ini, kita mungkin tidak perlu halaman show terpisah
        // data buku sudah terlihat di index dan edit.
        // return view('books.show', compact('book'));
        // Jika tidak digunakan, Anda bisa menghapusnya atau membiarkannya.
        // Untuk saat ini, kita akan mengabaikan show dan fokus pada index, create, edit.
        return redirect()->route('books.index'); // Atau bisa redirect saja
    }

    /**
     * Show the form for editing the specified resource.
     * Menampilkan form untuk mengedit buku tertentu.
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book')); // Mengirim data buku ke view 'books.edit'
    }

    /**
     * Update the specified resource in storage.
     * Memperbarui data buku di database.
     */
    public function update(Request $request, Book $book)
    {
        // Validasi data yang masuk dari form
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'year_published' => 'required|integer|min:1000|max:' . date('Y'),
            'available' => 'boolean',
        ]);

        // Memperbarui record buku di database
        $book->update($request->all());

        // Redirect kembali ke halaman daftar buku dengan pesan sukses
        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     * Menghapus data buku dari database.
     */
    public function destroy(Book $book)
    {
        $book->delete(); // Menghapus record buku dari database

        // Redirect kembali ke halaman daftar buku dengan pesan sukses
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus!');
    }
}