<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use App\Models\Tutorial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){

        // $Technologies = Technologie::all();
        return view('Website.Home.index');
        
    }
    
    // function graphicsservice(){
        
    //     return view('website.services.graphics');
    // }
    // function websiteservice(){
    //     return view('website.services.website');
    // }
    
    function courses(){
        
        $course = Course::all();
        return view('Website.Courses.index',compact('course'));
    }
    function teachers(){

        // $teacher = Teacher::all();
        $teacher = Teacher::with('courses')->get();
        return view('Website.Teachers.index',compact('teacher'));
    }
    function tutorials(){
        // $tutorial = Tutorial::all();
        $tutorial = Tutorial::With('teacher')->get();
        return view('Website.tutorials.index',compact('tutorial'));
    }
   
    function about(){
        return view('Website.About.index');
    }
    
    function contact(){
        return view('Website.Contact.index');
    }

}
