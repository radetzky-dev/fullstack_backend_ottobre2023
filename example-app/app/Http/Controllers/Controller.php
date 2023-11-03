<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Repositories\TestRepository;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    public $cheers;
    public function __construct(
        TestRepository $cheers,
    ) {
        $this->cheers = $cheers;
    }

    public function testRoute()
    {
        echo "<b>Test</b> dal controller!";
    }

    public function saluta(Request $request)
    {
        echo $this->cheers->saluta($request->input("name")).'<br>';
        echo $this->cheers->sayHello($request->input("name"));
        
    }

}
