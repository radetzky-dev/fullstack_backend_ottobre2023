<?php

namespace App\Services;

//Per usarla lanciare prima: composer require mpdf/mpdf

class CreateReportService
{

    public function createReport(string $text)
    {
        $mpdf = new \Mpdf\Mpdf(['tempDir' => storage_path('mpdf')]);
        $mpdf->WriteHTML('<h1>' . $text . '</h1>');
        return $mpdf->Output();

    }

}