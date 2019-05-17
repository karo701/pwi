<pre>
<?php

$fp = fopen("plik2.txt", "r");
$tekst = fread($fp, filesize);
echo $tekst;
fclose($fp);

?>
</pre>
