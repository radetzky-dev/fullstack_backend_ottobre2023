<?php

namespace App\Http\Controllers;

use App\Services\CreateReportService;

use Illuminate\Http\Request;

class SingleServer extends Controller
{
    public $report;

    public function __construct(
        CreateReportService $report,
    ) {
        $this->report = $report;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        echo "Eseguo tutte le operazioni...<br>";
        echo $this->report->createReport("Ciao mondo!");

    }
}
