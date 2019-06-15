<?php

	session_start();
	require_once "database.php";
  if(!isset($_SESSION['zalogowany']))
  {
		$_SESSION['wiadom']="Zaloguj się, aby wysłać wiadomość tekstową";
  }
	else{
		  $wszystko_OK=true;
  if(!isset($_POST['wiadomosc']))
  {
		  $wszystko_OK=false;
      $_SESSION['e_brak'] = "Wiadomość jest pusta, jeśli chcesz wysłać uzupełnij";
  }
  else
	{
			$zal=$_SESSION['zalogowany'];
			$wiadomosc=$_POST['wiadomosc'];
			$sql = "INSERT INTO wiadomosc(Id_uzytkownika,Wiadomosc) VALUES ($zal, '$wiadomosc')";
			$db->exec($sql);
		//	$_SESSION['wyslana'] = "Dziękujemy za wysłanie wiadomości,odpowiemy jak najszybciej";
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
    <link href="style.css" type="text/css" rel="stylesheet">
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
                  <div class="kontakt">
                    <h1>Witamy</h1><br>
                    <h2> Zadzwoń do nas: 668-228-997. </h2>
                    <br>
                    <br>
									</div>
										<?php

										if(isset($_SESSION['zalogowany'])&&($_SESSION['zalogowany']==true))
										{
                  echo '<h2>Chcesz o coś zapytać? Napisz do nas, w przeciągu 3 godzin odpowiemy!</h2>';
								  echo '<div class = "kontakt-form">';
                  echo '<form class="kontakt-form" method="post">';
                  echo '  <textarea name="wiadomosc" class="form-cont" placeholder="Wiadomość" rows="4" required></textarea><br>';
                  echo '  <input type="submit" class="form-cont submit" value="Wyślij" name="send">';
									echo '</form>';
									echo '</div>';
		             if(isset($_SESSION['e_brak']))
		             {
		               echo '<div class="error">'.$_SESSION['e_brak'].'</div>';
		               unset($_SESSION['e_brak']);
		             }
							 }
								else
								{
									echo '<h2>'.$_SESSION['wiadom'].'</h2>';
									unset($_SESSION['wiadom']);
								}

												?>
                </section>
            </article>
<aside></aside>

<footer>
    <h3>Karolina Szymańska</h3>
</footer>


</body>
</html>
