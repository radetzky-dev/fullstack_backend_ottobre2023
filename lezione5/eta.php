<html>
   <body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "POST case<br>";
    if ($_POST["name"] || $_POST["age"]) {
        if (preg_match("/[^A-Za-z'-]/", $_POST['name'])) {
            echo "Hai inserito dei caratteri non validi!";
        } else {
            echo "Welcome " . $_POST['name'] . "<br />";
            echo "You are " . $_POST['age'] . " years old.";
        }

    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    echo "GET case<br>";
    if (!empty($_GET["name"]) && !empty($_GET["age"])) {
        if ($_GET["name"] || $_GET["age"]) {
            echo "Welcome " . $_GET['name'] . "<br />";
            echo "You are " . $_GET['age'] . " years old.";
        }
    }

}
?>

    <h2>con post</h2>
      <form action = "<?php $_PHP_SELF?>" method = "POST">
         Name: <input type = "text" name = "name" />
         Age: <input type = "text" name = "age" />
         <input type = "submit" />
      </form>

      <h2>con get</h2>
      <form action = "<?php $_PHP_SELF?>" method = "GET">
         Name: <input type = "text" name = "name" />
         Age: <input type = "text" name = "age" />
         <input type = "submit" />
      </form>