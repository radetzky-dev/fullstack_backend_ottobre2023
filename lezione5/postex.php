<html>
<body>
<h2>Post esempio</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  Scrivi il tuo nome: <input type="text" name="fname">
  Scrivi il tuo cognome: <input type="text" name="fsurname">
  <input type="submit">
</form>
<h2>Get esempio</h2>
<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  Messaggio: <input type="text" name="msg">
  <input type="submit">
</form>


<?php
if (    ["REQUEST_METHOD"] == "POST") {
    $name = $_POST['fname'];
    $surname = $_POST['fsurname'];
    if (empty($name)) {
        echo "<p>Devi inserire il nome!</p>";
    } else {
        echo "<p>Ciao " . ucfirst($name);
        if (!empty($surname)) {
            echo " " . ucfirst($surname);
        }
        echo "</p>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $msg = $_GET['msg'];
    if (!empty($msg)) {
        echo "<p>Messaggio ricevuto via GET $msg</p>";
    }
}
?>

</body>
</html>