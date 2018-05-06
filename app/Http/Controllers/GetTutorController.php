<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetTutorController extends Controller
{
    //主函数
    public function getTutors($start_id = null,$stop_id = null){
        if($start_id == null && $stop_id == null || is_int($start_id)){
            return json_encode($this->getCostom());
        }else if($start_id != null && $stop_id != null){
            return json_encode($this->getRange($start_id,$stop_id));
        }else if($start_id != null && $stop_id == null){
            return json_encode($this->getTutorForID($start_id));
        }else if($start_id != null && $stop_id == null){
            return json_encode($this->getTutorForName($start_id));
        }else {
            return '接口调用失败！数据库提示信息:'.mysqli_error();
        }
    }

    //获取所有导师资料
    public function getCostom(){
        $tutos = DB::table('tutors') -> get();
        return json_encode($tutos);
    }

    //根据微信小程序上传的ID参数获取单个导师的资料
    public function getTutorForID($start_id){
        //$tutor = DB::table('tutors') -> where('ID','=',$start_id) -> get();
        $tutor = DB::select("select * from tutors where ID = '$start_id'");
        return json_encode($tutor);
    }

    /*//判断$start_id是否为name，使用name查询数据库中的导师信息
    public function getTutorForName($start_id){
        $tutor = DB::table('tutors') -> where('tutor_name','=',$start_id);
        return json_encode($tutor);
    }*/

    //根据微信小程序上传的两个参数就行范围查询
    public function getRange($start_id,$stop_id){
        $tutors = DB::table('tutors') -> where('ID','>',$start_id-1) -> where('ID','<',$stop_id+1) -> get();
        return json_encode($tutors);
    }
}
