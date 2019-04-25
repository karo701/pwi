<?php
session_start();
echo $_SESSION['sesja']."<br>";
echo '<a href="12.php">12</a>';
session_destroy();
?>
