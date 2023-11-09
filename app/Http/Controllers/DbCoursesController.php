<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class DbCoursesController extends Controller
{
    // function ServicesList()
    // {
    //     $service = Course::all();
    //     return view('Dashboard.Courses.index',compact('service'));
    // }

    function insert()
    {
        return view('Dashboard.Courses.insert');
    }

    function Store(Request $req)
    {
        $req->validate([
            'Name' => 'required | max:50 | min:3',
            'Img' => 'required | image | mimes:png,jpg',
            'desc' => 'required',
        ]);

        // dd($req);
        $img = $req->Img;
        $imgname = $img->getClientOriginalName();
        $imgname = time() . "__" . $imgname;
        $img->move("images/Courseimages/", $imgname);

        $st = new Course;
        $st->Name = $req->Name;
        $st->Img = "/images/Courseimages/$imgname";
        $st->desc = $req->desc;

        $st->save();

        return redirect('/DbCourses');

    }

    function edit($id)
    {
        $st = Course::find($id);
        if ($st) {
            return view('Dashboard.Courses.edit', compact('st'));
        }
        return redirect('/DbCourses');

    }

    function update(Request $req, $id)
    {
        $st = Course::find($id);

        $imgname = $st->Img;
        if ($req->hasfile('Img')) {
            
            $img = $req->Img;
            $imgname = $img->getClientOriginalName();
            $imgname = time() . "__" . $imgname;
            $img->move("images/Courseimages/", $imgname);
            $imgname = "/images/Courseimages/".$imgname;
            if($st->Img){
                if(file_exists(public_path($st->Img))){
                    unlink(public_path($st->Img));
                }
            }
        }
            $st->Name = $req->Name;
            $st->Img = $imgname;

            $st->save();

            return redirect('/DbCourses');
    }

    function delete($id)
    {
        $st = Course::find($id);

        if ($st) {
            if($st->Img){
                if(file_exists(public_path($st->Img))){
                    unlink(public_path($st->Img));
                }
            }
            $st->delete();
            return redirect('/DbCourses');
        }
        return redirect('/DbCourses');
    }
 
}
