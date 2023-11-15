<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{

    public function showAllqb()
    {
        //query builder
        $student = DB::table('students')->orderBy('name')->get();
        return view('index', compact('student'));
    }

    public function getMail($name)
    {
        Log::debug("Arrivata richiesta con nome $name");
        $user = DB::table('students')->where('name', $name)->first();

        if (is_null($user)) {
            Log::error("Nessuna mail corrispondente per  " . $name);
            return "";
        }
        //  Log::debug("Utente corrispondente " . $user);
        return $user->email;
    }


    public function getExtraMail($name, $pwd)
    {
        $user = DB::table('students')->where('name', $name)->where('password', $pwd)->first();

        if ($user) {
            return $user->email;
        } else {
            return "No result";
        }
    }

    public function findById($id)
    {

        if (DB::table('students')->where('id', $id)->exists()) {
            $student = DB::table('students')->find($id);
            foreach ($student as $student) {
                echo $student . ' ';
            }
        } else {
            echo "Non esiste nessun studente con id $id<br>";
        }


    }

    public function showOnlyMails()
    {

        $conta = DB::table('students')->count();

        echo "Le mail sono $conta<br>";

        $emails = DB::table('students')->pluck('email');
        foreach ($emails as $email) {
            echo $email . '<br>';
        }

        echo "<hr>";

        $students = DB::table('students')
            ->select('name', 'email as user_email')
            ->get();

        foreach ($students as $student) {
            echo $student->user_email . '<br>';
        }

    }

    public function cerca(Request $request)
    {
        $student = DB::table('students')
            ->where('name', 'like', '%' . $request->input("name") . '%')
            ->get()->dump();


        return view('index', compact('student'));
    }



    public function showAll()
    {
        $student = DB::select('select * from students');
        return view('index', compact('student'));
    }

    public function showOne(string $name)
    {
        $student = DB::select('select * from students where name = ?', [$name]);

        return view('index', compact('student'));
    }

    public function showOneName(string $name, string $pwd)
    {
        $student = DB::select('select * from students where name = :name and password = :password', ['name' => $name, 'password' => $pwd]);

        return view('index', compact('student'));
    }

    public function updatePwd(string $name, string $newPwd)
    {
        DB::update(
            'update students set password = "' . $newPwd . '" where name = ?',
            [$name]
        );
        return $this->showAll();
    }

    public function updateDelete(string $name, string $newPwd, string $deleteName)
    {

        DB::transaction(function () use ($name, $newPwd, $deleteName) {
            DB::update(
                'update students set password = "' . $newPwd . '" where name = ?',
                [$name]
            );

            DB::delete('delete from students where name = ?', [$deleteName]);
        });


        return $this->showAll();
    }




    public function index()
    {
        $student = Student::all();
        return view('index', compact('student'));
        // ['student' => $student]
    }


    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* estrapolare singoli valori
        $params = $request->all();
        echo $params['name'];
        */

        $storeData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|numeric',
            'password' => 'required|max:255',
        ]);

        Student::create($storeData);

        return redirect('/students')->with('success', 'Student has been saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|numeric',
            'password' => 'required|max:255',
        ]);
        Student::whereId($id)->update($updateData);
        return redirect('/students')->with('success', 'Student has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect('/students')->with('success', 'Student has been deleted');
    }

    public function showComments($id)
    {
        $student = Student::find($id);
        $comments = $student->comment;

        return view('comments', compact('comments'));
    }

    public function store_comment()
    {

        $student = Student::find(3);

        $comment = new Comment;
        $comment->student_id = $student->id;
        $comment->comment = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the indust';
        $comment->save();

        $comment = new Comment;
        $comment->student_id = $student->id;
        $comment->comment = 'king it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydne';
        $comment->save();

        $comment = new Comment;
        $comment->student_id = $student->id;
        $comment->comment = 'ed to be sure there isnt anything embarrassing hidden in the middle of text. All the Latin words,';
        $comment->save();

        dd($comment);
    }
}