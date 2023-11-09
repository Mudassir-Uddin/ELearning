<?php

namespace App\Http\Controllers;

use App\Models\users;
use Hash;
use Illuminate\Http\Request;

class DBUserController extends Controller
{
     //____________ Insert ________________
    #region Insert 

    function insert()
    {
        return view('dashboard.Users.insert');
    }

    function Store(Request $req)
    {
        $req->validate([
            'name' => 'required | max:50 | min:3',
            'email' => 'required',
            'password' => 'required | max:10 | min:3'
        ]);

        $img = $req->img;
        $imgname = $img->getClientOriginalName();
        $imgname = time() . "__" . $imgname;
        $img->move("images/Userimages/", $imgname);

        $st = new Users;
        $st->name = $req->name;
        $st->img = "/images/Userimages/$imgname";
        $st->email = $req->email;
        $st->password = Hash::make($req->pass);
        // $st->password = $req->password;
        $st->role = $req->role;
        $st->save();

        session()->put([
            'id' => $st->id,
            'name' => $st->name,
            'email' => $st->email,
            'role' => $st->role,
        ]);
    

        return redirect('/DbUsers');

    }

    //____________ Update ________________
    #region Insert
    function edit($id)
    {
        $user = users::Where('id', $id)->first();
        
        return view('dashboard.Users.edit', compact('user'));

    }

    function update(Request $req, $id)
    {
        $user = users::find($id);
        
        $imgname = $user->img;
        if ($req->hasfile('img')) {
            
            $img = $req->img;
            $imgname = $img->getClientOriginalName();
            $imgname = time() . "__" . $imgname;
            $img->move("images/Userimages/", $imgname);
            $imgname = "/images/Userimages/".$imgname;
            if($user->img){
                if(file_exists(public_path($user->img))){
                    unlink(public_path($user->img));
                }
            }
        }

        
            $user->name = $req->name;
            $user->img = $imgname;
            $user->email = $req->email;
            $user->password = $req->password;
            $user->role = $req->role;

            $user->save();

            return redirect('/DbUsers');
    
    }
    #endregion 
    

    //____________ Delete ___________
    function delete($user_id)
    {
        $st = users::find($user_id);
        if ($st) {
            if($st->img){
                if(file_exists(public_path($st->img))){
                    unlink(public_path($st->img));
                }
            }
            $st->delete();
            return redirect('/DbUsers');
        }
        return redirect('/DbUsers');
    }

}
