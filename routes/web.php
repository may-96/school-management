<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController;

// landing page
Route::get('/', function () {
    return view('welcome');
    });

// auth
Route::get("auth/forget", [AuthController::class, "forget"])->name("auth.forget");
Route::get("auth/login", [AuthController::class, "login"])->name("auth.login");
Route::get("auth/register", [AuthController::class, "register"])->name("auth.register");
Route::get("auth/reset", [AuthController::class, "reset"])->name("auth.reset");

// mainpage
Route::get("dashboard", [DashboardController::class, "show"])->name("school.dashboard");

// teachers
Route::get("teacher/create", [TeacherController::class, "create"])->name("teacher.create");
Route::get("teacher/index", [TeacherController::class, "index"])->name("teacher.index");

// students
Route::get("student/create", [StudentController::class, "create"])->name("student.create");
Route::get("student/index", [StudentController::class, "index"])->name("student.index");
Route::get("student/profile", [StudentController::class, "show"])->name("student.profile");

// payments
Route::get("payments/dashboard", [PaymentController::class, "dashboard"])->name("payment.dashboard");
Route::get("payments/create", [PaymentController::class, "create"])->name("payment.create");
Route::get("payments/show", [PaymentController::class, "show"])->name("payment.show");
Route::get("payments/edit", [PaymentController::class, "edit"])->name("payment.edit");
Route::get("payments/index", [PaymentController::class, "index"])->name("payment.index");

// Profile-User
Route::get("profile/user", [ProfileController::class, "user"])->name("profile.user");

