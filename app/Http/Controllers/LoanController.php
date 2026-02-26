<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;
use App\Models\Book;

class LoanController extends Controller
{

    public function index()
    {
        //● GET /api/loans – Listázza az aktív és lezárt kölcsönzéseket.
        $loans = Loan::with('book')->get();
        return response()->json($loans);
    }
    public function store(Request $request)
    {
        //POST /api/loans – Új kölcsönzés rögzítése (csak ha van elérhető példány).
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'borrower_name' => 'required|string|max:255',
        ]);
        $book = Book::findorfail($validated['book_id']);
        if ($book->available_copies < 1) {
            return response()->json(['message' => 'Nincs elérhető példány'], 400);
        }
        $loan = Loan::create($validated);
        $book->decrement('available_copies');
        return response()->json($loan, 201);
    }
    public function update($id)
    {
        //● POST /api/loans – Új kölcsönzés rögzítése (csak ha van elérhető példány).
        $loan = Loan::findorfail($id);
        if ($loan->returned_at !== null) {
            return response()->json(['message' => 'Ez a kölcsönzés már vissza lett adva'], 400);
        }
        $loan->update(['returned_at' => now()]);
        $loan->book->increment('available_copies');
        return response()->json(['message' => 'Könyv sikeresen visszavéve'],200);
    }
}
