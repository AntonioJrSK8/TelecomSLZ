<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)
    {
        $data = $request->only($this->username(), 'password');
        $usernameKey = $this->usernameKey();
        
        //Usado para acesso como somente para admin
        $data[$usernameKey] = $data[$this->username()]; 
        //$data['userable_type'] = Admin::class;

        if($usernameKey != $this->username()){
            //dd($data[$this->username()]);
            $data[$usernameKey] = $data[$this->username()];
            unset($data[$this->username()]);
        }

        return $data;
    }

    protected function usernameKey(){
        $email =  \Request::get($this->username()); 

        $validator = \Validator::make(
            ['email'=>$email],
            ['email'=>'email']
        );

        return $validator->fails() ? 'enrolment' : 'email';
    }
}
