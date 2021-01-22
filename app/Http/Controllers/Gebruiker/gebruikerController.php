<?php

namespace App\Http\Controllers\Gebruiker;

use App\Festival;
use App\NewsItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class gebruikerController extends Controller
{
    public function index(Request $request)
    {
        $news = NewsItem::get();
        $festival = Festival::find(1);
        $result=compact('news', 'festival');
        return view('Gebruiker.index', $result);
    }
}
