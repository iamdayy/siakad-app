<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Menu;

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

Route::get('/', function () {
    if (Auth::check()) {
        $menus = Menu::all();
        return view('menu', ['menus' => $menus]);
    }
    return redirect(route('login'));
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::name('master.')->prefix('master')->group(function () {
       Route::get('/', function () {
        return view('dashboard');
       })->name('dashboard');
    });
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
