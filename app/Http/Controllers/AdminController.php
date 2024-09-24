<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Models\BorrowedBook;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $borrowedBooks = BorrowedBook::all();
        $books = Book::all();
        $users = User::where('role', 'student')->get();

        return view('admin.dashboard', compact('borrowedBooks', 'books', 'users'));
    }

    public function books()
    {
        $books = Book::paginate(10);

        return view('admin.books', compact('books'));
    }

    public function borrowedBooks()
    {
        $borrowedBooks = BorrowedBook::whereNull('return_date')->with('book', 'user')->paginate(5);
    
        return view('admin.borrowed_books', compact('borrowedBooks'));
    }

    public function createBook()
    {
        return view('admin.create_book');
    }

    public function storeBook(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'nullable',
            'quantity' => 'required|integer',
        ]);

        Book::create($request->all());

        return redirect()->route('admin.books')->with('success', 'Book created successfully.');
    }

    public function editBook(Book $book)
    {
        return view('admin.edit_book', compact('book'));
    }

    public function updateBook(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'nullable',
            'quantity' => 'required|integer',
        ]);

        $book->update($request->all());

        return redirect()->route('admin.books')->with('success', 'Book updated successfully.');
    }

    public function destroyBook(Book $book)
    {
        $book->delete();

        return redirect()->route('admin.books')->with('success', 'Book deleted successfully.');
    }

    public function students()
    {
        $students = User::where('role', 'student')->get();
        return view('admin.students', compact('students'));
    }

    public function showStudent(User $student)
    {
        return view('admin.show_student', compact('student'));
    }

    public function profile()
    {
        $admin = Auth::user();
        return view('admin.profile', compact('admin'));
    }

    public function updateProfile(Request $request)
    {
        $admin = Auth::user();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $admin->id,
        ]);

        $admin->update($request->all());

        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully.');
    }

public function searchStudent(Request $request)
{
    $id = $request->input('id');
    $student = User::find($id);

    if ($student) {
        return view('admin.show_student', compact('student'));
    } else {
        return redirect()->route('admin.dashboard')->with('error', 'Student not found.');
    }
}
}