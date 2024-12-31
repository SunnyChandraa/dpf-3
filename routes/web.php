<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\language\LanguageController;
use App\Http\Controllers\pages\HomePage;
use App\Http\Controllers\pages\Page2;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Middleware\SessionUserAdminCheck;
use App\Http\Controllers\authentications\AuthController;

Route::get('/', [LoginBasic::class, 'index'])->name('main');

// Main Page Route
Route::get('/page-2', [Page2::class, 'index'])->name('pages-page-2');

// locale
Route::get('/lang/{locale}', [LanguageController::class, 'swap']);
Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');

// authentication
Route::get('/auth/login', [LoginBasic::class, 'index'])->name('auth-login-basic');

Route::post('/login', [AuthController::class, 'login'])->name('login')->middleware('throttle:5,1');;

// Admin
// Route::prefix('admin')->middleware(SessionUserAdminCheck::class)->group(function () {
//     Route::get('/dashboard', [HomePage::class, 'index'])->name('admin-dashboard');
// });

// Route Admin
Route::group(['prefix' => 'admin', 'middleware' => SessionUserAdminCheck::class], function()
{
    Route::get('/dashboard', [HomePage::class, 'index'])->name('admin-dashboard');

    // Route Master Data
    Route::prefix('master')->group(function () {

        Route::get('master-bank', function () {
            return view('content.pages.master.master-bank');
        })->name('master-bank');

        Route::get('master-cabang-dpf', function () {
            return view('content.pages.master.master-cabang-dpf');
        })->name('master-cabang-dpf');

        Route::get('master-divisi', function () {
            return view('content.pages.master.master-divisi');
        })->name('master-divisi');

        Route::get('master-posisi', function () {
            return view('content.pages.master.master-posisi');
        })->name('master-posisi');

        Route::get('master-project', function () {
            return view('content.pages.master.master-project');
        })->name('master-project');

        Route::get('master-task', function () {
            return view('content.pages.master.master-task');
        })->name('master-task');

        Route::get('master-pegawai', function () {
            return view('content.pages.master.master-pegawai');
        })->name('master-pegawai');

    });

});