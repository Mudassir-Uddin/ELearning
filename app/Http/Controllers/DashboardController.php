<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use App\Models\Tutorial;
use App\Models\users;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index(){
        return view('dashboard.index');
    }
    function teacher(){

        // $teacher = Teacher::all();
        $teacher = Teacher::with('cours')->get();
        return view('dashboard.Teachers.index',compact('teacher'));
    }
    function course(){
        
        $course = Course::all();
        return view('dashboard.Courses.index',compact('course'));
    }
    function tutorials(){
        // $tutorial = Tutorial::all();
        $tutorial = Tutorial::With('teacher')->get();
        return view('dashboard.tutorials.index',compact('tutorial'));
    }
    function users()
    {
        $user = users::all();
        return view('dashboard.Users.index', compact('user'));
    }

}
