<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Admin Routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/books', [AdminController::class, 'books'])->name('admin.books');
    Route::get('/admin/books/create', [AdminController::class, 'createBook'])->name('admin.books.create');
    Route::post('/admin/books', [AdminController::class, 'storeBook'])->name('admin.books.store');
    Route::get('/admin/books/{book}/edit', [AdminController::class, 'editBook'])->name('admin.books.edit');
    Route::put('/admin/books/{book}', [AdminController::class, 'updateBook'])->name('admin.books.update');
    Route::delete('/admin/books/{book}', [AdminController::class, 'destroyBook'])->name('admin.books.destroy');
    Route::get('/admin/students', [AdminController::class, 'students'])->name('admin.students');
    Route::get('/admin/students/{student}', [AdminController::class, 'showStudent'])->name('admin.students.show');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::put('/admin/profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
    Route::get('/admin/borrowed-books', [AdminController::class, 'borrowedBooks'])->name('admin.borrowedBooks');
    Route::get('/admin/search/student', [AdminController::class, 'searchStudent'])->name('admin.search.student');
});


// Student Routes
Route::middleware(['auth', 'student'])->group(function () {
    Route::get('/student/std_dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::get('/student/std_books', [StudentController::class, 'books'])->name('student.books');
    Route::post('/student/std_books/{book}/borrow', [StudentController::class, 'borrowBook'])->name('student.books.borrow');
    Route::post('/student/std_books/{book}/return', [StudentController::class, 'returnBook'])->name('student.books.return');
    Route::get('/student/std_profile', [StudentController::class, 'profile'])->name('student.profile');
    Route::put('/student/std_profile', [StudentController::class, 'updateProfile'])->name('student.profile.update');
    Route::post('/student/books/{book}/return', [StudentController::class, 'returnBook'])->name('student.books.return');
});

// Home Route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');