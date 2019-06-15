<?php
try{
	  $dsn = 'mysql:dbname=opera;host=127.0.0.1';
    $user = 'root';
    $password = '';
    $db = new PDO($dsn, $user, $password);
	}
	catch(PDOException $error){
		exist('Database error');
	}
?>
