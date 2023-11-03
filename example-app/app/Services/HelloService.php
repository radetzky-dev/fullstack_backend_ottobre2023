<?php

namespace App\Services;


class HelloService
{

    public function sayCiao()
    {
        return "Ciao da HelloService";
    }

    /**
     * salutaInFrancese
     *
     * @param  mixed $name
     * @return string
     */
    public function salutaInFrancese($name): string
    {
        return "Bonjour avec HelloService $name";
    }
}