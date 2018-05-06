<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetUserVipController extends Controller
{
    //主函数
    public function getUserVips($start_id =  null,$stop_id =  null){
        if($start_id == null && $stop_id == null && is_int($start_id)){
            return $this->getCostom();
        }else if($start_id != null && $stop_id != null){
            return $this->getRange($start_id,$stop_id);
        }else if ($start_id != null && is_int($start_id) && $stop_id == null){
            return $this->getUserVipForID($start_id);
        }else if($start_id != null && is_string($start_id)){
            return $this->getUserVipForSpid($start_id);
        }
    }

    //获取所有用户信息
    public function getCostom(){
        return json_encode(DB::table('user_vip') -> get());
    }

    //根据ID获取会员信息
    public function getUserVipForID($start_id){
        return json_encode(DB::select("select * from user_vip where ID = '$start_id'"));
    }

    //根据ID范围查询会员信息
    public function getRange($start_id,$stop_id){
        return json_encode(DB::table('user_vip') -> where('ID','>',$start_id-1) -> where('ID','<',$stop_id+1) -> get());
    }

    //根据sp_id查询会员信息
    public function getUserVipForSpid($start_id){
        return json_encode(DB::table('user_vip') -> where('sp_id','=',$start_id));
    }
}
