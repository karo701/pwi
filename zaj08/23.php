<?php
    $pdo = new PDO('mysql:host=localhost;dbname=Samochody','root','');
    if (isset($_GET['id'])) {
    $stm = $pdo->prepare('SELECT * FROM samochody WHERE id = ?');
    $bind = $stm->bindValue('1', $_GET['id'], PDO::PARAM_INT);
    $stm->execute();
    $i = 0;
    $pom = 0;
        while($row = $stm->fetch())
        {
                print $row['vmarka'].': '.$row['vmodel'].': '.$row['vpojemnosc'].'</li>';
                $i=1;
        }
        if($i == 0) {
            echo "Nie ma takiego id!";
        }
    }
    else {
        echo "Podaj id!";
    }
?>
