<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherAssignmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\FeeTypeController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\PayTypeController;
// use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Public Route
Route::get('/', [LandingController::class, 'home'])->name('landing.home');

// authenticated and verified users
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/refresh', [DashboardController::class, 'refreshStats'])->name('dashboard.refresh');
    Route::get('/chart-data/course-report', [DashboardController::class, 'getCourseReportChartData']);
    Route::get('/chart-data/invoices', [DashboardController::class, 'getInvoiceChartData']);
    Route::get('/api/payroll-report', [DashboardController::class, 'getPayrollReportChartData']);

    // Add this route for storing school settings
    Route::get('/appsettings', [SchoolController::class, 'create'])->name('appsettings');
    Route::post('/appsetting', [SchoolController::class, 'store'])->name('schools.store');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Teachers & Teacher Assignment
    Route::resource('teachers', TeacherController::class);
    Route::get('/teacher-assignment/{teacher}', [TeacherAssignmentController::class, 'getAssignment'])->name('teacher.assignment');
    Route::post('/assign-class', [TeacherAssignmentController::class, 'assignClass'])->name('assign.class');
    Route::get('/teacher-assignment/{id}/edit', [TeacherAssignmentController::class, 'edit']);
    Route::put('/teacher-assignment/{id}', [TeacherAssignmentController::class, 'updateAssignment'])->name('teacher-assignment.update');
    Route::delete('/teacher-assignment/{id}', [TeacherAssignmentController::class, 'destroy'])->name('teacher-assignment.destroy');

    // Students
    Route::resource('students', StudentController::class);
    Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
    Route::get('/student/{id}/payments/data', [StudentController::class, 'paymentData'])->name('student.payments.data');
    Route::post('/students/status-check-multiple', [StudentController::class, 'checkMultipleStatuses']);

    // Employees
    Route::resource('employees', EmployeeController::class);

    // Payrolls
    Route::get('payrolls/run', [PayrollController::class, 'create'])->name('payrolls.create');
    Route::get('payrolls/create/{employee_type}/{employee_id}', [PayrollController::class, 'createSingle'])->name('payrolls.create.single');
    Route::post('payrolls/store', [PayrollController::class, 'store'])->name('payrolls.store');
    Route::post('/payments/store', [PayrollController::class, 'storePayment'])
        ->name('payments_details.store');
    Route::post('/payrolls/toggle-payment', [PayrollController::class, 'togglePayment'])
        ->name('payrolls.togglePayment');
    Route::post('/payrolls/bulk-payment', [PayrollController::class, 'bulkPayment'])->name('payrolls.bulkPayment');
    Route::post('/payrolls/bulk-remove', [PayrollController::class, 'bulkTogglePayment'])->name('payrolls.bulkRemovePayment');
    Route::get('payrolls/{id}/edit', [PayrollController::class, 'edit'])->name('payrolls.edit');
    Route::put('payrolls/{payroll}', [PayrollController::class, 'update'])->name('payrolls.update');
    Route::resource('payrolls', PayrollController::class)->only(['index', 'show']);
    Route::delete('payrolls/{id}', [PayrollController::class, 'destroy'])->name('payrolls.destroy');

    // Attributes
    Route::get('/attributes', [AttributeController::class, 'index'])->name('attributes.index');

    // Classes
    Route::resource('classes', ClassesController::class);

    // Sections
    Route::resource('sections', SectionController::class);
    Route::get('/get-class-sections/{classId}', [SectionController::class, 'getByClass']);

    // Subjects
    Route::resource('subjects', SubjectController::class);

    // Fee Types
    Route::resource('fee-types', FeeTypeController::class)->only([
        'store',
        'update',
        'destroy'
    ]);

    // Pay Types
    Route::resource('pay-types', PayTypeController::class);

    // Vouchers
    Route::get('/vouchers', [VoucherController::class, 'index'])->name('vouchers.index');
    Route::get('/students/voucher/create/{student?}', [VoucherController::class, 'create'])->name('students.vouchers.create');
    Route::post('/students/vouchers/{student?}', [VoucherController::class, 'store'])->name('students.vouchers.store');
    Route::get('/voucher/{id}', [VoucherController::class, 'show'])->name('voucher.show');
    Route::get('/voucher/{id}/edit', [VoucherController::class, 'edit'])->name('voucher.edit');
    Route::put('/voucher/{id}', [VoucherController::class, 'update'])->name('voucher.update');
    Route::delete('/voucher/{id}', [VoucherController::class, 'destroy'])->name('voucher.destroy');

    // Payments
    Route::post('/payments', [PaymentController::class, 'store'])->name('vouchers.payment.store');
    Route::put('/payments/{id}', [PaymentController::class, 'update'])->name('payment.update');
    Route::get('/payments/{id}/data', [PaymentController::class, 'getPayment']);

    // Route::get('/payment-data', [PaymentController::class, 'getPaymentData'])->name('payment.data');
    Route::get('/payment/data', [PaymentController::class, 'data'])->name('payment.data');
    Route::get('payments', [PaymentController::class, 'index'])->name('payment.index');
    Route::delete('/payments/{id}', [PaymentController::class, 'destroy'])->name('payment.destroy');
    Route::get('/payments/data', [PaymentController::class, 'ajaxData'])->name('payment.datatables');

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
