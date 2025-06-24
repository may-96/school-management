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
use App\Http\Controllers\SchoolController;

// Public Route
Route::get('/', [LandingController::class, 'home'])->name('landing.home');

// authenticated and verified users
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/chart-data/course-report', [DashboardController::class, 'getCourseReportChartData']);



    // Add this route for storing school settings

    Route::get('/appsetting', [SchoolController::class, 'create'])->name('appsetting');
    Route::post('/appsetting', [SchoolController::class, 'store'])->name('schools.store');


    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Teachers
    Route::resource('teacher', TeacherController::class);

    // Students
    Route::resource('student', StudentController::class);
    Route::get('/student/{id}/payments/data', [StudentController::class, 'paymentData'])->name('student.payments.data');


    // Vouchers 
    Route::get('/voucher', [VoucherController::class, 'index'])->name('voucher.index');
    Route::get('/voucher/create', [VoucherController::class, 'create'])->name('voucher.create');
    Route::post('/vouchers/store', [VoucherController::class, 'store'])->name('students.vouchers.store');
    Route::get('/vouchers/{student}', [VoucherController::class, 'show'])->name('voucher.show');
    Route::get('/voucher/{id}/edit', [VoucherController::class, 'edit'])->name('voucher.edit');
    Route::put('/voucher/{id}', [VoucherController::class, 'update'])->name('voucher.update');
    Route::delete('/voucher/{id}', [VoucherController::class, 'destroy'])->name('voucher.destroy');

    // Payments
    Route::post('/payments', [PaymentController::class, 'store'])->name('vouchers.payment.store');
    Route::put('/payments/{id}', [PaymentController::class, 'update'])->name('payment.update');
    Route::get('/payments/{id}/data', [PaymentController::class, 'getPayment']);



    Route::get('payments/index', [PaymentController::class, 'index'])->name('payment.index');
    Route::delete('/payments/{id}', [PaymentController::class, 'destroy'])->name('payment.destroy');

    Route::get('/payments/data', [PaymentController::class, 'ajaxData'])->name('payment.data');

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

require __DIR__ . '/auth.php';
