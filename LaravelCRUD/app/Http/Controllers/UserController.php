<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\CreateReportService;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public $report;

    public function __construct(
        CreateReportService $report,
    ) {
        $this->report = $report;
    }

    public function show(string $id)
    {
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ]);
    }

    public function index()
    {

        $users = User::all();
        return view('user.index', compact('users'));

        // $data['users'] = User::orderBy('name', 'ASC');

        // return view('user.index', $data);
    }

    public function exportUserPdf()
    {
        $users = User::all();
        $this->report->createUsersReport($users);

    }

}
