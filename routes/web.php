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
        Route::name('user.')->prefix('user')->group(function () {
            Route::get('/users', function () {
                return view('master.user.users');
            })->name('users');
            Route::get('/level', function () {
                return view('master.user.level');
            })->name('level');
        });
        Route::name('reference.')->prefix('reference')->group(function () {
            Route::get('/class', function () {
                return view('master.reference.class');
            })->name('class');
            Route::get('/classroom', function () {
                return view('master.reference.classroom');
            })->name('classroom');
            Route::get('/collager-status', function () {
                return view('master.reference.collager-status');
            })->name('collager-status');
            Route::get('/lecturer-status', function () {
                return view('master.reference.lecturer-status');
            })->name('lecturer-status');
            Route::get('/group', function () {
                return view('master.reference.group');
            })->name('group');
            Route::get('/entrance', function () {
                return view('master.reference.entrance');
            })->name('entrance');
        });
        Route::name('setting.')->prefix('setting')->group(function () {
            Route::get('/campus-profile', function () {
                return view('master.setting.campus-profile');
            })->name('campus-profile');
            Route::get('/academic-year', function () {
                return view('master.setting.academic-year');
            })->name('academic-year');
            Route::get('/menu', function () {
                return view('master.setting.menu');
            })->name('menu');
            Route::get('/schedule-form', function () {
                return view('master.setting.schedule-form');
            })->name('schedule-form');
            Route::get('/value-component', function () {
                return view('master.setting.value-component');
            })->name('value-component');
            Route::get('/value-weight', function () {
                return view('master.setting.value-weight');
            })->name('value-weight');
            Route::get('/official', function () {
                return view('master.setting.official');
            })->name('official');
        });
        Route::get('/study-program', function () {
            return view('master.study-program');
        })->name('study-program');
        Route::get('/course', function () {
            return view('master.course');
        })->name('course');
        Route::get('/collager', function () {
            return view('master.collager');
        })->name('collager');
        Route::get('/lecturer', function () {
            return view('master.lecturer');
        })->name('lecturer');
    });
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
