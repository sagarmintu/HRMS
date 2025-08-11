<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EmployeesController;
use App\Http\Controllers\Backend\jobsController;
use App\Http\Controllers\Backend\jobHistoryController;

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

Route::get('/', [AuthController::class, 'index']);
Route::get('forgot-password', [AuthController::class, 'forgot_password']);
Route::get('register', [AuthController::class, 'register']);
Route::post('register_post', [AuthController::class, 'register_post']);
Route::post('checkemail', [AuthController::class, 'checkEmail']);

Route::post('login_post', [AuthController::class, 'login_post']);

// Admin Or HR same name
Route::group(['middleware' => 'admin'], function() {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('admin/employees', [EmployeesController::class, 'index']);
    Route::get('admin/employees/add', [EmployeesController::class, 'add']);
    Route::post('admin/employees/add', [EmployeesController::class, 'add_post']);
    Route::get('admin/employees/view/{id}', [EmployeesController::class, 'view']);
    Route::get('admin/employees/edit/{id}', [EmployeesController::class, 'edit']);
    Route::post('admin/employees/edit/{id}', [EmployeesController::class, 'update']);
    Route::get('admin/employees/delete/{id}', [EmployeesController::class, 'delete']);

    // Job Section
    Route::get('admin/jobs', [jobsController::class, 'index']);
    Route::get('admin/jobs/add', [jobsController::class, 'add']);
    Route::post('admin/jobs/add', [jobsController::class, 'add_post']);
    Route::get('admin/jobs/view/{id}', [jobsController::class, 'view']);
    Route::get('admin/jobs/edit/{id}', [jobsController::class, 'edit']);
    Route::post('admin/jobs/edit/{id}', [jobsController::class, 'update']);
    Route::get('admin/jobs/delete/{id}', [jobsController::class, 'delete']);
    Route::get('admin/jobs_export', [jobsController::class, 'jobs_export']);

    // Job History
    Route::get('admin/job_history', [jobHistoryController::class, 'index']);
    Route::get('admin/job_history/add', [jobHistoryController::class, 'add']);
});

Route::get('logout', [AuthController::class, 'logout']);