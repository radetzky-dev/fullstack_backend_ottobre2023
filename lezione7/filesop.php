<html>

<head>
    <title>Files</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

</head>

<body>

    <div class="container">
    <h2>Scrittura di un file</h2>
        <div class="row">
            <div class="col">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group">
                        <label for="testo">Testo da salvare nel file</label>
                        <input type="text" class="form-control" id="testo" name="testo" placeholder="Testo" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>


    <?php

    /**
     * writeContentIntoFile
     *
     * @param  mixed $fileNameWithPath
     * @param  mixed $content
     * @return bool
     */
    function writeContentIntoFile($fileNameWithPath, $content): bool
    {
        if (!$fp = fopen($fileNameWithPath, 'wb')) {
            return false;
        }
        if (fwrite($fp, $content) === false) {
            return false;
        }
        fclose($fp);
        return true;
    }

    //params
    $PATH_DIR = "data/";
    $somecontent = "Add this xxxx to the file\n";
    $filename = 'numbers.dat';

    //programma
    $result = writeContentIntoFile($PATH_DIR . $filename, $somecontent);

    if (!$result) {
        echo "Errore nella scrittura \ lettura del file: $PATH_DIR$filename!<br>";
    } else {
        echo "Success, wrote ($somecontent) to file ($PATH_DIR$filename)";
    }

    ?>
</body>

</html>