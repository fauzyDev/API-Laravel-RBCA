<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Get all books
    public function index()
    {
        $books = Book::all();

        return response()->json([
            'status' => 200,
            'message' => 'Books retrieved successfully',
            'data' => $books
        ], 200);
    }

    // Create a new book
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
            'deskripsi' => 'nullable|string'
        ]);

        $book = Book::create($validated);

        return response()->json([
            'status' => 201,
            'message' => 'Book created successfully',
            'data' => $book
        ], 201);
    }

    // Update a book
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'judul' => 'sometimes|required|string|max:255',
            'penulis' => 'sometimes|required|string|max:255',
            'tahun_terbit' => 'sometimes|required|integer',
            'deskripsi' => 'nullable|string'
        ]);

        $book->update($validated);

        return response()->json([
            'status' => 200,
            'message' => 'Book updated successfully',
            'data' => $book
        ], 200);
    }

    // Delete a book
    public function destroy(Book $book)
    {
        $book->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Book deleted successfully'
        ], 200);
    }
}
