<?php

namespace App\Http\Controllers;

use App\Models\Children;
use App\Models\ChildrenParent;
use App\Models\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
class UserController extends Controller
{
    public function getUser(){

        $users = Children::get();
        if(!$users){
            return abort(404);
        }
        return view('admin.user',['users' => $users]);
    }

    public function UserContent(){

        return view("admin.add-user");
    }

    public function addUser(Request $request){

        $parent = new ChildrenParent();
        $parent->name = $request->parent_name;
        $parent->phone = $request->parent_phone;
        $parent->email = $request->email;
        $parent->office = $request->office;
        $parent->save();


        $children = new Children();
        $children->name = $request->name;
        $children->age = $request->age;
        $children->category_id = $request->category_id;
        $children->parent_id = $parent->id;
        $children->save();


        return redirect()->route('admin.user')->with(['message' => "User successfully created"]);
    }

    public function editUserContent($id){

        $user = Children::where('id',$id)->first();
        if(!$user){
            return abort(404);
        }
        return view('admin.edit-user', ['user' => $user]);
    }

    public function editUser(Request $request){

        $user = Children::find($request['userId']);

        if($user){
            $user->name = $request['name'];
            $user->age = $request['age'];
            $user->update();

            return redirect()->route('admin.user')->with(['message' => "Edited seccessfully"]);

        } else {
            return redirect()->route('admin.user')->with(['message' => "Not Fount"]);
        }


    }
    public function deleteUser($id){

        $user = Children::where('id',$id)->first();
        if(!$user){
            return abort(404);
        }
        return view('admin.delete-user',['user' => $user]);

    }

    public function setdeleteUser($id){

        $user = Children::where('id', $id)->first();
        if(!$user){
            return abort(404);
        }
        $user->delete();

        return redirect()->route("admin.user")->with(['message' => "Successfully deleted"]);

    }

    public function sendUser($id){
        $user = Children::where('id',$id)->first();
        if(!$user){
            return abort(404);
        }
        return view('admin.send',['user' => $user]);
    }

    public function send(Request $request)
    {
        $children = Children::find($request->userId);

        if($children) {
            $parent = ChildrenParent::find($request->parentId);
            if ($parent) {

                if($request->xabar == 'keldi') {

                    $message = "Assalomu alaykum! Hurmatli " . $parent->name . " Farzandingiz " . $children->name .
                        "ni bugun: " . "<i> " . date('Y-m-d H:i:s') . "</i>" . " da BOG'CHAmizga " . " <b> $request->near</b> olib keldi.";

                }
                if ($request->xabar == 'ketdi') {

                    $message = "Assalomu alaykum! Hurmatli " . $parent->name . " Farzandingiz " . $children->name .
                        "ni bugun: " . "<i> " . date('Y-m-d H:i:s') . "</i>" . " da BOG'CHAdan " . " <b> $request->near</b> olib ketdi.";

                }
                if ($request->xabar == 'kelmadi') {

                    $message = "Assalomu alaykum! Hurmatli " . $parent->name . " Farzandingiz " . " <b>$children->name</b>" .
                        " bugun BOG'CHAmizga kelmadi. Vaqt:" . "<i>" . date('Y-m-d H:i:s') . "</i>";

                }

                $base_URL = 'https://api.telegram.org/bot5950649023:AAFRj4CmAK3R9xYWNZsE__vuNsjcnu63yCc/';
                $client = new Client(['base_uri' => $base_URL]);

                $response = $client->post('sendMessage', [
                    'json' => [
                        'chat_id' => $parent->tg_id,
                        'text' => $message,
                        'parse_mode' => 'html'
                    ]
                ]);

                return redirect()->route('admin.user');
            }
        }



    }


    public function getParent(){
        $model = ChildrenParent::get();
        if(!$model){
            return abort(404);
        }
        return view('admin.game',['users' => $model]);
    }

}
