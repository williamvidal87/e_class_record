<?php

use App\Livewire\AdminPanel\Course\CourseTable;
use App\Livewire\AdminPanel\ManageUser\AdminTable;
use App\Livewire\AdminPanel\ManageUser\InstructorTable;
use App\Livewire\AdminPanel\ManageUser\StudentTable;
use App\Livewire\AdminPanel\Subject\SubjectTable;
use App\Livewire\Dashboard\Dashboard;
use App\Livewire\InstructorPanel\InstructorDashboard\InstructorDashboard;
use App\Livewire\Profile\EditPassword;
use App\Livewire\Profile\EditProfile;
use App\Livewire\StudentPanel\StudentDashboard\StudentDashboard;
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
    
    Route::get('/edit-profile', EditProfile::class)->name('edit-profile');
    Route::get('/edit-password', EditPassword::class)->name('edit-password');
    
    // admin panel
    Route::get('/dashboard', Dashboard::class)->name('dashboard')->middleware('checkadmin');
    Route::get('/admin-table', AdminTable::class)->name('admin-table')->middleware('checkadmin');
    Route::get('/instructor-table', InstructorTable::class)->name('instructor-table')->middleware('checkadmin');
    Route::get('/student-table', StudentTable::class)->name('student-table')->middleware('checkadmin');
    Route::get('/course-table', CourseTable::class)->name('course-table')->middleware('checkadmin');
    Route::get('/subject-table', SubjectTable::class)->name('subject-table')->middleware('checkadmin');
    
    // instructor panel
    Route::get('/instructor-dashboard', InstructorDashboard::class)->name('instructor-dashboard')->middleware('checkinstructor');
    
    // student panel
    Route::get('/student-dashboard', StudentDashboard::class)->name('student-dashboard')->middleware('checkstudent');
    
});
