<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;

class rfidAPI extends Controller
{
    //

    
    function checkUser(Request $request){

        $rfid = $request->input('rfid');
        $code = $request->input('action_code');
        $users = DB::select('select * from users where code = ?', [$rfid]);
        $validation = new UserController();
        if($validation->checkUser($rfid)):
            #TURN ON GREEN LAMP
            #REGISTER LOG
            DB::insert('insert into logs (user_id, action, status) values (?, ?, ?)', [$users[0]->id, $code,1]);
            return 1;
        else:
            #TURN ON RED LAMP
            #REGISTER LOG
            DB::insert('insert into logs (action, status) values (?, ?)', [$code,0]);
            return 0;
        endif;
        
    }
}
