<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{

    public function showAllqb()
    {
        //query builder
        $student = DB::table('students')->get();
        return view('index', compact('student'));
    }

    public function getMail($name)
    {
        $user = DB::table('students')->where('name', $name)->first();
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
        $student = DB::table('students')->find($id);

        foreach ($student as $student) {
            echo $student . ' ';
        }

    }

    public function showOnlyMails()
    {
        $emails = DB::table('students')->pluck('email');
        foreach ($emails as $email) {
            echo $email . '<br>';
        }

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
}