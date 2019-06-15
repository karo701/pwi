<?php
session_start();
require_once ('database.php');
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
                 <section><div class="kontakt">

                           	<table style="width: 150px; margin-left: auto; margin-right: auto; ">
                              <thead>
                                <tr><th colspan="2">Wiadomości<br> od <br>użytkowników:
                                <?php
                                  $sql = "SELECT COUNT(*) FROM wiadomosci";
                                  $stmt = $db->prepare($sql);
                                  $stmt->execute();
                                  $ileWiadomosci = $stmt->fetchColumn();
                                  echo $ileWiadomosci;
                                ?> </th></tr>
                                <tr><th><br>Email</th><th><br>Treść</th></tr>
                              </thead>
                              <tbody>
                                <?php
                                $sql1 = "SELECT * FROM wiadomosc LEFT JOIN uzytkownicy u on wiadomosc.Id_uzytkownika = u.Id_uzytkownika";

                                  foreach($db->query($sql1) as $row){
                                    echo "<tr><td>". $row['E_mail']."</td><td>".$row['Wiadomosc']."</td></tr>";
                                  }
                                 ?>
                              </tbody>
                            </table>
                   			</div>

                   		<!--<form class="form" id="contactForm" method="post">
                         <div class="kontakt-form">
                             <label >Odpowiedź na wiadomość</label><br>
                             <textarea name="wiadomosc" class="form-cont" placeholder="Wiadomość" rows="4" required></textarea><br>
                            <input type="submit" class="form-cont submit" value="Wyślij">
                         </div>
                     </form>-->

<br>
                 </section>
             </article>
 <aside></aside>

 <footer>
     <h3>Karolina Szymańska</h3>
 </footer>


 </body>
 </html>
