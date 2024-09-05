<?php

use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LinkedInController;
use App\Http\Controllers\GitHubController;
use App\Http\Controllers\ResearchGateController;
use App\Http\Controllers\CourseraController;
use App\Http\Controllers\PersonalStatementController;
use App\Http\Controllers\StatementofPurposeController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/calculation', [CalculatorController::class, 'show'])->name('Calculation');
Route::post('/calculation', [CalculatorController::class, 'calculate'])->name('calculation');


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/linkedin', [LinkedInController::class, 'index'])->name('linkedin');
Route::get('/github', [GitHubController::class, 'index'])->name('github');
Route::get('/researchgate', [ResearchGateController::class, 'index'])->name('researchgate');
Route::get('/coursera', [CourseraController::class, 'index'])->name('coursera');
Route::get('/personal-statement', [PersonalStatementController::class, 'index'])->name('personal-statement');
Route::post('/personal-statement', [PersonalStatementController::class, 'update']);
Route::get('/statement-of-purpose', [StatementOfPurposeController::class, 'index'])->name('statement-of-purpose');
Route::post('/statement-of-purpose', [StatementOfPurposeController::class, 'update']);

// Show the user's profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');


// Show the form for editing the user's profile
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('edit-profile');

// Update the user's profile
Route::post('/profile/update', [ProfileController::class, 'update'])->name('update-profile');
//Route::post('/upload-file', [ProfileController::class, 'uploadFile'])->name('upload-file');

Route::get('/coursera/{category}', [CourseraController::class, 'index'])->name('coursera.category');
Route::post('/coursera/upload-footer', [CourseraController::class, 'uploadFooter'])->name('coursera.upload-footer');
//Route::get('/coursera', [CourseraController::class, 'showButtons'])->name('coursera.showButtons');
Route::get('/coursera/{category}', [CourseraController::class, 'showCategory'])->name('coursera.category');


Route::get('/coursera/category/{category}', [CourseraController::class, 'showCategory'])->name('coursera.category');

Route::get('/coursera/category/{category}/upload', [CourseraController::class, 'showUploadForm'])->name('coursera.uploadForm');
Route::get('/uploadPDF', [CourseraController::class, 'uploadBlade'])->name('uploadPDF');

//Route::post('/coursera/category/{category}/upload', [CourseraController::class, 'uploadFile'])->name('coursera.uploadFile');
Route::get('/buttons', [CourseraController::class, 'showButtons'])->name('coursera.showButtons');
Route::get('/category/{category}', [CourseraController::class, 'showCategory'])->name('coursera.category');
Route::get('/upload/{category}', [CourseraController::class, 'showUploadForm'])->name('coursera.uploadForm');
//Route::post('/upload/{category}', [CourseraController::class, 'uploadFile'])->name('coursera.uploadFile');
Route::get('/coursera/{category}/upload', [CourseraController::class, 'showUploadForm'])->name('coursera.uploadForm');
//Route::post('/coursera/{category}/upload', [CourseraController::class, 'uploadFile'])->name('coursera.uploadFile');

Route::post('/upload', [CourseraController::class, 'upload'])->name('upload');
// Route::get('/upload',[CourseraController::class, 'upload'])->name('upload');

Route::get('/form', [CourseraController::class, 'uploadForm'])->name('form');
Route::get('/Cyber', [CourseraController::class, 'CS'])->name('CS');
Route::get('/General', [CourseraController::class, 'General'])->name('General');