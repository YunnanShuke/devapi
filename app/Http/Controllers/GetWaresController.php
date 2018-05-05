<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetWaresController extends Controller
{
    //
    public function getWares($start_id = null,$stop_id = null){
        if($start_id = null && $stop_id = null){
            return json_encode($this->getCostom());
        }else if($start_id != null){
            return json_encode($this->getWare($start_id));
        }else if($start_id != null &&$stop_id != null){
            return json_encode($this->getRange($start_id,$stop_id));
        }else{
            echo '安全链接传递的参数有误，请在云南数科科技技术部群询问详情！';
        }
    }

    public function getCostom(){
        return (DB::table('shop_mall') -> get());

    }

    public function getWare($start_id){
        return (DB::select("select * from shop_mall where ID = '$start_id'"));
    }

    public function getRange($start_id,$stop_id){
        return (DB::table('shop_mall') -> where('ID','>',$start_id -1) -> where('ID','<',$stop_id +1) -> get());
    }
}
