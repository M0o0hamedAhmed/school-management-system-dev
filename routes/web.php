<?php

use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\DropZoneController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require __DIR__ . '/auth.php';

Route::group(['prefix' => LaravelLocalization::SetLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'auth', 'verified']], function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('Grades', GradeController::class);

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::post('/logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');

        Route::resource('dropzone', DropZoneController::class);
        Route::post('dropzone/media', [DropZoneController::class, 'storeMedia'])->name('dropzone.storeMedia');
        Route::resource('album', AlbumController::class);


    });
}
);





//    Route::get('Grades', [GradeController::class, 'index'])->name('Grades');
