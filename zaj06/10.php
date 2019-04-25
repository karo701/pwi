<?php
$liczba1=$_POST['liczba1'];
$liczba2=$_POST['liczba2'];
if(isset($liczba1) && isset($liczba2) && $liczba1!="" && $liczba2!="")
{

$suma=$_POST['liczba1']+$_POST['liczba2'];
$odejmowanie=$_POST['liczba1']-$_POST['liczba2'];
$razy=$_POST['liczba1']*$_POST['liczba2'];
;
echo "Dodawanie:".$suma."<br>";
echo "Odejmowanie:".$odejmowanie."<br>";
echo "Razy:".$razy."<br>";
if($_POST['liczba2'] == 0)
{
    echo "nie dziel przez zero";}
else
{
    $dzielenie=$_POST['liczba1']/$_POST['liczba2'];
    echo "Dzielenie".$_POST['liczba1']/$_POST['liczba2']."<br>";
}
}
else
    echo "puste wartosci";
?>
