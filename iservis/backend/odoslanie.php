<?php

require 'database.php';


$sluzba = $_POST["sluzba"];
$meno = $_POST["meno"];
$priezvisko = $_POST["priezvisko"];
$email = $_POST["email"];
$adresa = $_POST["adresa"];
$telefon = $_POST["telefon"];
$poznamka = $_POST["poznamka"];
$sql = "INSERT INTO objednavky (id_sluzby, meno, priezvisko, adresa, email, telefon, poznamka)
VALUES ('$sluzba', '$meno', '$priezvisko', '$adresa', '$email', '$telefon', '$poznamka')";
if ($database -> query($sql) === TRUE ) {
    echo "NICEEEE";
}