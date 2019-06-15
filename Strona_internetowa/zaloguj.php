<?php
session_start();
  require_once 'database.php';

if(!isset($_SESSION['logged_id'])){
  if(isset($_POST['email'])){

    $_SESSION['zalogowany']=true;

    $email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['haslo'];

  $userQuery = $db->query("SELECT Id_uzytkownika, Haslo FROM uzytkownicy WHERE E_mail = '$email' AND Haslo = '$password'");
  $user = $userQuery->fetch();

  if($user){
    $_SESSION['logged_id'] = $user['Id_uzytkownika'];
    unset($_SESSION['bad_attempt']);
  }
    else {
      $_SESSION['bad_attempt'] = true;
      header('Location: logowanie.php');
      exit();
    }
  }
  else {
    header('Location: logowanie.php');
    exit();
  }
}
$usersQuery = $db->query('SELECT * FROM uzytkownicy');
$users = $usersQuery->fetchAll();

?>
