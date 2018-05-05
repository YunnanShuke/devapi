<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RegUserController extends Controller
{

    public function reg(Request $request){
        //解码微信小程序端传过来的值
        //users是一个用户的多个信息
        //$users['ID'] = $request -> input('ID');
        //$v_id = null = $request -> input('v_id');
        $sp_id = null = $request -> input('sp_id');
        //用户登录名
        $user_login = $request -> input('user_login');
        $user_passwd = md5($request -> input('user_passwd'));//对获取到的密码进行MD5加密
        $user_nicename = null = $request -> input('user_nicename');
        $user_email = null = $request -> input('user_email');
        $user_regdate = null = Carbon::now(); //获取当前时间戳
        $user_status = null = $request -> input('user_status');
        $user_vip_number = null = $request -> input('user_vip_number');
        $remark = null = $request -> input('remark');

        $check_login = DB::select("select * from users where user_login = '$user_login'");
        $check_nicename = DB::select("select * from users where user_nicename = '$user_nicename'");
        $check_email = DB::select("select * from users where '$user_email'");

        if(!$check_email && !$check_login && !$check_nicename){
            $result = DB::insert("insert into users(user_login,user_passwd,user_nicename,user_email,user_regdate) values ('$user_login','$user_passwd','$user_nicename','$user_email','$user_regdate')");
            if($result){
                echo '注册成功!';
            }else{
                echo '注册失败'.mysqli_error();
            }
        }else if($check_nicename){
            echo '昵称已存在，请更改昵称！';
        }else if($check_login){
            echo '账户已存在，请更改账号后重新注册！';
        }else if($check_email){
            echo '邮箱已使用，请更换邮箱注册！';
        }else{
            echo '未知错误，请联系DEVAPI接口开发者！';
        }

    }

}
