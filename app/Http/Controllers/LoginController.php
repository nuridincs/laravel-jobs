<?php

namespace App\Http\Controllers;

use App\ModelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
  public function index()
  {
    return view('login');
  }

  public function doLogin(Request $request)
  {
    $email = $request->email;
    $password = $request->password;

    $condition = [
      'email' => $email,
      'password' => md5($password)
    ];

    $data = ModelUser::where($condition)->first();

    if($data){
      Session::put('name', $data->name);
      Session::put('email', $data->email);
      Session::put('login', TRUE);

      return redirect('/list-jobs');
    } else{
      return redirect('/')->with('alert','Password atau Email, Salah!');
    }
  }

  public function doLogout()
  {
    Session::flush();
    return redirect('/')->with('alert','Kamu sudah logout');
  }
}
