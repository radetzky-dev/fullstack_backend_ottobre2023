<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class ProfessorController extends Controller
{

    public function create()
    {
        return view('prof.create');
    }

    public function index()
    {
        $prof = Professor::all();
        return view('prof.index', compact('prof'));
    }

    public function destroy($id)
    {
        /*  $prof = Professor::findOrFail($id);
          $prof->delete(); */

        Professor::destroy($id);

        return redirect('/showprofessore')->with('success', 'Prof has been deleted');
    }


    public function store(Request $request)
    {
        //echo $request->input("Name");
        //echo '<br>' . $request->input("Subject");

        $storeData = $request->validate([
            'Name' => 'required|max:50',
            'Subject' => 'required|max:50',
            'Hours' => 'numeric',
            'Room' => 'max:4',
        ]);

        // dd($storeData);


        /*
        $prof = new Professor;
        $prof->Name = $request->input("Name");
        $prof->Subject = $request->input("Subject");
        $prof->save();
        */


        Professor::create($storeData);

        return redirect('/showprofessore')->with('success', 'Professor has been saved!');

    }

    public function show()
    {
        $num = Professor::all()->count();

        echo "I professori sono $num <br><br>";

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

        Professor::firstOrCreate([
            'Name' => 'Maria',
            'Subject' => 'Storia',
            'Hours' => 81,
            'Room' => "56f"

        ]);
        //Professor::findOrFail($id);
        $professors = Professor::where('Hours', '>', 25)->get();

        echo "<pre>";
        // print_r($professors->toArray());
        echo "</pre>";

        echo "Professori con più di 25 ore<br>";

        foreach ($professors as $professor) {
            echo $professor['Name'] . ' ' . $professor['Hours'] . '<br>';
        }

        echo "<br>Professore con id $id<br>";
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




    public function searchMail()
    {
        return view('prof.search');
    }

    public function resultMail(Request $request)
    {
        try {
            $professor = Professor::findOrFail($request->input('prof_id'));
        } catch (ModelNotFoundException $exception) {
            Log::warning("Il professore con id " . $request->input('prof_id') . ' non è stato trovato');
            return back()->withError('Attenzion ID non trovato!')->withInput();
        }
        return view('prof.materia', compact('professor'));
    }

}
