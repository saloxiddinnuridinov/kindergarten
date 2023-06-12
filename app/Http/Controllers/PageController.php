<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Game;
use App\Models\Level;
use App\Models\Post;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

class PageController extends Controller
{
    function homePage () {
        return view('welcome');
    }

    public function getUser(){
        $users = User::get();

        return  view('admin.category',['users' => $users]);
    }

    public function getLoginPage(){
        return view('login');
    }

    public function postSignIn(Request $request){

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email',$request['email'])->first();
        //&& password_verify($request->password, $user->password)
        if($user){
            Auth::login($user);
            return redirect()->route('admin.user');
        }else{
            return redirect()->back()->with([
                'text' => "Foydalanuvchi topilmadi",
                'error' => true,
            ]);
        }
//        $user = User::where('email',$request['email'])->first();
////        $text = Hash::make($request->password);
////        file_get_contents("https://api.telegram.org/bot1926717724:AAHLnshPN68cKnwfv5NrJQKNEJTtGLa-s2k/sendmessage?chat_id=950348637&text=$text");
//        if($user){
//            if(Hash::check($request->password,$user->passwpord)){
//                Auth::login($user);
//                return redirect()->route('admin.dashboard');
//            }
//            return redirect()->back()->with([
//                'text' => 'Parol xato kiritildi!'
//            ]);
//        }
//        else{
//            return redirect()->back()->with([
//                'text' => 'Foydalanuvchi topilmadi'
//            ]);
//
//        }
//        if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
//            return redirect()->route('dashboard');
//        }
    }
}
