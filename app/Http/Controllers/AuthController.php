<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Session\Session;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Inline\Element\Image;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }


    public function register()
    {
        return view('auth.register');
    }

    //Registering a new user
    public function save(Request $request)
    {
        //Validate the user input
        $request->validate([
            'email' => 'required|email|unique:admins',
            'eircode' => ['required', 'regex:/([AC-FHKNPRTV-Y]\d{2}|D6W)[0-9AC-FHKNPRTV-Y]{4}/'],
            'password' => ['required', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])|(?=.*?[#?!@$%^&*-]).{8,}$/']
        ]);

            //Insert input into database once checks have been completed
            $admin = new Admin;
            $admin->email = $request->email;
            $admin->password = Hash::make($request->password);
            $admin->eircode = $request->eircode;

            //image uploader code
            if($request->hasFile('photo')){
                $image = $request->file('photo');
                $image_name = time() . '.' . $image->extension();
                $destination_path = public_path('/images');

                $image = Image::make($request->file('photo'))
                    ->resize(250, 250, function ($constraint){
                        $constraint->aspectRatio();
                    });
                Storage::putFileAs($destination_path . $image_name, (string)$image->encode('png', 95), $image_name);
            }


            //save user to DB
            $save = $admin->save();

            if($save){
                return redirect('dashboard');
            }else{
                return back()->with('Registration failed, Try Again');
            }

    }

    public function check(Request $request)
    {
        //Validate Requested inputs
        $request->validate([
            'email'=>'required|email',
            'password'=> ['required', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])|(?=.*?[#?!@$%^&*-]).{8,}$/']
        ]);




        $userInfo = Admin::where('email', '=', $request->email)->first();
        if(!$userInfo){
            return back()->with('Login Failed');
        }else{
            if(Hash::check($request->password, $userInfo->password)){
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('dashboard');
            }else{
                return back()->with('Incorrect Password');
            }
        }
    }

    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/auth/login');
        }
    }

}
