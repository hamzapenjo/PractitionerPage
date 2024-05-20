<?php

use Illuminate\Support\Facades\Route;
use App\Http\Requests\AdminClientStore;
use App\Http\Requests\AdminFieldsStore;
use App\Http\Requests\AdminPracticeStore;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminClientsController;
use App\Http\Controllers\Admin\AdminPracticesController;
use App\Http\Controllers\Practitioner\PracticeController;
use App\Http\Controllers\Practitioner\PostClientController;
use App\Http\Controllers\Admin\AdminPractitionersController;
use App\Http\Controllers\Admin\AdminFieldsOfPracticeController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Client\DashboardController as ClientDashboardController;
use App\Http\Controllers\Practitioner\DashboardController as PractitionerDashboardController;
use App\Http\Controllers\Practitioner\PractitionerClientController as PractitionerClientController;

Route::get('/', function () {
    return view('welcome');
});



Route::prefix('practitioners')->middleware(['auth', 'practitioner'])->group(function () {
    Route::get('/dashboard', [PractitionerDashboardController::class, 'index'])->name('practitioner-dashboard');
    Route::get('/clients', [PractitionerClientController::class, 'showClients'])->name('practitioner-clients');
    Route::get('/clients/add-client', [PractitionerClientController::class, 'addClientPractitioner'])->name('add-client-practitioner')->middleware(['auth', 'practitioner']);
    Route::post('/clients/store-client', [PractitionerClientController::class, 'storeClient'])->name('store-client')->middleware(['auth', 'practitioner']);
    Route::get('/clients/{id}/edit-client', [PractitionerClientController::class, 'editClientPractitioner'])->name('edit-client-practitioner')->middleware(['auth', 'practitioner']);
    Route::put('/clients/{id}/update-client', [PractitionerClientController::class, 'storeEdit'])->name('store-edit')->middleware(['auth', 'practitioner']);
    Route::delete('/clients/{id}/delete-client', [PractitionerClientController::class, 'deleteClient'])->name('delete-client')->middleware(['auth', 'practitioner']);
    Route::get('/practices', [PracticeController::class, 'showPractice'])->name('practice')->middleware('auth', 'practitioner');
    Route::get('/practices/add-field', [PractitionerClientController::class, 'addField'])->name('add-field')->middleware(['auth', 'practitioner']);
    Route::post('/practices/store-field', [PractitionerClientController::class, 'storeField'])->name('store-field')->middleware(['auth', 'practitioner']);
    Route::get('/clients/{id}', [PractitionerClientController::class, 'showSingleClient'])->name('client-show')->middleware(['auth', 'practitioner']);
});
Route::get('/client-dashboard', [ClientDashboardController::class, 'index'])->name('client-dashboard')->middleware(['auth', 'client']);

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin-dashboard');
    
    Route::get('/practices', [AdminPracticesController::class, 'showPractice'])->name('admin-practice')->middleware('auth', 'admin');
    Route::get('practices/add-practice', [AdminPracticesController::class, 'addPractices'])->name('add-practice')->middleware('auth', 'admin');
    Route::post('practices/store-practice', [AdminPracticesController::class, 'storePractices'])->name('store-practice')->middleware('auth', 'admin');
    Route::get('/practices/show-practice/{id}', [AdminPracticesController::class, 'showSinglePractice'])->name('show-practice')->middleware('auth', 'admin');
    Route::get('/practices/{id}/edit-practice', [AdminPracticesController::class, 'editPractice'])->name('edit-practice')->middleware(['auth', 'admin']);
    Route::put('/practices/{id}/update-practice', [AdminPracticesController::class, 'storeEdit'])->name('store-edit')->middleware(['auth', 'admin']);
    Route::delete('/practices/{id}/delete-practice', [AdminPracticesController::class, 'deletePractice'])->name('delete-practice')->middleware(['auth', 'admin']);

    Route::get('/fields', [AdminFieldsOfPracticeController::class, 'showFieldsOfPractice'])->name('admin-fields')->middleware('auth', 'admin');
    Route::get('fields/add-fields', [AdminFieldsOfPracticeController::class, 'addFieldsOfPractice'])->name('add-fields')->middleware('auth', 'admin');
    Route::post('fields/store-fields', [AdminFieldsOfPracticeController::class, 'storeFieldsOfPractice'])->name('store-fields')->middleware('auth', 'admin');
    Route::get('/fields/show-field/{id}', [AdminFieldsOfPracticeController::class, 'showSingleFieldOfPractice'])->name('show-field')->middleware('auth', 'admin');
    Route::get('/fields/{id}/edit-field', [AdminFieldsOfPracticeController::class, 'editField'])->name('edit-field')->middleware(['auth', 'admin']);
    Route::put('/fields/{id}/update-field', [AdminFieldsOfPracticeController::class, 'storeEdit'])->name('store-field-edit')->middleware(['auth', 'admin']);
    Route::delete('/fields/{id}/delete-field', [AdminFieldsOfPracticeController::class, 'deleteField'])->name('delete-field')->middleware(['auth', 'admin']);
    Route::get('/practices/{id}/edit-practice/add-field', [AdminFieldsOfPracticeController::class, 'addFieldToPractice'])->name('add-field-practice')->middleware(['auth', 'admin']);
    Route::post('/practices/{id}/edit-practice/store-field', [AdminFieldsOfPracticeController::class, 'storeFieldToPractice'])->name('store-field-practice')->middleware(['auth', 'admin']);

    Route::get('/clients', [AdminClientsController::class, 'showClients'])->name('admin-clients')->middleware('auth', 'admin');
    Route::get('/clients/add-client', [AdminClientsController::class, 'addClient'])->name('add-client')->middleware('auth', 'admin');
    Route::post('/clients/store-client', [AdminClientsController::class, 'storeClient'])->name('store-client')->middleware('auth', 'admin');
    Route::get('/clients/show-client/{id}', [AdminClientsController::class, 'showSingleClient'])->name('show-client')->middleware('auth', 'admin');
    Route::get('/clients/{id}/edit-client', [AdminClientsController::class, 'editClient'])->name('edit-client')->middleware(['auth', 'admin']);
    Route::put('/clients/{id}/update-client', [AdminClientsController::class, 'storeEditClient'])->name('store-edit-client')->middleware(['auth', 'admin']);
    Route::delete('/clients/{id}/delete-client', [AdminClientsController::class, 'deleteClient'])->name('delete-client')->middleware(['auth', 'admin']);

    Route::get('/practitioners', [AdminPractitionersController::class, 'showPractitioners'])->name('admin-practitioners')->middleware('auth', 'admin');
    Route::get('/practitioners/add-practitioner', [AdminPractitionersController::class, 'addPractitioner'])->name('add-practitioner')->middleware('auth', 'admin');
    Route::post('/practitioners/store-practitioner', [AdminPractitionersController::class, 'storePractitioner'])->name('store-practitioner')->middleware('auth', 'admin');
    Route::get('/practitioners/show-practitioner/{id}', [AdminPractitionersController::class, 'showSinglePractitioner'])->name('show-practitioner')->middleware('auth', 'admin');
    Route::get('/practitioners/{id}/edit-practitioner', [AdminPractitionersController::class, 'editPractitioner'])->name('edit-practitioner')->middleware(['auth', 'admin']);
    Route::put('/practitioners/{id}/update-practitioner', [AdminPractitionersController::class, 'storeEditPractitioner'])->name('store-edit-practitioner')->middleware(['auth', 'admin']);
    Route::delete('/practitioners/{id}/delete-practitioner', [AdminPractitionersController::class, 'deletePractitioner'])->name('delete-practitioner')->middleware(['auth', 'admin']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
