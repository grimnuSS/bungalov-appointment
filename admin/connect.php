<?php
$host="localhost";
$veritabani_adi="binefes";
$kullanici_adi="root";
$sifre="";

try{
    $db = new PDO("mysql:host=$host;dbname=$veritabani_adi;chatset=utf8",$kullanici_adi,$sifre);
}

catch (PDOException $e) {
    echo $e -> getMessage();
}

?>