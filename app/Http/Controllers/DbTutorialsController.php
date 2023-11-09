<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Tutorial;
use Illuminate\Http\Request;

class DbTutorialsController extends Controller
{
    // function DbTutorials(){
    //     $product = Tutorial::With('course')->get();
    //     return view('Dashboard.tutorials.index',compact('product'));
    // }

    function insert()
    {
        $teacher = Teacher::all();
        return view('Dashboard.tutorials.insert',compact('teacher'));
    }
    
    function Store(Request $req)
    {
        $req->validate([
            'name' => 'required | max:50 | min:3',
            'img' => 'required | image | mimes:png,jpg',
            'Description' => 'required',
        ]);

        $img = $req->img;
        $imgname = $img->getClientOriginalName();
        $imgname = time() . "__" . $imgname;
        $img->move("images/Tutorialimages/", $imgname);

        $st = new Tutorial;
        $st->name = $req->name;
        $st->img = "/images/Tutorialimages/$imgname";
        $st->Description = $req->Description;
        $st->Teacher_ID = $req->Teacher_ID;
        $st->save();

        return redirect('/DbTutorials');

    }

    function edit($id)
    {
        $st = Tutorial::find($id);
        $SubService = Teacher::all();
        if ($st) {
            return view('Dashboard.tutorials.edit', compact('st','SubService'));
        }
        return redirect('/DbTutorials');

    }

    function update(Request $req, $id)
    {
        $st = Tutorial::find($id);
        $imgname = $st->img;
        if ($req->hasfile('img')) {
            
            $img = $req->img;
            $imgname = $img->getClientOriginalName();
            $imgname = time() . "__" . $imgname;
            $img->move("images/Tutorialimages/", $imgname);
            $imgname = "/images/Tutorialimages/".$imgname;
            if($st->img){
                if(file_exists(public_path($st->img))){
                    unlink(public_path($st->img));
                }
            }
        }
        $st->name = $req->name;
        $st->Img = $imgname;
        $st->Description = $req->Description;
        $st->save();
        return redirect('/DbTutorials');
    }

    function delete($id)
    {
        $st = Tutorial::find($id);

        if ($st) {
            if($st->img){
                if(file_exists(public_path($st->img))){
                    unlink(public_path($st->img));
                }
            }
            $st->delete();
            return redirect('/DbTutorials');
        }
        return redirect('/DbTutorials');
    }


}
