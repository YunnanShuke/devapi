<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetBannerController extends Controller
{
    //
    public function getCostom(){
        $dbBanner = DB::table('banner_url') -> get();
        //dd($dbBanner);
        foreach ($dbBanner as $banner){
            $getBanner['url'] = $banner -> url;
            $getBanner['pos'] = $banner -> pos;
            $getBanner['remark'] = $banner -> remark;
        }
        return $getBanner;
    }

}
