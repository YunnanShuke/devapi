<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetUserController extends Controller
{
    //这是一个获取用户数据的API
    public function getUser(){
        $user = Db::select("select * from users where user_login = 'sixos'");
        foreach ($user as $getUser) {
            echo $getUser->user_login;
        }
    }
}
