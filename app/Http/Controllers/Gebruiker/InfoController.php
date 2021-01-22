<?php

namespace App\Http\Controllers\Gebruiker;

use App\Info;
use Facades\App\Helpers\Json;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InfoController extends Controller
{
    public function index()
    {
        $info = Info::get();
        $result = compact('info');
        Json::dump($result);

        return view('gebruiker.info.index',$result);
    }
}
