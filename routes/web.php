<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $events = App\Models\Event::all();
    $user = Auth::user();
    return view('index', [
        'events' => $events,
        'user' => $user,
    ]);
})->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/events', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::delete('events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
});

Route::get('/admin', function () {
    $events = App\Models\Event::all();
    $users = App\Models\User::all();
    return view('admin.index', [
        'events' => $events,
        'users' => $users,
    ]);
})->middleware('auth', \App\Http\Middleware\Admin::class)->name('admin.index');

require __DIR__.'/auth.php';
