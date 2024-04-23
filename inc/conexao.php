<?php
    function connect(){
        $BD_HOST = 'localhost';
        $BD_USER = 'root';
        $BD_PASS = '';
        $BD_NAME = 'banco';

        try {
            return new PDO("mysql:dbname=" . $BD_NAME . ";charset=utf8;host=" . $BD_HOST, $BD_USER, $BD_PASS);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
?>