<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tecnoalhambra_definitiva";
    $mysqli = new mysqli($server, $username, $password, $dbname);
    if($mysqli->connect_errno){
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
?>
