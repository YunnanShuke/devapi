<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetUserController extends Controller
{

    public function getCostom(string $name = null,int $id = null){
        /*
     * 预留自定义获取用户信息
     * @$name
     * @$id
     *
     */
        //$getName = $this->getName('sixos',null);
        //echo $getName['name'];
        var_dump($this->getUser(1,'all'));
    }
    //这是一个获取用户数据的API
    public function getUser($id,$type){
        $getType = $type;
        $user = Db::select("select * from users where id = $id");
        foreach ($user as $getUser) {
            $users['id'] = $getUser -> ID;
            $users['v_id'] = $getUser -> v_id;
            $users['sp_id'] = $getUser -> sp_id;
            $users['user_login'] = $getUser -> user_login;
            $users['user_passwd'] = $getUser -> user_passwd;
            $users['user_nicename'] = $getUser -> user_nicename;
            $users['user_email'] = $getUser -> user_email;
            $users['user_regdate'] = $getUser -> user_regdate;
            $users['user_status'] = $getUser -> user_status;
            $users['user_vip_number'] = $getUser -> user_vip_number;
            $users['remark'] = $getUser -> remark;
        }
        if($getType == 'all'){
            return $users;
        }else{
            switch ($getType){
                case 'id':
                    return $users['id'];
                    break;
                case 'v_id':
                    return $users['v_id'];
                    break;
                case 'sp_id':
                    return $users['sp_id'];
                    break;
                case 'login':
                    return $users['user_login'];
                    break;
                case 'passwd':
                    return $users['user_passwd'];
                    break;
                case 'nicename':
                    return $users['user_nicename'];
                    break;
                case 'email':
                    return $users['user_email'];
                    break;
                case 'regdate':
                    return $users['user_regdate'];
                    break;
                case 'status':
                    return $users['user_status'];
                    break;
                case 'number':
                    return $users['user_vip_number'];
                    break;
                case 'remark':
                    return $users['remark'];
                    break;
            }
        }

    }
    /*
     * 返回参数列表
     * success['message'] = 0,get请求的参数为空
     * success['message'] = 1,成功请求到用户信息
     * success['message'] = 2,成功获取到参数，但是获取用户信息失败
     */
    public function getName(string $login = null,int $id = null){
        $getLogin = $login;
        $getId = $id;
        if($getId == null && $getLogin == null){
            return $success['message'] = 0;
        }else if($getLogin == null){
            $userName = Db::select("select user_nicename from users where id = $getId");
            foreach ($userName as $name) {
                $success['message'] = 1;
                $success['name'] = $name -> user_nicename;
                return $success; //返回一个名称数组
            }
        }else {
            $userName = Db::select("select user_nicename from users where user_login = '$getLogin'");
            foreach ($userName as $name) {
                $success['message'] = 1;
                $success['name'] = $name->user_nicename;
                return $success;
            }
        }
    }
}
