<?php

namespace App\Http\Controllers\Verantwoordelijke;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VerantwoordelijkeController extends Controller
{
    public function index()
    {
        return view('Verantwoordelijke.index');
    }
}
