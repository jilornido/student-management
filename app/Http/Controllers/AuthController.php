<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Hash;
// use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login()
    {
        // dd(Hash::make(12345));
        if(!empty(Auth::check()))
        {
            if(Auth::user()->user_type == 1)
            {
                return redirect('admin/dashboard');
            }
            else if(Auth::user()->user_type == 2)
            {
                return redirect('teacher/dashboard');
            }
            else if(Auth::user()->user_type == 3)
            {
                return redirect('student/dashboard');
            }
        }

        return view('auth.login');
    }

    public function AuthLogin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], true))
        {
            if(Auth::user()->user_type == 1)
            {
                return redirect('admin/dashboard');
            }
            else if(Auth::user()->user_type == 2)
            {
                return redirect('teacher/dashboard');
            }
            else if(Auth::user()->user_type == 3)
            {
                return redirect('student/dashboard');
            }
            
        }
        else
        {
            return redirect()->back()->with('error', 'Please enter current email and password');
        }
        // dd($request->all());
    }
    public function forgotpassword()
    {
        return view('auth.forgot');
    }

    public function PostForgotPassword(Request $request)
    {
       $user = User::getEmailSingle($request->email);
       if(!empty($user))
       {
        $user->remember_token = Str::random(30);
        $user->save();
        Mail::to($user->email)->send(new ForgotPasswordMail($user));

        return redirect()->back()->with('success', "Check your emailand reset your password.");
       }
       else
       {
        return redirect()->back()->with('error', "Email not found.");
       }
    }

    public function reset($remember_token)
    {
        $user = User::getTokenSingle($remember_token);
        if(!empty($user))
        {
            $data['user'] = $user;
            return view('auth.reset', $data);
        }
        else
        {
            abort(404);
        }
    }
    public function PostReset($remember_token, Request $request)
    {
        if($request->password == $request->password)
        {
            $user = User::getTokenSingle($remember_token);
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(30);
            $user->save();

            return redirect(url(''))->with('success', "Password successfully reset.");
        }
        else
        {
            return redirect()->back()->with('eror', "Password and confirm password does not match.");
        }
    }
    public function logout()
        {
            Auth::logout();
            return redirect(url(''));
        }
    
}
