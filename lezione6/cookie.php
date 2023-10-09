<?php
$cookie_name = "user";
$cookie_value = "John Doe";
//setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

$musa_cookie = "musa";
$musa_value = "sergio";
setcookie($musa_cookie, $musa_value, time() + (86400 * 30), "/"); // 86400 = 1 day

?>
<html>

<body>

    <?php


    if (!isset($_COOKIE[$musa_cookie])) {
        echo "Cookie named '" . $musa_cookie . "' is not set!";
    } else {
        echo "Cookie '" . $musa_cookie . "' is set!<br>";
        echo "<pre>";
        print_r($_COOKIE[$musa_cookie]);
        echo "</pre>";
    }

    if (!isset($_COOKIE[$cookie_name])) {
        echo "Cookie named '" . $cookie_name . "' is not set!";
    } else {
        echo "Cookie '" . $cookie_name . "' is set!<br>";
        echo "Value is: " . $_COOKIE[$cookie_name];

        echo "<br>Ora lo cancello....";
        setcookie($cookie_name, "", time()-3600);
     

    }


    echo "<pre>";
    print_r($_COOKIE);
    echo "</pre>";

    ?>

</body>

</html>