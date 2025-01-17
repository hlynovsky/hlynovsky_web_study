<?php

    function pdoConnectDB(){
        $servername = "localhost";
        $username = "restserver_ru";
        $password = "123456";
        $dbname = "restserver_ru";
        
        $conn = new PDO ("mysql:host=$servername;dbname=$dbname", $username, $password);
        return $conn;
    }
?>