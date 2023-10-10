<html>

<head>
    <title>Files</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
    <?php
    //Vars
    $PATH_DIR = "data/";

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

    ?>

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
                <textarea class="form-control" id="showTesto" rows="3"></textarea>
            </div>
        </div>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $filename = 'numbers.dat';
            if (isset($_POST['testo'])) {
                $content = $_POST['testo'];
                //programma
                $result = writeContentIntoFile($PATH_DIR . $filename, $content);

                if (!$result) {
                    echo "<p>Errore nella scrittura \ lettura del file: $PATH_DIR$filename!</p>";
                } else {
                    echo "<p>Success, wrote ($content) to file ($PATH_DIR$filename)</p>";
                }
            }

            $content = "";
            $myfile = fopen($PATH_DIR . $filename, "r") or die("<p>Unable to open file!</p>");
            $content= fread($myfile,filesize($PATH_DIR . $filename));
            fclose($myfile);

            echo "<pre>$content</pre>";


        }
        ?>

    </div>



</body>

</html>