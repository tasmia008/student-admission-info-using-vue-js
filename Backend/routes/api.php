<?php


use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GhostController;
use App\Http\Controllers\UserrController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('index', [GhostController::class, 'index']);
Route::get('courses/show', [CourseController::class, 'show']);
Route::post('students/create', [StudentController::class, 'store']);
Route::post('login', [StudentController::class, 'login']);
// Route to display the student information
Route::get('students', [StudentController::class, 'index'])->name('students.index');

// Route to update the student's course state
Route::post('students/update', [StudentController::class, 'update'])->name('students.update');
Route::post('login/dashboard', [StudentController::class, 'update'])->name('students.update');

Route::get('/login/studentdashboard', [StudentController::class, 'dashboard']);
Route::get('/login/admindashboard', [StudentController::class. 'dashboard']);
Route::get('/students/{id}', [StudentController::class, 'findstudentinfo']);
Route::get('/admin/{id}', [StudentController::class, 'findadmin']);
Route::post('students/update/{id}', [StudentController::class, 'update']);
// Route::get('students/update{id}', [UserrController::class, 'index']);


