<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class DbTeachersController extends Controller
{
    // function SubServicesList()
    // {
    //     $subService = Teacher::with('category')->get();
    //     return view('Dashboard.Teachers.index',compact('subService'));
    // }
    
    function insert()
    {
        $Service = Course::all();
        return view('Dashboard.Teachers.insert',compact('Service'));
    }

    function Store(Request $req)
    {
        $req->validate([
            'name' => 'required | max:50 | min:3',
            'Img' => 'required | image | mimes:png,jpg',
            'desc' => 'required',
        ]);

        $img = $req->Img;
        $imgname = $img->getClientOriginalName();
        $imgname = time() . "__" . $imgname;
        $img->move("images/Teachersimages/", $imgname);

        $st = new Teacher;
        $st->name = $req->name;
        $st->Img = "/images/Teachersimages/$imgname";
        $st->Course_ID = $req->Course_ID;
        $st->save();

        return redirect('/DbTeachers');

    }
    
    function edit($id)
    {
        $st = Teacher::find($id);
        $Service = Course::all();
        if ($st) {
            return view('Dashboard.Teachers.edit', compact('st','Service'));
        }
        return redirect('/DbTeachers');

    }

    function update(Request $req, $id)
    {
        $service = Teacher::find($id);
            
        $imgname = $service->img;
        if ($req->hasfile('Img')) {
            
            $img = $req->Img;
            $imgname = $img->getClientOriginalName();
            $imgname = time() . "__" . $imgname;
            $img->move("images/Teachersimages/", $imgname);
            $imgname = "/images/Teachersimages/".$imgname;
            if($service->Img){
                if(file_exists(public_path($service->Img))){
                    unlink(public_path($service->Img));
                }
            }
        }

            $service->name = $req->name;
            $service->Img = $imgname;

            $service->save();

            return redirect('/DbTeachers');
    }
    

    function delete($id)
    {
        $st = Teacher::find($id);

        if ($st) {
            if($st->Img){
                if(file_exists(public_path($st->Img))){
                    unlink(public_path($st->Img));
                }
            }
            $st->delete();
            return redirect('/DbTeachers');
        }
        return redirect('/DbTeachers');
    }
}
