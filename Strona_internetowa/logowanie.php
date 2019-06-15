<?php
session_start();
  require_once 'database.php';
//logged_id
if(!isset($_SESSION['zalogowany']))
{
  if(isset($_POST['email']))
  {
    $email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['haslo'];
    $password = htmlentities($password, ENT_QUOTES,"UTF-8");
  //  $password = password_hash($password,PASSWORD_DEFAULT);
  //  echo $haslo_hash;
    $hash = hash('sha256', $password);

    $userQuery = $db->prepare("SELECT Id_uzytkownika, Haslo, Czy_admin FROM uzytkownicy WHERE E_mail = '$email' AND Haslo = '$hash'");
    //echo $password." = Haslo     ".$email."  = Email    ";
    $userQuery->execute();
    //echo "</br> haslo = ".$password;

//weryfikacja hasła z formularza

 //if(password_verify($haslo,$userQuery['Haslo'])){
// if($password == $userQuery['Haslo'])
 //{
   if($user = $userQuery->fetch())
   {
     if($user['Czy_admin']==1)
     {
       $_SESSION['admin']=true;
     }

    if($user)
    {//logged_id
      $_SESSION['zalogowany'] = $user['Id_uzytkownika'];
      unset($_SESSION['bad_attempt']);
      header('Location: index.php');
      exit();
    }
    else
    {
      $_SESSION['bad_attempt'] = true;
      header('Location: logowanie.php');
      exit();
    }
  }
//}

}
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Opera i filharmonia</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="logowanie.css" type="text/css" rel="stylesheet">
</head>
<body>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <header> </header>
        <nav class="navbar justify-content-center navbar-expand-lg navbar-dark bg-dark">
                   <a class="navbar-brand" href="index.php">HOME</a>
                   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                   </button>
                   <div class="collapse navbar-collapse" id="navbarNav">
                     <ul class="navbar-nav">
                       <li class="nav-item active">
                         <a class="nav-link" href="repertuar.php">REPERTUAR</a>
                       </li>
                       <li class="nav-item">
                         <?php
                         if(isset($_SESSION['admin'])&&($_SESSION['admin']==true))
                          {
                            echo '<a class="nav-link" href="list.php">WIADOMOSCI OD USERA</a>';
                          }
                          else
                          {
                            echo '<a class="nav-link" href="kontakt.php">KONTAKT</a>';
                          }
                         ?>
                       </li>
                       <li class="nav-item">
                         <?php
                         if(isset($_SESSION['admin'])&&($_SESSION['admin']==true))
                          {
                            echo '<a class="nav-link" href="admin_repertuar.php">DODAJ REPERTUAR</a>';
                          }
                          else
                          {
                            if(!isset($_SESSION['zalogowany']))
                             {
                               echo '<a class="nav-link" href="rejestracja.php">REJESTRACJA</a>';
                             }
                          }
                         ?>
                       </li>
                       <li class="nav-item">
                         <?php
                         if(isset($_SESSION['zalogowany'])&&($_SESSION['zalogowany']==true))
                          {
                            echo '<a class="nav-link" href="logout.php">WYLOGUJ</a>';
                          }
                          else
                          {
                            echo '<a class="nav-link" href="logowanie.php">LOGOWANIE</a>';
                          }
                         ?>

                       </li>
                     </ul>
                   </div>
           </nav>
            <article>
                <section>
                  <div class="kontener">
                    <form id="login" method="post" action="logowanie.php">
                      <div class="head">
                        <h3>Zaloguj się</h3>
                        <p>Wypełnij poniższe pola, aby się zalogować</p>
                      </div>
                      <div class="inputs">
                        <input type="email" name="email" placeholder="Adres email"/>
                        <input type="password" name="haslo" value="Hasło" />
                        <input id="sub" type="submit" value="Zaloguj się">
                        <?php
                          if(isset($_SESSION['bad_attempt']))
                          {
                            echo '<p>Niepoprawny email lub hasło!</p>';
                            unset($_SESSION['bad_attempt']);
                          }
                        ?>
                      </div>
                    </form>
                  </div>

                </section>
            </article>
<aside></aside>
<footer>
    <h3>Karolina Szymańska</h3>
</footer>


</body>
</html>

<!--<?php
foreach ($_POST as $key => $value) {
  echo $key . ' = '.$value;
}
 ?>-->
