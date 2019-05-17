<?php
$myfile = fopen("index.txt","w") or die ("blad");
fwrite($myfile,$_POST['test']);
fclose($myfile);
 ?>
