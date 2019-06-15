<?php
session_start();
require_once 'database.php';

if(isset($_POST['email']))
{
    //udana walidacja, zakładamy, że Tak
    $wszystko_OK=true;

    //Sprawdzenie Imie
    $imie = $_POST['imie'];

    // Sprawdzenie długości imienia
    if((strlen($imie)<3)||(strlen($imie)>20))
    {
      $wszystko_OK=false;
      $_SESSION['e_imie'] = "Imie musi posiadać od 3 do 20 znaków!";
    }

    //Sprawdzanie nazwiska
    $nazwisko = $_POST['naz'];
    if((strlen($nazwisko)<3)||(strlen($nazwisko)>20))
    {
      $wszystko_OK=false;
      $_SESSION['e_naz'] = "Nazwisko musi posiadać od 3 do 20 znaków!";
    }

    //Sprawdzanie poprawności hasła
    $haslo = $_POST['haslo'];
    if((strlen($haslo)<8)||(strlen($haslo)>20))
    {
      $wszystko_OK=false;
      $_SESSION['e_haslo'] = "Hasło musi posiadać od 8 do 20 znaków!";
    }
    //$haslo_hash = password_hash($haslo,PASSWORD_DEFAULT);
      $hash_hash = hash('sha256', $haslo);

    //Plec
    $plec = $_POST['plec'];
    //if by
  /*  if(empty($plec))
    {
      $wszystko_OK=false;
      $_SESSION['e_plec'] = "Podaj płeć";
    }*/

    //Plus_info
    $plus = $_POST['opis'];

    //Adres
    $adres = $_POST['adres'];
    if(empty($adres))
    {
      $wszystko_OK=false;
      $_SESSION['e_adres'] = "Podaj swój adres";
    }

    //Kraj
    $kraj = $_POST['kraj'];
    if($kraj=="domyslny")
    {
      $wszystko_OK=false;
      $_SESSION['e_kraj'] = "Wybierz kraj, z którego pochodzisz";
    }

    //Kod_pocztowy
    $kod = $_POST['kod'];
    if(empty($kod))
    {
      $wszystko_OK=false;
      $_SESSION['e_kod'] = "Podaj kod pocztowy";
    }

    //Sprawdz email;
    $email = $_POST['email'];
    $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

    if((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false)||($emailB!=$email))
    {
      $wszystko_OK=false;
      $_SESSION['e_email']="Podaj poprawny adres e-mail";
    }

    if($wszystko_OK==true)
    {
      try
      {
        $sql2 = "INSERT INTO adres(Adres, Kraj, Kod_pocztowy) VALUES ('$adres', '$kraj','$kod')";
        $db->exec($sql2);
        $idd = $db->lastInsertId();
      }
    catch(PDOException $error){
      //  $_SESSION['r'] = $error;
      exist('Adresy');
    }

    try
    {
       $sql0 = "INSERT INTO uzytkownicy(Imie, Nazwisko, Haslo, E_mail, Plec, Plus_info, Czy_admin, Id_repertuaru, Id_adresu)
       VALUES                         ('$imie', '$nazwisko','$hash_hash','$email','$plec','$plus',0,NULL,$idd)";
       $db->exec($sql0);
    }
    catch(PDOException $error)
    {
      $_SESSION['rror'] = $error;
      exist('Daufdds');
    }
      //$_SESSION['udane'] ='Twoja rejestracja przebiegła pomyślnie, możesz się zalogować';
      // wszystko jest okej, dodajemy użytkownika
      header('Location: logowanie.php');
      exit();

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
    <link href="rejestracja.css" type="text/css" rel="stylesheet">
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
                  <!--<div="formula"> -->
                  <div>
                  <br>
                  <h1>Formularz rejestracyjny</h1>
                  <!--<?php echo $_SESSION['r'];?>-->
                    <p>Użyj klawisza TAB do przemieszczania się między polami</p>
                    <form method="post" name="rejestracja">

                		<label>Imie</label>
                		<input type="text" name="imie"/>
                  <?php
                       if(isset($_SESSION['e_imie']))
                       {
                         echo '<div class="error">'.$_SESSION['e_imie'].'</div>';
                          unset($_SESSION['e_imie']);
                       }
                     ?>
                    <label>Nazwisko:</label>
                    <input type="text" name="naz"/>
                    <?php
                         if(isset($_SESSION['e_naz']))
                         {
                           echo '<div class="error">'.$_SESSION['e_naz'].'</div>';
                            unset($_SESSION['e_naz']);
                         }
                       ?>
                		<label>Hasło:</label>
                		<input type="password" name="haslo"/>
                    <?php
                         if(isset($_SESSION['e_haslo']))
                         {
                           echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
                            unset($_SESSION['e_haslo']);
                         }
                       ?>
                		<label>Adres:</label>
                		<input type="text" name="adres"/>
                    <?php
                         if(isset($_SESSION['e_adres']))
                         {
                           echo '<div class="error">'.$_SESSION['e_adres'].'</div>';
                            unset($_SESSION['e_adres']);
                         }
                       ?>
                		<label>Kraj:</label>
                		<select name="kraj">
                			<option selected="" value="domyslny">(Wybierz kraj)</option>
                			<option value="NI">Niemcy</option>
                			<option value="PO">Polska</option>
                		</select>
                    <?php
                         if(isset($_SESSION['e_kraj']))
                         {
                           echo '<div class="error">'.$_SESSION['e_kraj'].'</div>';
                            unset($_SESSION['e_kraj']);
                         }
                       ?>
                		<label>Kod pocztowy:</label>
                		<input type="text" name="kod" />
                    <?php
                         if(isset($_SESSION['e_kod']))
                         {
                           echo '<div class="error">'.$_SESSION['e_kod'].'</div>';
                            unset($_SESSION['e_kod']);
                         }
                       ?>
                		<label>E-mail:</label>
                		<input type="text" name="email"/>
                    <?php
                         if(isset($_SESSION['e_email']))
                         {
                           echo '<div class="error">'.$_SESSION['e_email'].'</div>';
                            unset($_SESSION['e_email']);
                         }
                       ?>
                		<label id="plec">Płeć:</label>
                		<input type="radio" name="plec" value="mezczyzna" checked /><span>Mężczyzna</span>
                		<input type="radio" name="plec" value="kobieta" /><span>Kobieta</span>
                    <!--<?php
                         if(isset($_SESSION['e_plec']))
                         {
                           echo '<div class="error">'.$_SESSION['e_plec'].'</div>';
                            unset($_SESSION['e_plec']);
                         }
                       ?>-->
                		<label>Dodatkowe informacje:</label>
                		<textarea name="opis" id="opis"></textarea>
                    <input class="btn btn-primary" type="submit" value="Zatwierdź">
                		<input type="submit" value="Zatwierdź" />

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
