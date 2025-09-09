<?php
use App\Http\Controllers\DynamicPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;


// Dashboard - only authenticated users
Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', function () {
        return view('backend.profile.edit', [
            'user' => Auth::user(),
        ]);
    })->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Dynamic Pages - only Admin
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/index', [DynamicPageController::class, 'index'])->name('dynamic.index');
    Route::get('/create', [DynamicPageController::class, 'create'])->name('dynamic.create');
    Route::post('/store', [DynamicPageController::class, 'store'])->name('dynamic.store');
    Route::get('/show', [DynamicPageController::class, 'show'])->name('dynamic.show');
    Route::get('/edit', [DynamicPageController::class, 'edit'])->name('dynamic.edit');
    Route::get('/destroy', [DynamicPageController::class, 'destroy'])->name('dynamic.destroy');
    Route::get('/update', [DynamicPageController::class, 'destroy'])->name('dynamic.update');
});

// Mail Settings - only Admin
Route::prefix('settings')->middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/mail', [SettingsController::class, 'mailSettings'])->name('settings.mail');
    Route::post('/mail', [SettingsController::class, 'mailstore'])->name('settings.mail.update');
});

// User Profile and Management - only Admin
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/users/index', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});




