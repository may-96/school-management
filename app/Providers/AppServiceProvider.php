<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Payment;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */

    public function boot()
    {
        // View::composer('*', function ($view) {
        //     $totalTeachers = Teacher::count();
        //     $totalStudents = Student::count();

        //     $totalPaid = Payment::count();  
        //     $totalUnpaid = Payment::count();               

        //     $view->with(compact('totalTeachers', 'totalStudents', 'totalPaid', 'totalUnpaid'));
        // });
    }
}
