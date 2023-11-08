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

    public function createUsersReport($users)
    {
        $lista = "<h1>Lista Utenti</h1><p>NOME    |   EMAIL</p>";
        foreach ($users as $user) {
            $lista = $lista . $user['name'] . "    " . $user['email'] . '<br>';
        }
        $mpdf = new \Mpdf\Mpdf(['tempDir' => storage_path('mpdf')]);
        $mpdf->WriteHTML($lista);
        return $mpdf->Output();
    }

}