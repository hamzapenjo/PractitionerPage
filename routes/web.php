<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Practitioner\PracticeController;
use App\Http\Controllers\Practitioner\PostClientController;
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
    Route::get('/clients/add-client', [PractitionerClientController::class, 'addClient'])->name('add-client')->middleware(['auth', 'practitioner']);
    Route::post('/clients/store-client', [PractitionerClientController::class, 'storeClient'])->name('store-client')->middleware(['auth', 'practitioner']);
    Route::get('/clients/{id}/edit-client', [PractitionerClientController::class, 'editClient'])->name('edit-client')->middleware(['auth', 'practitioner']);
    Route::put('/clients/{id}/update-client', [PractitionerClientController::class, 'storeEdit'])->name('store-edit')->middleware(['auth', 'practitioner']);
    Route::delete('/clients/{id}/delete-client', [PractitionerClientController::class, 'deleteClient'])->name('delete-client')->middleware(['auth', 'practitioner']);
    Route::get('/practices', [PracticeController::class, 'showPractice'])->name('practice')->middleware('auth', 'practitioner');
    Route::get('/practices/add-field', [PractitionerClientController::class, 'addField'])->name('add-field')->middleware(['auth', 'practitioner']);
    Route::post('/practices/store-field', [PractitionerClientController::class, 'storeField'])->name('store-field')->middleware(['auth', 'practitioner']);
    Route::get('/clients/{id}', [PractitionerClientController::class, 'showSingleClient'])->name('client-show')->middleware(['auth', 'practitioner']);
});
Route::get('/client-dashboard', [ClientDashboardController::class, 'index'])->name('client-dashboard')->middleware(['auth', 'client']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
