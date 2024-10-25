<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskPDFController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TaskExcelController;
use App\Http\Controllers\TaskImportController;

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

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('home');
    });

    Route::get('/home', function () {
        return view('home');
    });

    // Route untuk form edit profile
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    // Route untuk update profile
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/tasks/export/pdf', [TaskPDFController::class, 'export'])->name('tasks.pdf');
    Route::get('/tasks/export/excel', [TaskExcelController::class, 'export'])->name('tasks.excel');

    Route::get('/tasks/import', [TaskImportController::class, 'index'])->name('import.index');
    Route::post('/tasks/import', [TaskImportController::class, 'import'])->name('tasks.import');

    Route::post('logout', LogoutController::class)->name('logout');

    Route::resource('tasks', TaskController::class);
});



Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('register', [RegisterController::class, 'store']);
