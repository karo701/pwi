<?php
try{
      $dsn = 'mysql:dbname=zwerzeta;host=127.0.0.1';
      $user = 'root';
      $password = '';
      $db = new PDO($dsn, $user, $password);

$dbh->exec("SELECT nazwa, wiek FROM zwierzeta_domowe");
foreach($db->query($dbh) as $row) {
        print $row['gatunek']."\n";
        print $row['nazwa']."\n";
      }
      catch (PDOException $e) {
          echo 'Connection failed';
      }
?>
