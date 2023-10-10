<html>

<head>
    <title>Files</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
    <?php
    //Vars
    $PATH_DIR = "data/";

    if (isset($_POST['filename'])) {
        $filename = $_POST['filename'];
    } else {
        $filename = "default.dat";
    }

    /**
     * writeContentIntoFile
     *
     * @param  mixed $fileNameWithPath
     * @param  mixed $content
     * @return bool
     */
    function writeContentIntoFile($fileNameWithPath, $content): bool
    {
        $action = "wb"; //crealo
        if (is_writable($fileNameWithPath)) {
            $action = "a"; //se esiste vado a scrivere in append
            $content = "\n" . $content;
        }

        if (!$fp = fopen($fileNameWithPath, $action)) {
            return false;
        }
        if (fwrite($fp, $content) === false) {
            return false;
        }
        fclose($fp);
        return true;
    }

    /**
     * readContentFile
     *
     * @param  mixed $fileNameWithPath
     * @return string
     */
    function readContentFile($fileNameWithPath): string
    {
        $content = "";

        if (!$myfile = fopen($fileNameWithPath, "r")) {
            return "";
        }
        $content = fread($myfile, filesize($fileNameWithPath));
        fclose($myfile);
        return $content;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {



        if (isset($_POST['delfile'])) {
            unlink($PATH_DIR . $filename);
            // echo "File $filename cancellato correttamente!<br>";
        }

        if (isset($_POST['testo'])) {
            $content = $_POST['testo'];
            //programma
            $result = writeContentIntoFile($PATH_DIR . $filename, $content);
        }
    }

    $content = readContentFile($PATH_DIR . $filename);
    ?>

    <div class="container">
        <h2>Scrittura di un file</h2>
        <div class="row">
            <div class="col">
                <div class="card" style="width: 25rem;">
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="form-group">
                            <label for="testo">Testo da salvare nel file</label>
                            <input type="text" class="form-control" id="testo" name="testo" placeholder="Testo"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="testo">Nome del file</label>
                            <input type="text" class="form-control" id="filename" name="filename"
                                value="<?php echo $filename; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="testo">Cancella file e crealo vuoto</label>
                            <input type="checkbox" class="form-check-input" id="delfile" name="delfile">
                        </div>

                        <div class="form-group">
                            <label for="testo">Cancella TUTTI i file</label>
                            <input type="checkbox" class="form-check-input" id="delallfiles" name="delallfiles">
                        </div>

                        <button type="submit" class="btn btn-primary">Inserisci testo</button>
                    </form>
                    <textarea class="form-control" id="showTesto" rows="15"><?php echo $content; ?></textarea>
                </div>
            </div>
        </div>
    </div>
</body>

</html>