<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginRequest;

use App\Models\User;

use Auth;

class LoginController extends Controller
{
    /**
     * Admin login index page
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        try {
            if(Auth::check()){
                return redirect()->route('admin.dashboard');
            }else{
                return view('admin.login');
            }          
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Admin login functionality
     *
     * @param AdminLoginRequest $request
     * @return void
     */
    public function adminLogin(AdminLoginRequest $request)
    {
        try {  
         
            $user = User::where('email',$request->email)->first();
            Auth::login($user);
            $request->session()->flash('SuccessToastr', "Welcome to ".config('app.name')." ");
            return 'success';
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /**
     * Logout functionality for admin panel
     *
     * @param Request $request
     * @return void
     */
    public function logout(Request $request)
    {
        try {
            $request->session()->flush();
            Auth::logout();
            return redirect()->route('admin.login');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
