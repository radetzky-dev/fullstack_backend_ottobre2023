<?php

//VARS
$pathData = "data/prodotti.json";

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

    if (!$fp = fopen($fileNameWithPath, $action)) {
        return false;
    }
    if (fwrite($fp, $content) === false) {
        return false;
    }
    fclose($fp);
    echo "File aggiornamto correttamente!<br>";
    return true;
}