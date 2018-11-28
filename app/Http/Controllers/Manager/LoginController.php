<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/manager/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
    
    public function getLogin() {
        return view('backend.login');
    }
    
    public function postLogin(Request $req) {
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',  
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu tối thiểu 6 kí tự',
                'password.max'=>'Mật khẩu tối đa 20 kí tự'               
            ]
        );
        $credientials = array('email'=>$req->email, 'password'=>$req->password);
        // dd($credientials);
        // dd(Auth::attempt($credientials));
        if(Auth::attempt($credientials)) {
            return redirect()->route('backend.home');      
        }
        return redirect()->route('manager.getLogin')->with('');
    }
    public function getLogout() {
        Auth::logout();
        return redirect()->route('trang-chu');
    }

}
