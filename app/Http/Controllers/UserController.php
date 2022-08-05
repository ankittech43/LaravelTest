<?php

namespace App\Http\Controllers;

use App\Mail\UserRegister;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use function Symfony\Component\Translation\t;
use const http\Client\Curl\AUTH_ANY;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request){
        $validate = $request->validate([

            'email' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($validate)){

            $request->session()->regenerate();

            return  redirect('user');

        }else{

         return  redirect('admin');
        }
    }

    public function index(Request $request)
    {
        if(Auth::check()) {

            $user=User::paginate(10);

            return view('user.index')->with(['title'=>"User",'user'=>$user,'filter'=>'']);

        }else{

            return redirect('admin');

        }
    }

    public function create()
    {

        return view('user.create')->with(['title' => 'Create']);

    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users',
            'dob' => 'required',
            'gender' => 'required',
            'password' => 'required|confirmed|min:6',
            ]);

        $validate['password']=Hash::make($request->password);

       $user= User::create($validate);

        Mail::to($request->email)

            ->queue(new UserRegister($user));


        return redirect('admin');

    }


}
