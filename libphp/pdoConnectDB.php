<?php

    function pdoConnectDB(){
        $servername = "localhost";
        $username = "minyazev_ru";
        $password = "123456";
        $dbname = "minyazev_ru";
        
        $conn = new PDO ("mysql:host=$servername;dbname=$dbname", $username, $password);
        return $conn;
    }
?>