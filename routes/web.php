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
    Route::post('/students/vouchers', [VoucherController::class, 'store'])->name('students.vouchers.store');


    // Payments
    // Route::post('/students/{student}/payments', [PaymentController::class, 'store'])->name('students.payments.store');
    Route::get('payments/create', [PaymentController::class, 'create'])->name('payment.create');
    Route::get('payments/edit', [PaymentController::class, 'edit'])->name('payment.edit');
    Route::get('payments/show', [PaymentController::class, 'show'])->name('payment.show');
    Route::get('payments/list', [PaymentController::class, 'list'])->name('payment.list');
    Route::get('payments/voucher', [PaymentController::class, 'allvouchers'])->name('payment.voucher');

    // Admin / Social Profile - User (ProfileController)
    Route::get('admin/user', [ProfileController::class, 'user'])->name('admin.user');
    Route::get('admin/users', [ProfileController::class, 'profile'])->name('admin.users');
    Route::post('admin/users/update-profile', [ProfileController::class, 'updateProfile'])->name('admin.users.update-profile');
    Route::post('admin/users/update-password', [ProfileController::class, 'updatePassword'])->name('admin.users.update-password');

    // Admin User Management (UserController)
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});

// Auth scaffolding
require __DIR__ . '/auth.php';
