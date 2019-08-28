<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class HomeController extends Controller
{
    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('home');
    }

    public function Register(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'phone' => 'numeric',
        ]);

        if($validate->fails())
        {
            return back()
                ->with('danger', 'Gagal mendaftar akun')
                ->withInput($request->all())
                ->withErrors($validate);
        }

        $data = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'photo' => $request['photo'],
            'phone' => $request['phone']
        ]);

        $data->assignRole('user');
        $this->guard()->login($data);

        return $this->registered($request, $data)
                        ?: redirect($this->redirectPath());
    }


    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home' ;
    }
}
