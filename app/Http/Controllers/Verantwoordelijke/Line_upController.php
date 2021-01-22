<?php

namespace App\Http\Controllers\Verantwoordelijke;

use App\Performance;
use Facades\App\Helpers\Json;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Line_upController extends Controller
{
    public function index()
    {

    }

    public function show($id)
    {
        return "Details for record $id";
    }

    public function create()
    {

    }

}
