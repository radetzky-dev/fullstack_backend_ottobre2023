<?php
$siteTitle = "Benvenuto nella mia pagina";
$name = "Paolo";
$myName = "dhjsdf";
?>
<!DOCTYPE html>
<html lang="ita">

<head>
    <title><?php echo $siteTitle . ' ' . $name; ?></title>
</head>
<body>
    <h2>Titolo</h2>
<p>
        TIME: <?php echo date('H:i'); ?> <br>DAY <?php echo date('d/m/Y'); ?>
<table>
            <tr><td><img src="assets/dolce1.jpg" alt="image"></td><td></td><td></td></tr>
</table>
    </p>
    <script>
        my_name="<?php echo $name; ?>";
        alert("Ciao "+my_name);
    </script>

</body>
</html>