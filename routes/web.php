
<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TrainerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {

    Route::get('/register', [AuthController::class, 'showRegister']);

    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {

    Route::get('/create', function () {
        return view('Create');
    });

    // Exportar a PDF
    Route::get('/trainers-pdf', [TrainerController::class, 'pdf'])
        ->name('trainers.pdf');

    // Exportar a Excel
    Route::get('/trainers-excel', [TrainerController::class, 'excel'])
        ->name('trainers.excel');

    // CRUD de entrenadores
    Route::resource('trainers', TrainerController::class);

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});
