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

        //Professor::findOrFail($id);

        $professors = Professor::where('Hours', '>', 25)->get();

        echo "<pre>";
        // print_r($professors->toArray());
        echo "</pre>";

        echo "Professori con più di 25 ore<br>";

        foreach ($professors as $professor) {
            echo $professor['Name'] . ' ' . $professor['Hours'] . '<br>';
        }


        echo "Professore con id di $id<br>";
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
