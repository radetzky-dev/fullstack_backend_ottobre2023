<?php
echo "Cartelle di destinazione<br>";
print $_SERVER['SCRIPT_FILENAME'];
echo "<br>";
print $_SERVER['DOCUMENT_ROOT'];
echo "<br>";
echo getcwd() . "<br>";

print_r($_GET);
print_r($_POST);
echo "<pre>";
print_r($_FILES);
echo "</pre>";

if ($_SERVER['REQUEST_METHOD'] == 'POST'
    && array_key_exists('toProcess', $_FILES)) {
    $pathToFile = getcwd().'/assets/';

    if (is_uploaded_file($_FILES['toProcess']['tmp_name'])) {
        $fileName = $_FILES['toProcess']['name'];
        if (is_dir($pathToFile)) {
            move_uploaded_file($_FILES['toProcess']['tmp_name'], $pathToFile . $fileName);
        }
        echo "file caricato con successo qui ". $pathToFile."<br>";
    } else {
        echo "file non caricato";
    }
}

?>
<html>
<head>
	<title>File Upload</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>"
      enctype="multipart/form-data"
      method="POST">
<!--	<input type="hidden" name="MAX_FILE_SIZE" VALUE="10240">-->
    Name: <input type="text" name="name">
    File name: <input type="file" name="toProcess">
	<input type="submit" value="Upload">
</form>
</body>
</html>