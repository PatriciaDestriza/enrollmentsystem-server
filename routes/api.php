<?php

use App\Http\Controllers\AcademicTermController;
use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EnrolledStudentController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\YearLevel;
use App\Http\Controllers\YearLevelController;
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

Route::post('/signup', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'login']);


Route::group(['middleware' => 'auth:api', 'scope: admin'], function () {
    Route::resource('/academic-years', AcademicYearController::class);
    Route::resource('/academic-terms', AcademicTermController::class);
    Route::resource('/departments', DepartmentController::class);
    Route::resource('/year-levels', YearLevelController::class);
    Route::resource('/schedules', ScheduleController::class);
    Route::resource('/teachers', TeacherController::class);
    Route::resource('/programs', ProgramController::class);
    Route::resource('/rooms', RoomController::class);
    Route::resource('/courses', CourseController::class);
    Route::resource('/student', StudentController::class);
    Route::resource('/enrolled-students', EnrolledStudentController::class);
    Route::resource('/blocks', BlockController::class);
});
