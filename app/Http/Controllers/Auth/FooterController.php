<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FooterController extends Controller
{

    public static function displayfooter($ontwikkelaar, $tester)
    {
        $teamleden = array(
            array(1,'David van Dongen' ),
            array(2,'Bram Vermeulen' ),
            array(3,'Henri Van Rooy' ),
            array(4,'Ruben Horemans' )
        );

        $stringbuilder = "- ";

        for ($i =0; $i < count($teamleden); $i++)
        {
            if ($teamleden[$i][0] == $ontwikkelaar)
            {
                $stringbuilder .= "O:" . $teamleden[$i][1] . " - ";
            }
            elseif($teamleden[$i][0] == $tester)
            {
                $stringbuilder .= "T:" . $teamleden[$i][1] . " - ";
            }
            else
            {
                $stringbuilder .= $teamleden[$i][1] . " - ";
            }
        }

        return $stringbuilder;
    }
}
