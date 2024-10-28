<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TdlController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('tdl')->group(function (){
    Route::get('', [TdlController::class, 'index'])->name('tdl.index');
    Route::post('', [TdlController::class, 'store'])->name('tdl.store');
    Route::get('create', [TdlController::class, 'create'])->name('tdl.create');
    Route::get('{tdl}/edit', [TdlController::class, 'edit'])->name('tdl.edit');
    Route::put('{tdl}/update', [TdlController::class, 'update'])->name('tdl.update');
    Route::delete('{tdl}/destroy', [TdlController::class, 'destroy'])->name('tdl.destroy');

    //export pdf
    Route::get('generatepdf', [PDFController::class, 'keluarkan'])->name('tdl.pdf');
});

// Route::get('view/pdf', [TdlController::class, 'view_pdf'])->name('view.pdf');
// Route::get('download/pdf', [TdlController::class, 'download_pdf'])->name('download.pdf');
// Route::get('/generate-pdf', [PDFController::class, 'generatePDF']);

Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('register', [RegisterController::class, 'store']);

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);

//excel
Route::get('users/export/', [TdlController::class, 'export'])->name('user.excel');
Route::get('tdls/export/', [TdlController::class, 'expors'])->name('tdl.excel');

Route::post('tdlsimport', [TdlController::class, 'impors'])->name('import');


