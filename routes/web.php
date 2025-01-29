<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController;

// mainpage
Route::get("/school/dashboard", [DashboardController::class, "show"])->name("school.dashboard");

// teachers
Route::get("teacher/create", [TeacherController::class, "create"])->name("teacher.create");
Route::get("teacher/index", [TeacherController::class, "index"])->name("teacher.index");

// students
Route::get("student/create", [StudentController::class, "create"])->name("student.create");
Route::get("student/index", [StudentController::class, "index"])->name("student.index");

// payments
Route::get("payments/dashboard", [PaymentController::class, "dashboard"])->name("payment.dashboard");
Route::get("payments/create", [PaymentController::class, "create"])->name("payment.create");
Route::get("payments/show", [PaymentController::class, "show"])->name("payment.show");
Route::get("payments/edit", [PaymentController::class, "edit"])->name("payment.edit");
Route::get("payments/index", [PaymentController::class, "index"])->name("payment.index");

// Profile-User
Route::get("profile/user", [ProfileController::class, "user"])->name("profile.user");