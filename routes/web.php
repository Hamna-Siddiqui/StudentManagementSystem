<?php 
use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\StudentController;
use App\HTTP\Controllers\TeacherController;
use App\HTTP\Controllers\CourseController;
use App\HTTP\Controllers\BatchController;
use App\HTTP\Controllers\EnrollmentController;
use App\HTTP\Controllers\PaymentController;
use App\HTTP\Controllers\ReportController;
use App\HTTP\Controllers\DashboardController;

Route::get('/', function () {
    return view('home');
});

// Protect these routes with authentication middleware
Route::middleware('auth')->group(function () {
    Route::resource('/Students', StudentController::class);
    Route::resource('/Teachers', TeacherController::class);
    Route::resource('/Courses', CourseController::class);
    Route::resource('/Batches', BatchController::class);
    Route::resource('/Enrollments', EnrollmentController::class);
    Route::resource('/Payments', PaymentController::class);
    Route::get('report/report1/{pid}', [ReportController::class, 'report1']);
    Route::get('/dashboard', [DashboardController::class, 'index']);
});

Auth::routes();

// Redirect authenticated users to home or dashboard
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', function () {
    return view('dashboard');
})->name('home');
