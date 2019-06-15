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
    <link href="bilety.css" type="text/css" rel="stylesheet">
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
                  <div class="co">
                    <?php
                      $sql1 = "SELECT * FROM repertuar WHERE Id_repertuaru=".$_GET['idd'];
                      $db->query($sql1);
                      foreach($db->query($sql1) as $row)
                      {
                        echo "<h2>". $row['Data']."</h2>";
                        echo "<h4>".$row['Godzina']."   ".$row['Rodzaj_sztuki']."</h4>";
                        echo '<h4>'.$row['Tytul'].'</h4>';
                        echo "<h4>". $row['Sala']."</h4>";
                      }
                    ?>
                    </div>
                  <table>
                    <?php
                    $sql1 = "SELECT * FROM siedzenia  ";
                    $db->query($sql1);
                    $iterator = 1;
                    $iterator2 = 1;
                    foreach($db->query($sql1) as $row)
                    {
                      if($iterator%8==1)
                      {
                        echo '<tr>';
                        echo '<td><label >'.$iterator2.'</label> </td>';
                        $iterator2++;
                      }
                      if ($row['Stan']==2)
                      {
                        echo '<form method="post"><td><a href="#?id='.$row['Id_siedzenia'].'&st='.$row['Stan'].'"><input type="checkbox" name="siedzenie" class="but" style="color:blue">'.$row['Id_siedzenia'].'</input></a></td></form>';
                      }
                      if($iterator%8==0)
                      {
                        echo '</tr>';
                        echo '<tr>';
                      }
                      if($iterator==40)
                      {
                        echo '</tr>';
                      }
                      $iterator++;
                    }
                    ?>
                  </table>
                   <?php
                     $rezultat = "SELECT * FROM siedzenia";
                     $db->query($rezultat);
                     echo '<input type="submit" id="kup_bilet" class="subb" value="Kup Bilet!"></input>';
                    ?>


                  <table>
                    <tr>
                         <td><button  style="color:blue">Miejsca wolne</td>
                         <!--<td><button  style="color:red">Miejsca zajęte</td>-->
                    </tr>
                  </table>
                  <br>
                  <div class="tak" style=" width: 200px; margin: 0 auto;"></div>
                  <div class="nie0" style="margin-left: 300px;"></div>
                  <br><br><br>
                </section>
            </article>
<aside></aside>

<footer>
    <h3>Karolina Szymańska</h3>


</footer>

<script>

  var countChecked = function()
{
  var n = $( "input:checked" ).length;
 $( ".tak" ).text( n + (n === 1 ? " miejsce " : " miejsca ") + " wybrałeś!" );
};
  countChecked();
    $( "input[type=checkbox]" ).on( "click", countChecked );
</script>
<script>
var countChecked2 = function()
{
  var z = $( "input:checked" ).length;
  $( ".nie0" ).text( " Kupiłeś " + z +  (z === 1 ? " bilet " : " bilety "));
};
  countChecked2();
  $( ".subb" ).on( "click", countChecked2 );

</script>
<!--<script>
<script>
$( ".subb" ).on( "click", function() {
$( ".subb" ).html( $( "input:submit" ).val() + " Kupione" );});
</script>
  $( "input" ).on( "click", function() {
  $( "#log" ).html( $( "input:checked" ).val() + " is checked!" );
});
</script>
-->
</body>
</html>
