<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Guest\PhotoController as GuestPhotoController;
use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\LeadController;

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

Route::get('/', [PageController::class, 'index'])->name('welcome');

Route::resource('photos', GuestPhotoController::class)->only(['index', 'show']);

Route::get('contacts', [LeadController::class, 'create'])->name('contacts');
Route::post('contacts', [LeadController::class, 'store'])->name('contacts.store');

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('photos', PhotoController::class);

        Route::resource('categories', CategoryController::class);

        Route::resource('tags', TagController::class);

        Route::get('/mailable', function () {
            $lead = App\Models\Lead::find(1);
            return new App\Mail\NewLeadMessage($lead);
        });
    });



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
