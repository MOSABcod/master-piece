<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::post('/upload-students', [StudentController::class, 'upload'])->name('students.upload');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/viewTeachers', function () {
    return view('admin.pages.teachers.manageTeachers');
})->name('viewTeachers');
Route::get('/createTeacher', function () {
    return view('admin.pages.teachers.createTeacher');
})->name('createTeacher');
// teacher and student crud
Route::get('/teachers', [UserController::class, 'teacher'])->name('viewTeachers');
Route::get('/createTeacher', [UserController::class, 'create'])->name('teacher.create');
Route::post('/createTeacher', [UserController::class, 'store'])->name('teacher.store');
// Route::get('/teachers/{id}/edit', [UserController::class, 'edit'])->name('teacher.edit');
Route::put('/teachers/{id}', [UserController::class, 'update'])->name('teacher.update');
Route::delete('/teachers/{id}', [UserController::class, 'destroy'])->name('teacher.destroy');
//
Route::get('/students', [UserController::class, 'students'])->name('viewStudents');
Route::get('/createStudent', [UserController::class, 'createStudent'])->name('student.create');
Route::post('/createStudent', [UserController::class, 'storeStudent'])->name('student.store');
Route::delete('/students/{id}', [UserController::class, 'destroyStudent'])->name('student.destroy');



Route::get('/dashboard', function () {
    return view('admin.pages.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
// Fallback route for undefined URLs
Route::fallback(function () {
    abort(404); // This will trigger the 404 error page
});
