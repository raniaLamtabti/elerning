<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\CourseController::class, 'indexWelcome'])->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Courses
Route::get('/courses', [App\Http\Controllers\CourseController::class, 'index'])->name('course.index');
Route::get('/myCourses', [App\Http\Controllers\CourseController::class, 'indexByUser'])->name('course.indexByUser');
Route::get('/courseAdd', [App\Http\Controllers\CourseController::class, 'create'])->name('course.create');
Route::post('/courseStore', [App\Http\Controllers\CourseController::class, 'store'])->name('course.store');
Route::get('/show/{id}', [App\Http\Controllers\CourseController::class, 'show'])->name('course.show');
Route::put('/updateStatus/{id}', [App\Http\Controllers\CourseController::class, 'updateStatus'])->name('courseStatus.update');
Route::delete('/destroy/{id}', [App\Http\Controllers\CourseController::class, 'destroy'])->name('course.destroy');
Route::get('/', [App\Http\Controllers\CourseController::class, 'indexWelcome'])->name('welcome');
Route::get('/coursesClient', [App\Http\Controllers\CourseController::class, 'indexClient'])->name('coursesClient.indexClient');
Route::get('/showClient/{id}', [App\Http\Controllers\CourseController::class, 'showClient'])->name('courseClient.show');

//Lessons
Route::delete('/destroyLesson/{id}', [App\Http\Controllers\LessonController::class, 'destroy'])->name('lesson.destroy');

//Users
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
Route::get('/profile/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');
Route::post('/storeUser', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
Route::put('/userRole/{id}', [App\Http\Controllers\UserController::class, 'updateRole'])->name('userRole.update');
Route::put('/userUpdate/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::delete('/destroyUser/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');

//Client
Route::get('/clients', [App\Http\Controllers\ClientController::class, 'index'])->name('client.index');
Route::get('/client/auth/login',[App\Http\Controllers\MainController::class, 'login'])->name('authClient.login');
Route::get('/client/auth/register',[App\Http\Controllers\MainController::class, 'register'])->name('authClient.register');
Route::post('/client/auth/save',[App\Http\Controllers\MainController::class, 'save'])->name('authClient.save');
Route::post('/client/auth/check',[App\Http\Controllers\MainController::class, 'check'])->name('authClient.check');
Route::get('/client/auth/logout',[App\Http\Controllers\MainController::class, 'logout'])->name('authClient.logout');

//Levels
Route::post('/levelStore', [App\Http\Controllers\LevelController::class, 'store'])->name('level.store');

//Lessons
Route::get('/lessonsAdd', [App\Http\Controllers\LessonController::class, 'index'])->name('lesson.index');
Route::post('/storeLesson', [App\Http\Controllers\LessonController::class, 'store'])->name('lesson.store');
Route::get('/showLesson/{id}', [App\Http\Controllers\LessonController::class, 'show'])->name('lesson.show');


//plans
Route::get('/pricing', [App\Http\Controllers\PlanController::class, 'index'])->name('plan.index');
Route::post('/plan', [App\Http\Controllers\PlanController::class, 'store'])->name('plan.store');

