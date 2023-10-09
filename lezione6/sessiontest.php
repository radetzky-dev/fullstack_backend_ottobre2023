<?php

session_start();
if (!isset($_SESSION['count'])) {
  $_SESSION['count'] = 0;
  echo "Sessione inizia ora ".$_SESSION['count']." <br>";
  $_SESSION['nome'] ="Musa";
} else {
  $_SESSION['count']++;
  echo "Hai visitato questa pagina ".$_SESSION['count']."volte<br>";
  echo "Nome ".$_SESSION['nome']."<br>";

    if ($_SESSION['count'] >4)
    {
        echo "distruggo la sessione!";
        session_destroy();
    }

}


