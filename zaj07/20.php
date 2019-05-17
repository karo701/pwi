<?php
try{
    $dsn = 'mysql:dbname=zwerzeta;host=127.0.0.1';
    $user = 'root';
    $password = '';
    $db = new PDO($dsn, $user, $password);
$db->exec("UPDATE zwierzeta_domowe set nazwa='reksio' where id=3");
    }

catch (PDOException $e) {
    echo 'Connection failed';
}

?>
