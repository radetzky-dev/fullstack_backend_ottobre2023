<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function show()
    {
        $professors = Professor::all();

        foreach ($professors as $professor) {
            echo $professor->id . ' ' . $professor->Name . ' ' . $professor->Subject . '<br>';
        }
        echo "<hr>";

        $professors = Professor::where('Name', '<>', 'test')
            ->orderBy('Name')
            ->take(10)
            ->get();


        foreach ($professors as $professor) {
            echo $professor->Name . ' ' . $professor->Subject . '<br>';
        }

    }

    public function getSingleProf($id)
    {
        $professors = Professor::find($id);

        if (is_null($professors)) {
            echo "Nessuna corrispondenza trovata<br>";
        } else {
            //serialize
            echo "<pre>";
            //  print_r($professors->toArray());
            echo "</pre>";

            echo "Professore " . $professors['Name'] . '<br>';
        }


    }

}
