<html>

<head>
    <title>Files</title>
</head>

<body>
    <h2>Scrittura di un file</h2>

    <?php
    $PATH_DIR = "data/";
    $somecontent = "Add this xxxx to the file\n";
    $filename = 'numbers.dat';


    // Let's make sure the file exists and is writable first.
    if (is_writable($PATH_DIR . $filename)) {
        if (!$fp = fopen($PATH_DIR . $filename, 'wb')) {
            echo "Cannot open file ($filename)";
            exit;
        }

        // Write $somecontent to our opened file.
        if (fwrite($fp, $somecontent) === false) {
            echo "Cannot write to file ($filename)";
            exit;
        }
        echo "Success, wrote ($somecontent) to file ($filename)";
        fclose($fp);

    } else {
        echo "The file $filename is not writable on not exists.";
        $f = fopen($PATH_DIR.$filename, 'wb');
        if (!$f) {
            die('Error creating the file ' . $PATH_DIR.$filename);
        }
        echo "File created successfully $filename";
        fclose($f);
    }
    ?>
</body>

</html>