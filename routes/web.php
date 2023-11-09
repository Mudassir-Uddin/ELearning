<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DbCoursesController;
use App\Http\Controllers\DbTeachersController;
use App\Http\Controllers\DbTutorialsController;
use App\Http\Controllers\DBUserController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });



//____________ Authentication _____________________
#region Auth
Route::get('/register', [AuthenticationController::class,'register']);
Route::post('/registerstore', [AuthenticationController::class,'registerstore']);
Route::get('/login', [AuthenticationController::class,'login']);
Route::post('/loginstore', [AuthenticationController::class,'loginstore']);
Route::get('/logout', [AuthenticationController::class,'logout']);
Route::get('/update', [AuthenticationController::class,'update']);
#endregion

// Clients

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/courses', [HomeController::class,'courses']);
Route::get('/teachers', [HomeController::class,'teachers']);
Route::get('/tutorials', [HomeController::class,'tutorials']);
Route::get('/about', [HomeController::class,'about'])->name('aboutus');
Route::get('/contact', [HomeController::class,'contact'])->name('contactus');

// Admin Dashboard 

Route::get('/Admindashboard', [DashboardController::class,'index'])->name('DbAdmin')->middleware('admin');
Route::get('/DbTeachers', [DashboardController::class,'teacher'])->name('DbTeacher');
Route::get('/DbCourses', [DashboardController::class,'course'])->name('DbCourse');
Route::get('/DbTutorials', [DashboardController::class,'tutorials'])->name('DbTutorial');
Route::get('/DbUsers', [DashboardController::class,'users'])->name('DbUser');

// Db Booking

// Route::get('/DbBookings', [DbBookingController::class,'Booking_Details'])->name('DbBooking');
// Route::post('/DbBookingConfirm/{id}', [DbBookingController::class,'Booking_Confirm'])->name('DbBookingConfirm');

// DB Technologies

// Route::get('/TechnologiesInsert', [DbTechnologiesController::class,'insert'])->name('TechnologieInsert');
// Route::post('/TechnologiesStore', [DbTechnologiesController::class,'Store']);
// Route::get('/Technologiesedit/{id}', [DbTechnologiesController::class,'edit']);
// Route::post('/Technologiesupdate/{id}', [DbTechnologiesController::class,'update']);
// Route::get('/Technologiesdelete/{id}', [DbTechnologiesController::class,'delete']);

// DB Sub Services 

Route::get('/TeachersInsert', [DbTeachersController::class,'insert'])->name('TeacherInsert')->middleware('admin');
Route::post('/TeachersStore', [DbTeachersController::class,'Store']);
Route::get('/Teachersedit/{id}', [DbTeachersController::class,'edit'])->middleware('admin');
Route::post('/Teachersupdate/{id}', [DbTeachersController::class,'update']);
Route::get('/Teachersdelete/{id}', [DbTeachersController::class,'delete']);

// DB Services 

Route::get('/CoursesInsert', [DbCoursesController::class,'insert'])->name('CourseInsert')->middleware('admin');
Route::post('/CoursesStore', [DbCoursesController::class,'Store']);
Route::get('/Coursesedit/{id}', [DbCoursesController::class,'edit'])->middleware('admin');
Route::post('/Coursesupdate/{id}', [DbCoursesController::class,'update']);
Route::get('/Coursesdelete/{id}', [DbCoursesController::class,'delete']);

// // DB Tutorials 

Route::get('/TutorialsInsert', [DbTutorialsController::class,'insert'])->name('TutorialInsert')->middleware('admin');
Route::post('/TutorialsStore', [DbTutorialsController::class,'Store']);
Route::get('/Tutorialsedit/{id}', [DbTutorialsController::class,'edit'])->middleware('admin');
Route::post('/Tutorialsupdate/{id}', [DbTutorialsController::class,'update']);
Route::get('/Tutorialsdelete/{id}', [DbTutorialsController::class,'delete']);

// //___________ DB Users _____________

Route::get('/UsersInsert', [DBUserController::class,'insert'])->name('UserInsert')->middleware('admin');;
Route::post('/UsersStore', [DBUserController::class,'Store']);
Route::get('/Usersedit/{id}', [DBUserController::class,'edit'])->middleware('admin');;
Route::post('/Usersupdate/{id}', [DBUserController::class,'update']);
Route::get('/Usersdelete/{id}', [DBUserController::class,'delete']);

// // ___________Booking________________________

// Route::get('/Booking/{id}', [BookingController::class,'Booking'])->name('Booking');
// Route::get('/Booking_Details', [BookingController::class,'Booking_Details'])->name('Booking_Details');
// Route::post('/BookingPost/{productId}', [BookingController::class,'BookingPost'])->name('BookingPost');

// Route::post('/BookingConfirm/{id}', [BookingController::class,'Booking_Confirm'])->name('BookingConfirm');