<?php
try{
    $id = $_GET['id'];

  $dsn = 'mysql:dbname=zwerzeta;host=127.0.0.1';
  $user = 'root';
  $password = '';
  $db = new PDO($dsn, $user, $password);


  $sth = $db->prepare('DELETE FROM zwierzeta_domowe WHERE id = :id');
  $sth->bindValue(':id', $id, PDO::PARAM_INT);

  if($sth->execute())
  echo "usuniete";
  else echo "brak";

catch (PDOException $e) {
    echo 'Connection failed';
}
?>
