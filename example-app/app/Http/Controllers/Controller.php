<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Repositories\TestRepository;
use Illuminate\Http\Request;
use App\Services\HelloService;
use Illuminate\Support\Facades\App;
use Illuminate\Contracts\Foundation\Application;

class Controller extends BaseController
{
    public $cheers;
    public $app;
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
        echo $this->cheers->saluta($request->input("name")) . '<br>';
        echo $this->cheers->sayHello($request->input("name")) . '<br>';
        echo $this->cheers->sayBonjour($request->input("name")).'<br>';
        echo $this->salutaConHelloService($request->input("name"));
        echo $this->altroSaluto($request->input("name"));

    }

    public function salutaConHelloService(string $name)
    {
        App::bind('HelloService', function () {
            return new HelloService();
        });
        $helloServ = App::make("HelloService");
        return $helloServ->salutaInFrancese($name);
    }



}
