<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
// use App\Http\Controllers\AuthController;
// use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\PaymentController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// landing page
Route::get("/", [LandingController::class, "home"])->name("landing.home");

// Auth Routes
// Route::get("auth/forgot", [AuthController::class, "forgot"])->name("auth.forgot-password");
// Route::get("auth/login", [AuthController::class, "login"])->name("auth.login");
// Route::get("auth/register", [AuthController::class, "register"])->name("auth.register");
// Route::get("auth/reset", [AuthController::class, "reset"])->name("auth.reset-password");



// mainpage


// teachers
Route::get("teacher/create", [TeacherController::class, "create"])->name("teacher.create");
Route::get("teacher/edit", [TeacherController::class, "edit"])->name("teacher.edit");
Route::get("teacher/index", [TeacherController::class, "index"])->name("teacher.index");
Route::get("teacher/profile", [TeacherController::class, "profile"])->name("teacher.profile");

// students
Route::get("student/create", [StudentController::class, "create"])->name("student.create");
Route::get("student/edit", [StudentController::class, "edit"])->name("student.edit");
Route::get("student/index", [StudentController::class, "index"])->name("student.index");
Route::get("student/profile", [StudentController::class, "show"])->name("student.profile");

// payments
Route::get("payments/edit", [PaymentController::class, "edit"])->name("payment.edit");
Route::get("payments/show", [PaymentController::class, "show"])->name("payment.show");
Route::get("payments/list", [PaymentController::class, "list"])->name("payment.list");
Route::get("payments/voucher", [PaymentController::class, "voucher"])->name("payment.voucher");


// admin and social profile-User
Route::get("admin/user", [ProfileController::class, "user"])->name("admin.user");
Route::get("admin/users", [ProfileController::class, "profile"])->name("admin.users");


require __DIR__.'/auth.php';
