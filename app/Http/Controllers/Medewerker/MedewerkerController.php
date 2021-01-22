<?php

namespace App\Http\Controllers\Medewerker;

use App\Festival;
use App\NewsItem;
use Facades\App\Helpers\Json;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MedewerkerController extends Controller
{
    public function index(Request $request)
    {
        $news = NewsItem::get();
        $festival = Festival::find(1);
        $result=compact('news', 'festival');
        return view('medewerker.index', $result);
    }
}
