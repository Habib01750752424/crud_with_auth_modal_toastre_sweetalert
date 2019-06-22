<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function ChnagePass()
    {
        return view('auth.changepass');
    }

    public function UpdatePass(Request $request)
    {
        $password = Auth::user()->password;
        $old_pass = $request->old_pass;

        if (Hash::check($old_pass, $password))
        {
            $id = Auth::id();
            $user = User::find($id);
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
                if($user->save()){
                    $notification = array(
                    'message' => 'Password Changed Successfully', 
                    'alert-type' => 'success'
                    );
                    return Redirect()->route('login')->with($notification);
                } 
                else 
                {
                   $notification = array(
                    'message' => 'Password Did Not Match!', 
                    'alert-type' => 'alert'
                    );
                    return Redirect()->back()->with($notification); 
                }
            } else {
                   $notification = array(
                    'message' => 'Password Did Not Match!', 
                    'alert-type' => 'error'
                    );
                    return Redirect()->back()->with($notification); 
                }
       
    }
}
