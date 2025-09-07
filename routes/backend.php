<?php
use App\Http\Controllers\DynamicPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', function () {
        return view('backend.profile.edit', [
            'user' => Auth::user(),  // Pass the logged-in user
        ]);
    })->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Dynamic Pages
Route::get('/index', [DynamicPageController::class, 'index'])->name('dynamic.index');
Route::get('/create', [DynamicPageController::class, 'create'])->name('dynamic.create');
Route::post('/store', [DynamicPageController::class, 'store'])->name('dynamic.store');
Route::get('/show', [DynamicPageController::class, 'show'])->name('dynamic.show');
Route::get('/edit', [DynamicPageController::class, 'edit'])->name('dynamic.edit');
Route::get('/destroy', [DynamicPageController::class, 'destroy'])->name('dynamic.destroy');
Route::get('/update', [DynamicPageController::class, 'destroy'])->name('dynamic.update');




