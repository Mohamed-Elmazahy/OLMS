<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BorrowedBook;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function dashboard()
    {
        $student = Auth::user();
        $borrowedBooks = $student->borrowedBooks()->paginate(5);
    
        return view('student.std_dashboard', compact('borrowedBooks'));
    }

    public function books()
    {
        $books = Book::paginate(10); // Paginate books
        return view('student.std_books', compact('books'));
    }

    public function borrowBook(Request $request, Book $book)
    {
        $student = Auth::user();

        if ($book->quantity > 0) {
            BorrowedBook::create([
                'user_id' => $student->id,
                'book_id' => $book->id,
                'borrowed_date' => now(),
            ]);

            $book->decrement('quantity');

            return redirect()->route('student.books')->with('success', 'Book borrowed successfully.');
        }

        return redirect()->route('student.books')->with('error', 'Book is not available.');
    }


    public function returnBook(Request $request, Book $book)
    {
        $student = Auth::user();
    
        $borrowedBook = BorrowedBook::where('user_id', $student->id)
            ->where('book_id', $book->id)
            ->whereNull('return_date')
            ->first();
    
        if ($borrowedBook) {
            $borrowedBook->update(['return_date' => now()]); 
            $book->increment('quantity'); 
    
            return redirect()->route('student.dashboard')->with('success', 'Book returned successfully.');
        }
    
        return redirect()->route('student.dashboard')->with('error', 'Book return failed.');
    }

    public function profile()
    {
        $student = Auth::user();
        return view('student.std_profile', compact('student'));
    }

    public function updateProfile(Request $request)
    {
        $student = Auth::user();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $student->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        $student->name = $request->name;
        $student->email = $request->email;

        if ($request->filled('password')) {
            $student->password = bcrypt($request->password);
        }

        $student->save();

        return redirect()->route('student.profile')->with('success', 'Profile updated successfully.');
    }
}