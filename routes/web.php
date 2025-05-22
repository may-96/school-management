<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VoucherController;

// Public Route
Route::get('/', [LandingController::class, 'home'])->name('landing.home');

// Routes for authenticated and verified users
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Teachers
    Route::resource('teacher', TeacherController::class);

    // Students
    Route::resource('student', StudentController::class);

    // Vouchers 
    Route::get('/voucher', [VoucherController::class, 'index'])->name('voucher.index');
    Route::get('/voucher/create/{studentId}', [VoucherController::class, 'create'])->name('voucher.create');
    Route::post('/students/{student}/vouchers/store', [VoucherController::class, 'store'])->name('students.vouchers.store');
    Route::get('/vouchers/{student}', [VoucherController::class, 'show'])->name('voucher.show');

    Route::get('/voucher/{id}/edit', [VoucherController::class, 'edit'])->name('voucher.edit');
    Route::put('/voucher/{id}', [VoucherController::class, 'update'])->name('voucher.update');
    Route::delete('/voucher/{id}', [VoucherController::class, 'destroy'])->name('voucher.destroy');


    // Payments

    Route::post('/payments', [PaymentController::class, 'store'])->name('vouchers.payment.store');

    Route::get('payments/index', [PaymentController::class, 'index'])->name('payment.index');

    Route::delete('/payments/{id}', [PaymentController::class, 'destroy'])->name('payment.destroy');


    // Admin / Social Profile - User (ProfileController)
    Route::get('admin/user', [ProfileController::class, 'user'])->name('admin.user');
    Route::get('admin/users', [ProfileController::class, 'profile'])->name('admin.users');
    Route::post('admin/users/update-profile', [ProfileController::class, 'updateProfile'])->name('admin.users.update-profile');
    Route::post('admin/users/update-password', [ProfileController::class, 'updatePassword'])->name('admin.users.update-password');

    // Admin User Management (UserController)
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
    // Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});

// Auth scaffolding
require __DIR__ . '/auth.php';
