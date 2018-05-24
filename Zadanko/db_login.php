<?php

include("head.php");

$conn = new mysqli('localhost', 'root', '', 'pogoda') or die ("Nie udało się nawiązać połczenia z bazą danych");
$tb_name = "pogodynka";
?>
