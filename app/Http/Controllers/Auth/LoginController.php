<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Auth;
use Session;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

  use AuthenticatesUsers;



  public function showLoginForm()
  {
    if (auth()->guard('Admin')->user()) return redirect()->route('admin.dashboard');
    return view('index');
  }
 


  public function login(Request $request)
  {    
    $this->validate($request,[
    'username'=>'required',
    'password'=>'required'
    ]);
    if(auth()->guard('Admin')->attempt(['username' => $request->input('username'), 'password' => $request->input('password')]))
    {
      $user = Auth::guard('Admin')->user();
      Session::put('userId', $user->id); 
      Session::put('userName', $user->username);
      Session::put('userType', $user->userType);

      if($user->userType == 'OI')
        return  redirect()->route('admin.dashboard');


    }
    else
    {
      session()->flash('message','Your Username and Password are Wrong.');
      return redirect('/login')->withInput($request->only('username','remember'));
    }
  }

  public function logout()
  {
    if(Auth::guard('Admin')->check())
    { 
      Auth::guard('Admin')->logout();
      Session::flush();
      return redirect('/');
    }
    else
    {
      return redirect('');
    }
  }

     public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
