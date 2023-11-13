<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

// app > http > controllers > EmployeeController.php
class EmployeeController extends Controller
{
    public function getData()
    {
        $employees = Employee::paginate(10);


        return view('home', compact('employees'));
    }

    public function getDataQb()
    {

        $employees = DB::table('employees')->orderBy('lastname', 'asc')->paginate(10);

        return view('home', compact('employees'));
    }

}