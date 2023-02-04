<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use DB;

class UserController extends Controller
{
    //
    function checkUser($rfid){
        $user = DB::select('select * from users where code = ?', [$rfid]);
        if(count($user) > 0):
            return true;
        elseif(count($user) == 0):
            return false;
        endif;
        
    }

    function show(){
        $data = User::all();
        return view('home', ['users' => $data]);
    }

    function showLogs(){
        $logs = DB::select('select * from logs');
        return view('logs', ['logs' => $logs]);
    }

    function userInfoShow($id){
        $user = DB::select('select * from logs where user_id = ?', [$id]);
        $user_details = DB::select('select * from users where id = ?' , [$id]);
        $name = $user_details;
        if(count($user) > 0):
            $data = $user;
            return view('userInfo', ['logs' => $data, 'name' => $name]);
        else:
            $data = 0;
            return view('userInfo', ['logs' => $data, 'name'=> $name]);
        endif;
    }

    
    function registerUser(Request $req){
        /*
        * Checking if rfid code exist on database
        * @bool
        */
        $fname = $req->input('fname');
        $lname = $req->input('lname');
        $rfid = $req->input('rfid');

        $validation = new UserController();
        if(!$validation->checkUser($rfid)):
            DB::insert('insert into users (f_name, l_name, code) values (?, ?, ?)', [$fname, $lname, $rfid]);
            return true;
        else:
            return false;
        endif;
    }

    function editUserView($id){
        $user = DB::select('select * from users where id = ?', [$id]);
        return view('editUser', ['user' => $user]);
    }

    function editUser(Request $req, $id){

        $fname = $req->input('fname');
        $lname = $req->input('lname');
        $rfid = $req->input('rfid');

        DB::update('update users set f_name = ? , l_name = ? , code = ? where id = ?', [$fname , $lname , $rfid,  $id]);
        return redirect('/')->with('status', 'Użytkownik zaktualizowany!');

    }

    function deleteUser($id){

        $user = User::find($id);
        if($user && $id != 1):
            $user -> delete();
            return ["result" => "User has been deleted"];
        elseif($id == 1):
            return ["result" => "This user cannot be deleted"];
        else:
            return ["result" => "There is no user on database with id " . $id];
        endif;
    } 
}
