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
use App\Http\Controllers\StatementOfPurposeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CategoryController;
// ------------------------
// Authentication Routes
// ------------------------
Route::get('/', function () {
    return view('auth.register');
})->name('register');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ------------------------
// Calculator Routes
// ------------------------
Route::get('/calculation', [CalculatorController::class, 'show'])->name('Calculation');
Route::post('/calculation', [CalculatorController::class, 'calculate'])->name('calculation');


// ------------------------
// Home & Social Media Links
// ------------------------
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/linkedin', [LinkedInController::class, 'index'])->name('linkedin');
Route::get('/github', [GitHubController::class, 'index'])->name('github');
Route::get('/researchgate', [ResearchGateController::class, 'index'])->name('researchgate');


// ------------------------
// Profile Management Routes
// ------------------------
Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::post('/profile/upload', [ProfileController::class, 'uploadFile'])->name('profile.upload');


// ------------------------
// Resume Routes
// ------------------------
Route::get('/resume', [ResumeController::class, 'index'])->name('resume');
Route::post('/resume/upload', [ResumeController::class, 'upload'])->name('resume.upload');


// ------------------------
// Personal Statement Routes
// ------------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/personal-statement', [PersonalStatementController::class, 'index'])->name('personal-statement.index');
    Route::get('/personal-statement/create', [PersonalStatementController::class, 'create'])->name('personal-statement.create');
    Route::post('/personal-statement/store', [PersonalStatementController::class, 'store'])->name('personal-statement.store');
    Route::get('/personal-statement/{id}/edit', [PersonalStatementController::class, 'edit'])->name('personal-statement.edit');
    Route::post('/personal-statement/{id}/update', [PersonalStatementController::class, 'update'])->name('personal-statement.update');
    Route::delete('/personal-statement/{id}', [PersonalStatementController::class, 'destroy'])->name('personal-statement.destroy');
    Route::get('/personal-statement/{categoryId}/edit', [PersonalStatementController::class, 'edit'])->name('personal-statement.edit');

    Route::resource('personal-statement', PersonalStatementController::class);
    // Category-specific routes
    Route::post('/personal-statement/create-category', [PersonalStatementController::class, 'createCategory'])->name('personal-statement.createCategory');
    Route::get('/personal-statement/{categoryId}', [PersonalStatementController::class, 'show'])->name('personal-statement.show');
});


// ------------------------
// Statement of Purpose Routes (Protected with Middleware)
// ------------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/statement-of-purpose', [StatementOfPurposeController::class, 'index'])->name('statement-of-purpose.index');
    Route::get('/Statement-of-purpose', [StatementOfPurposeController::class, 'index'])->name('statement-of-purpose');
    Route::get('/statement-of-purpose/create', [StatementOfPurposeController::class, 'create'])->name('statement-of-purpose.create');
    Route::post('/statement-of-purpose/store', [StatementOfPurposeController::class, 'store'])->name('statement-of-purpose.store');
    Route::get('/statement-of-purpose/{id}/edit', [StatementOfPurposeController::class, 'edit'])->name('statement-of-purpose.edit');
    Route::post('/statement-of-purpose/{id}/update', [StatementOfPurposeController::class, 'update'])->name('statement-of-purpose.update');
    Route::delete('/statement-of-purpose/{id}', [StatementOfPurposeController::class, 'destroy'])->name('statement-of-purpose.destroy');
});


// ------------------------
// Coursera Routes
// ------------------------
Route::get('/coursera', [CourseraController::class, 'index'])->name('coursera');
Route::get('/coursera/{category}', [CourseraController::class, 'showCategory'])->name('coursera.category');
Route::post('/coursera/upload-footer', [CourseraController::class, 'uploadFooter'])->name('coursera.upload-footer');

Route::get('/coursera/category/{category}/upload', [CourseraController::class, 'showUploadForm'])->name('coursera.uploadForm');
Route::get('/uploadPDF', [CourseraController::class, 'uploadBlade'])->name('uploadPDF');

Route::get('/buttons', [CourseraController::class, 'showButtons'])->name('coursera.showButtons');
Route::get('/upload/{category}', [CourseraController::class, 'showUploadForm'])->name('coursera.uploadForm');
Route::post('/upload', [CourseraController::class, 'upload'])->name('upload');

Route::get('/form1', [CourseraController::class, 'uploadForm'])->name('form');

Route::get('/form', [CourseraController::class, 'uploadForm'])->name('CS');
Route::get('/Cyber1', [CourseraController::class, 'uploadForm'])->name('coursera.ai');
Route::get('/Cyber', [CourseraController::class, 'CS'])->name('coursera.cs');
Route::get('/General', [CourseraController::class, 'General'])->name('coursera.general'); 
Route::get('/General1', [CourseraController::class, 'General'])->name('General'); 
Route::get('/coursera/category/{category}', [CourseraController::class, 'showCategory'])->name('coursera.category');
 //There is an issue the uploaded image is visible on both coursera and recommendations
 


 //Image upload
 Route::post('/upload/{category}', [ImageController::class, 'upload'])->name('coursera.upload');
Route::get('/upload2', [ImageController::class, 'uploadForm'])->name('upload.form');
Route::post('/upload3', [ImageController::class, 'uploadImage'])->name('image.upload');

Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');

Route::get('/category/{id}', [CourseraController::class, 'showCategory'])->name('coursera.showCategory');



Route::get('/upload-form', [CourseraController::class, 'uploadform'])->name('coursera.uploadform');
Route::post('/upload', [CourseraController::class, 'upload'])->name('upload');
Route::get('/categories', [CourseraController::class, 'showButtons'])->name('coursera.showButtons');
Route::get('/category/{id}', [CourseraController::class, 'showCategory'])->name('coursera.showCategory');
