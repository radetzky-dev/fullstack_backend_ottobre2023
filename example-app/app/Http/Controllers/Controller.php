<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function testRoute()
    {
        echo "<b>Test</b> dal controller!";
    }

    public function saluta(Request $request)
    {
            echo "Saluta";
    }

}
