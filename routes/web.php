<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\PersonalsController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('register/store', [LoginRegisterController::class, 'store'])->name('auth.store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(PersonalsController::class)->group(function() {
Route::get('personals', [PersonalsController::class, 'index'])->name('personals.index');
Route::post('/store', [PersonalsController::class, 'store'])->name('personals.store');
Route::post('personals/edit/{id}', [PersonalsController::class, 'update'])->name('personals.update');
Route::post('personals/delete/{id}', [PersonalsController::class, 'destroy'])->name('personals.destroy');
});

Route::get('personals', [SearchController::class, 'index'])->name('personals.filter');


Route::controller(DepartmentController::class)->group(function() {
    Route::get('department', [DepartmentController::class, 'index'])->name('department.index');
    Route::post('department/store', [DepartmentController::class, 'store'])->name('department.store');
    Route::post('department/edit/{id}', [DepartmentController::class, 'update'])->name('department.update');
    Route::post('department/delete/{id}', [DepartmentController::class, 'destroy'])->name('department.destroy');
    });