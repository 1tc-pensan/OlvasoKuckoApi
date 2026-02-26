<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Book::all(), 200);
    }
    public function search($query)
    {
        $books=Book::where('title', 'like', "%$query%")
            ->orWhere('author', 'like', "%$query%")
            ->get();
        return response()->json($books, 200);
    }
}
