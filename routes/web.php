<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OpenAIController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MathFirstKgController;

Route::post('/upload-students', [StudentController::class, 'upload'])->name('students.upload');



Route::get('/viewTeachers', function () {
    return view('admin.pages.teachers.manageTeachers');
})->name('viewTeachers');

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
Route::get('/showresult/{id}', [UserController::class, 'showresult'])->name('showresult');
Route::post('/createStudent', [UserController::class, 'storeStudent'])->name('student.store');
Route::delete('/students/{id}', [UserController::class, 'destroyStudent'])->name('student.destroy');
// save answers
Route::post('/saveAnswer', [MathFirstKgController::class, 'saveAnswers'])->name('save.math.first');

Route::get('/dashboard', [UserController::class, 'homeDash'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

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


Route::post('contact', [ResultController::class, 'contact'])->name('contact');

// home page


Route::get('/mathFirst', [ExamController::class, 'checkApplyMathFirst'])->name('mathFirst');
Route::get('/mathSecondAndThird', [ExamController::class, 'checkApplyMathSec'])->name('mathSecondAndThird');
Route::get('/arabicFirst', [ExamController::class, 'checkApplyArabicFirst'])->name('arabicFirst');
Route::get('/arabicSecondAndThird', [ExamController::class, 'checkApplyArabicSec'])->name('arabicSecondAndThird');
Route::get('/science', [ExamController::class, 'checkApplyScience'])->name('science');

Route::get('/', function () {
    return view('user.pages.index');
})->name('homepage');
// Route::get('/mathFirst', function () {
//     return view('user.pages.math.mathQuizFirst');
// })->name('mathFirst');
// Route::get('/mathSecondAndThird', function () {
//     return view('user.pages.math.mathQuizSecAndThird');
// })->name('mathSecondAndThird');
// Route::get('/arabicFirst', function () {
//     return view('user.pages.arabic.first');
// })->name('arabicFirst');
// Route::get('/arabicSecondAndThird', function () {
//     return view('user.pages.arabic.secondAndThird');
// })->name('arabicSecondAndThird');
// Route::get('/science', function () {
//     return view('user.pages.science.science');
// })->name('science');
Route::get('/result', function () {
    return view('user.pages.result');
})->name('result');
Route::get('/timeout', function () {
    return view('user.pages.timeout');
})->name('timeout');
// Route::get('/profile', function () {
//     return view('user.pages.profileWithExams');
// })->name('profile');

// apis
Route::get('/studentProfile', [UserController::class, 'showProfile'])->name('studentProfile');
Route::post('/saveAnswer', [MathFirstKgController::class, 'saveAnswers'])->name('save.math.first');
Route::post('/saveAnswerSec', [MathFirstKgController::class, 'saveAnswersSecMath'])->name('save.math.Sec');
Route::post('/saveAnswerAR', [MathFirstKgController::class, 'saveAnswersFirstAr'])->name('save.ar.first');
Route::post('/saveAnswerARSec', [MathFirstKgController::class, 'saveAnswersSecAr'])->name('save.ar.sec');
Route::post('/saveAnswerScience', [MathFirstKgController::class, 'saveAnswersScience'])->name('save.ar.Science');



