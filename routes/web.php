<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengaduanController; 
use App\Http\Controllers\AdminController;  

Route::get('/', function () {
    if (auth()->check()) {
        return auth()->user()->role === 'admin'
            ? redirect('/admin')
            : redirect('/siswa');
    }

    return redirect('/login');
});

/*
|--------------------------------------------------------------------------
| DASHBOARD SISWA
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    Route::get('/siswa', [PengaduanController::class, 'index'])
        ->name('siswa.dashboard');

    Route::post('/siswa/store', [PengaduanController::class, 'store'])
        ->name('siswa.store');
        
    Route::get('/siswa/{pengaduan}', [PengaduanController::class, 'show'])
         ->name('siswa.show');

    Route::get('/siswa/{pengaduan}/edit', [PengaduanController::class, 'edit'])
        ->name('siswa.edit');

    Route::put('/siswa/{pengaduan}', [PengaduanController::class, 'update'])
        ->name('siswa.update');

    Route::delete('/siswa/{pengaduan}', [PengaduanController::class, 'destroy'])
        ->name('siswa.destroy');
});


/*
|--------------------------------------------------------------------------
| DASHBOARD ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth','role:admin'])->get('/admin', function () {
    return view('admin.dashboard');
});

/*
|--------------------------------------------------------------------------
| PROFILE (default breeze, boleh tetap)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {

    Route::get('/', [AdminController::class, 'index'])
        ->name('admin.dashboard');

    Route::get('/{pengaduan}', [AdminController::class, 'show'])
        ->name('admin.show');

    Route::post('/{pengaduan}/jawab', [AdminController::class, 'jawab'])
        ->name('admin.jawab');

    Route::delete('/{pengaduan}/hapus-jawaban', [AdminController::class, 'hapusJawaban'])
        ->name('admin.hapusJawaban');
});

require __DIR__.'/auth.php';
