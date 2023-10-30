<?php
// Leggi il file
$lines = file('link_info.txt');

// Inizializza le variabili
$stats = array();
$bookStats = array();

// Elabora ogni riga
foreach ($lines as $line) {
    // Estrapola i dati
    list($date, $time, $ip, $userAgent, $title) = explode(',', $line, 5);

    // Calcola la data in vari formati
    $day = date('Y-m-d', strtotime($date));
    $week = date('Y-\WW', strtotime($date));
    $month = date('Y-m', strtotime($date));
    $year = date('Y', strtotime($date));

    // Inizializza le chiavi dell'array se non esistono già
    if (!isset($stats[$day][$title])) {
        $stats[$day][$title] = 0;
        $bookStats[$title]['daily'] = 0;
        $bookStats[$title]['monthly'] = 0;
        $bookStats[$title]['annual'] = 0;
        $bookStats[$title]['total'] = 0;
    }
    if (!isset($stats[$day][$ip])) {
        $stats[$day][$ip] = 0;
    }
    if (!isset($stats[$day]['mobile'])) {
        $stats[$day]['mobile'] = 0;
    }
    if (!isset($stats[$day]['total'])) {
        $stats[$day]['total'] = 0;
    }

    // Aggiorna le statistiche
    $stats[$day][$title]++;
    $bookStats[$title]['daily']++;

    if ($month == date('Y-m')) {
        $bookStats[$title]['monthly']++;
    }
    
    if ($year == date('Y')) {
        $bookStats[$title]['annual']++;
    }

    $bookStats[$title]['total']++;

    // ... ripeti per settimana, mese e anno
}

// Visualizza le statistiche in una tabella HTML
echo '<table class="table">';
echo '<thead><tr><th>Data</th><th>Titolo</th><th>Utente</th><th>Mobile</th><th>Totale</th></tr></thead>';
echo '<tbody>';
foreach ($stats as $date => $data) {
    echo '<tr>';
    
    echo '<td>' . htmlspecialchars($date) . '</td>';
    
    foreach ($data as $key => $value) {
        if ($key != 'mobile' && $key != 'total') {
            echo '<td>' . htmlspecialchars($key) . '</td>';
            echo '<td>' . htmlspecialchars($value) . '</td>';
        }
        
        if ($key == 'mobile') {
            echo '<td>' . htmlspecialchars($value) . '</td>';
        }
        
        if ($key == 'total') {
            echo '<td>' . htmlspecialchars($value) . '</td>';
        }
        
        echo '</tr>';
    }
}
echo '</tbody>';
echo '</table>';

// Visualizza le statistiche dei libri in una tabella HTML separata
echo '<table class="table">';
echo '<thead><tr><th>Titolo</th><th>Giornaliero</th><th>Mensile</th><th>Annuale</th><th>Totale</th></tr></thead>';
echo '<tbody>';
foreach ($bookStats as $title => $data) {
    
    echo '<tr>';
    
    echo '<td>' . htmlspecialchars($title) . '</td>';
    
    echo '<td>' . htmlspecialchars($data['daily']) . '</td>';
    
    echo '<td>' . htmlspecialchars($data['monthly']) . '</td>';

    echo '<td>' . htmlspecialchars($data['annual']) . '</td>';

    echo '<td>' . htmlspecialchars($data['total']) . '</td>';

}
echo '</tbody>';
echo '</table>';

