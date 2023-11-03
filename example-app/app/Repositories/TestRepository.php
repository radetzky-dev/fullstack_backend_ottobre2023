<?php

namespace App\Repositories;

class TestRepository
{
   
    public function saluta(string $name)
    {
            return "Ciao $name";
    }

    public function sayHello(string $name)
    {
            return "Hello, $name";
    }

    public function sayBonjour(string $name)
    {
        return "Bonjour, $name!";
    }

}
