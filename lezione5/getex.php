<html>
<body>
<h2>Esempio get</h2>
<?php
if (isset($_GET['msg'])) {
    echo "Ricevuto messaggio: " . $_GET['msg'] . "<br>";
}

if (isset($_GET['prova'])) {
    echo "Secondo parametro: " . $_GET['prova'] . "<br>";
}

?>
<a href="getex.php?msg=prova" alt="xxx">Invia richiesta get PROVA</a><br>
<a href="getex.php?msg=musa&prova=secondo" alt="xxx">Invia richiesta get MUSA con due parametri</a><br>
<a href="riceve.php?msg=ciao" alt="xxx" target="_blank">Invia richiesta get alla pagina riceve.php</a>

<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  Messaggio: <input type="text" name="msg">
  <input type="submit">
</form>

</body>
</html>