<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
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

Route::get('/',[PdfController::class,'index']);
Route::get('/pdf-generate',[PdfController::class,'generatePDF']);
Route::get('/generate-pdf', [PdfController::class, 'Pdf']);