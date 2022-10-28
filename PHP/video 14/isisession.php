<?php 
    session_start();
    echo $_SESSION['user'];
    echo '<br>';
    echo $_SESSION['username'];
    echo '<br>';
    echo $_SESSION['emailaddress'];
    echo '<br>';
    foreach ($_SESSION as $key => $value) {
        echo "$key => $value <br>";
    }
?>