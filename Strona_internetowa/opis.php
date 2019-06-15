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
                     </ul>
                   </div>
           </nav>
            <article>
                <section>
                  <br><br>
                  <h2 id="gora">Opis sztuk</h2>
                    <p><a href="#dol">Przejdź na dół</a></p>
                    <h3>HAMLET</h3>
<!--name="opis"-->
                  <div >
                   <p >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ac nisl vitae sapien porta dignissim. Curabitur scelerisque magna metus. Vivamus ac dapibus lectus. Nam turpis eros, pulvinar ac cursus eget, dictum et purus. Nullam lacinia fringilla rutrum. Ut sed varius odio. Sed quis bibendum erat. Nullam enim libero, ultrices in facilisis eu, dignissim quis velit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In nec nisi sit amet quam blandit interdum. Sed nec justo nisi, ut semper tellus. Vestibulum tincidunt scelerisque convallis. Vivamus lacinia varius sagittis.
                    Duis ut sapien eget neque venenatis convallis. Etiam tempor justo id urna congue lacinia. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer urna nibh, tincidunt sed feugiat sed, eleifend eget ipsum. Fusce tempus, purus quis consequat rhoncus, sem dolor ultrices nulla, non venenatis odio leo a sapien. Ut euismod nisi in mi laoreet tincidunt. Vivamus justo felis, rhoncus ac fermentum eget, lobortis vel metus. Aenean sed ligula ante, sed iaculis risus. Sed non eros dolor, a volutpat ligula. Pellentesque a dui sem, sit amet malesuada leo. Nam diam lacus, tempor in hendrerit non, mattis in quam. Sed leo enim, ultricies iaculis lobortis ut, malesuada venenatis tortor. Nulla placerat condimentum quam convallis viverra. Morbi iaculis odio a velit tincidunt mattis. In quis lectus et est pellentesque bibendum vel eget dui. Quisque magna nibh, vehicula sit amet varius eu, porttitor vitae ipsum.
                    Morbi imperdiet, sem nec egestas faucibus, turpis massa varius ipsum, lacinia sodales orci nulla sit amet libero. Sed molestie tempus dolor, a imperdiet risus accumsan in. Aenean imperdiet lacus et lectus tincidunt non porttitor arcu molestie. Curabitur enim libero, tempus vel eleifend ut, cursus at ante. Duis sit amet tellus justo, et condimentum elit. Curabitur id neque ipsum. Donec posuere tempor accumsan. Duis eget lacus a eros venenatis pellentesque. Vestibulum sit amet urna nec augue vehicula rhoncus eu id velit. Ut vel sapien purus. Integer lacinia sodales diam, vel porttitor neque interdum ac. Aliquam fringilla ante sed diam pretium convallis. Etiam posuere hendrerit justo id porttitor. Pellentesque tempus ante neque. Curabitur neque nisi, condimentum ultrices vulputate volutpat, hendrerit in metus.
                   </p>

                   <p id="kot">Nulla nunc lectus, hendrerit at posuere non, dignissim a est. Pellentesque ultrices nisi et ipsum fermentum vehicula. Aliquam vitae magna leo, id accumsan magna. Sed consectetur sapien et dolor convallis et ultricies nibh vehicula. Proin ornare tempor porttitor. Quisque eu eros vel augue suscipit sodales sit amet at nisl. Aliquam erat volutpat.
                  	Donec tempor ullamcorper risus id ornare. Duis vel turpis ante. Vivamus lacinia laoreet scelerisque. Sed dignissim arcu eget ligula varius ut molestie orci ornare. Pellentesque venenatis turpis vitae justo porttitor commodo ornare ligula consequat. Duis consectetur blandit enim ut fermentum. Donec venenatis sem non dolor sodales facilisis.
                   </p>

                   <p>Nulla nunc lectus, hendrerit at posuere non, dignissim a est. Pellentesque ultrices nisi et ipsum fermentum vehicula. Aliquam vitae magna leo, id accumsan magna. Sed consectetur sapien et dolor convallis et ultricies nibh vehicula. Proin ornare tempor porttitor. Quisque eu eros vel augue suscipit sodales sit amet at nisl. Aliquam erat volutpat.
                    Donec tempor ullamcorper risus id ornare. Duis vel turpis ante. Vivamus lacinia laoreet scelerisque. Sed dignissim arcu eget ligula varius ut molestie orci ornare. Pellentesque venenatis turpis vitae justo porttitor commodo ornare ligula consequat. Duis consectetur blandit enim ut fermentum. Donec venenatis sem non dolor sodales facilisis.
                   </p>
                   <?php
                   $sql1 = "SELECT Opis FROM opis WHERE Id_opisu =".$_GET['id'];
                   $db->query($sql1);
                     foreach($db->query($sql1) as $row)
                     {
                       echo "<h1>". $row['Opis']."</h1>";
                     }
                    ?>

                    <h2 id="dol">Nagłówek na dole</h2>
                    <p><a href="#gora">Wróć do góry</a></p>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ac nisl vitae sapien porta dignissim. Curabitur scelerisque magna metus. Vivamus ac dapibus lectus. Nam turpis eros, pulvinar ac cursus eget, dictum et purus. Nullam lacinia fringilla rutrum. Ut sed varius odio. Sed quis bibendum erat. Nullam enim libero, ultrices in facilisis eu, dignissim quis velit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In nec nisi sit amet quam blandit interdum. Sed nec justo nisi, ut semper tellus. Vestibulum tincidunt scelerisque convallis. Vivamus lacinia varius sagittis.
                   Duis ut sapien eget neque venenatis convallis. Etiam tempor justo id urna congue lacinia. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer urna nibh, tincidunt sed feugiat sed, eleifend eget ipsum. Fusce tempus, purus quis consequat rhoncus, sem dolor ultrices nulla, non venenatis odio leo a sapien. Ut euismod nisi in mi laoreet tincidunt. Vivamus justo felis, rhoncus ac fermentum eget, lobortis vel metus. Aenean sed ligula ante, sed iaculis risus. Sed non eros dolor, a volutpat ligula. Pellentesque a dui sem, sit amet malesuada leo. Nam diam lacus, tempor in hendrerit non, mattis in quam. Sed leo enim, ultricies iaculis lobortis ut, malesuada venenatis tortor. Nulla placerat condimentum quam convallis viverra. Morbi iaculis odio a velit tincidunt mattis. In quis lectus et est pellentesque bibendum vel eget dui. Quisque magna nibh, vehicula sit amet varius eu, porttitor vitae ipsum.
                 </p>
                   <?php
                   $sql2 = "SELECT Opis FROM opis WHERE Id_opisu = 2";
                   $db->query($sql2);
                     foreach($db->query($sql2) as $row)
                     {
                       echo "<h1>". $row['Opis']."</h1>";
                     }
                    ?>

                    </div>
                  <br>
                </section>
            </article>
<aside></aside>

<footer>
    <h3>Karolina Szymańska</h3>
</footer>
</body>
</html>
