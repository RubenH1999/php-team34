<?php

namespace App\Http\Controllers\Gebruiker;

use App\Artist;
use App\Festival;
use App\NewsItem;
use Facades\App\Helpers\Json;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomePageController extends Controller
{
    public function index()
    {
        $news = NewsItem::get();
        $festival = Festival::orderBy('start_date', 'desc')->first(); //selecteerd het festival met de hoogste startdatum


        $artists = Artist::get();               // get all employees
        $result=compact('news', 'festival',"artists");
        Json::dump($result);                    // open http://vinyl_shop.test/shop?json
        return view('home',$result);
    }
}
