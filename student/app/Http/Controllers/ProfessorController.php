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
            echo $professor->Name . ' ' . $professor->Subject . '<br>';
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
}
