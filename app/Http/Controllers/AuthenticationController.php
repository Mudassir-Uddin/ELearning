<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    //_____________________ Registration _____________________
    function register()
    {
        return view('Website.Authentication.register');
    }
    function registerstore(Request $req)
    {
        $req->validate([
            'name' => 'required | max:50 | min:3',
            'email' => 'required | max:40',
            'pass' => 'required | max:12'
        ]);

            $user = new users;
            $user->name = $req->name;
            $user->email = $req->email;
            $user->password = Hash::make($req->pass);
            $user->role = 2;
            $user->save();

           //  Session::put('lawyerMessage' , "Your Request Has been seent to Admin Please Wait for 1 Hours",);
             
            session()->put([
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
            ]);
        
        
        return redirect('/');
    }

    //_____________________ Login _____________________
    function login()
    {
        return view('website.Authentication.login');
    }
    function loginstore(Request $req)
    {
        $req->validate([
            'email' => 'required | max:40',
            'pass' => 'required',
        ]);

        $user = Users::where('email', $req->email)
            ->where('status', 1)
            ->first();

        if (!$user || !Hash::check($req->pass, $user->password)) {
            return new JsonResponse(['message' => 'Invalid credentials'], 401);
        }

        if ($user->role == 1) {
            session()->put([
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
            ]);
            return new JsonResponse(['message' => 'Login successful', 'redirect' => '/Admindashboard'], 200);

        } elseif ($user->role == 2) {
            session()->put([
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
            ]);
            // return redirect('/dashboard/Admindashboard');
            return new JsonResponse(['message' => 'Login successful', 'redirect' => '/'], 200);
        } 
        return redirect('/login');
    }

    function logout()
    {
        session()->forget('id');
        session()->forget('name');
        session()->forget('email');
        session()->forget('role');

        return redirect('/login');
    }

}
