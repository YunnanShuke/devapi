<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetNewsController extends Controller
{
    //
    public function getCostom(){
        $news = DB::table('news') -> get();
        foreach ($news as $New){
            $getNews['ID'] = $New -> ID;
            $getNews['news_title'] = $New -> news_title;
            $getNews['news_pic'] = $New -> news_pic;
            $getNews['news_content'] = $New -> news_content;
            $getNews['news_date'] = $New -> news_date;
            $getNews['remark'] = $New -> remark;
        }
        return json_encode($getNews);
    }
}
