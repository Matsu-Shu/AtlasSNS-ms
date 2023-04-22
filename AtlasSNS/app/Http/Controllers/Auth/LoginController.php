<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

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
    protected $redirectTo = '/top';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validator(array $data)
    {
        return $validator = Validator::make($data, [
            'mail' => ['required','exists:users,mail'],
            'password' => ['required','exists:users,password'],
        ]);

    }


    public function login(Request $request){
        if($request->isMethod('post')){

            $data=$request->only('mail','password');

            //$register(インスタンス化)=バリデーション処理　validator呼び出し
            $register = $this->validator($data);

            if ($register->fails()){
                return redirect()->back()
                ->withErrors($register)
                ->withInput();
            }
            else if(Auth::attempt($data)){
                return redirect('/top');
            }
        }
        return view("auth.login");
    }

     //logout
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
