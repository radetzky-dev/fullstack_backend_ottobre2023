<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Repositories\TestRepository;
use Illuminate\Http\Request;
use App\Services\HelloService;
use Illuminate\Support\Facades\App;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Log;

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
        $message = "creo una riga nel log";
        Log::debug($message);
        echo "<b>Test</b> dal controller!";
        Log::info("Caricata rotta testRoute");



        $myNumber = 10;
        $division = 0;

        try {
            if ($division == 0) {
                throw new \Exception("Division by zero");
            }

            $result = $myNumber / $division;
            Log::debug($result);
            echo "Risultato $result<br>";
        } catch (\Exception $e) {
            Log::error("Ho gestito l'errore! Errore descrizione: " . $e->getMessage());
        }




        echo "<br>Operazione conclusa<br>";

    }

    public function saluta(Request $request)
    {
        echo $this->cheers->saluta($request->input("name")) . '<br>';
        echo $this->cheers->sayHello($request->input("name")) . '<br>';
        echo $this->cheers->sayBonjour($request->input("name")) . '<br>';
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
