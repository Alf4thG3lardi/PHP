<?php 
    $cookie_name = 'user';
    $cookie_value = 'myself';
    setcookie($cookie_name, $cookie_value);

    echo $_COOKIE[$cookie_name];

    $cookie_value = 'else';
    setcookie($cookie_name, $cookie_value);

    echo $_COOKIE[$cookie_value];
    
    setcookie("user", NULL, time() - 3600);

    var_dump($_COOKIE);

?>