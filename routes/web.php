<?php

use App\Livewire\AdminPanel\ManageUser\AdminTable;
use App\Livewire\Dashboard\Dashboard;
use App\Livewire\Profile\EditPassword;
use App\Livewire\Profile\EditProfile;
use Illuminate\Support\Facades\Route;

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
    // return view('welcome');
    return redirect()->route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/edit-profile', EditProfile::class)->name('edit-profile');
    Route::get('/edit-password', EditPassword::class)->name('edit-password');
    Route::get('/admin-table', AdminTable::class)->name('admin-table')->middleware('checkadmin');
    
});
