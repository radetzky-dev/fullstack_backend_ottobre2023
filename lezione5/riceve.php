<?php
if (isset($_GET['msg']))
{
    echo "Ricevuto messaggio: " . $_GET['msg']."<br>";
    ?>
    <a href="getex.php?msg=risposta" alt="xxx">Invia una risposta a getex.php</a><br>
    <?php
} else
{
    echo "Nessun messaggio ricevuto";
}