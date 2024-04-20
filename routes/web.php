<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Practitioner\PracticeController;
use App\Http\Controllers\Client\DashboardController as ClientDashboardController;
use App\Http\Controllers\Practitioner\DashboardController as PractitionerDashboardController;
use App\Http\Controllers\Practitioner\PractitionerClientController as PractitionerClientController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::prefix('practitioners')->middleware(['auth', 'practitioner'])->group(function () {
    Route::get('/dashboard', [PractitionerDashboardController::class, 'index'])->name('practitioner-dashboard');
    Route::get('/clients', [PractitionerClientController::class, 'showClients'])->name('practitioner-clients');
    Route::get('/clients/{id}', [PractitionerClientController::class, 'showSingleClient'])->name('client-show')->middleware(['auth', 'practitioner']);
    Route::get('/practices', [PracticeController::class, 'showPractice'])->name('practice')->middleware('auth', 'practitioner');
});
Route::get('/client-dashboard', [ClientDashboardController::class, 'index'])->name('client-dashboard')->middleware(['auth', 'client']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
