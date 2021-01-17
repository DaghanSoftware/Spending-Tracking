<?php
require_once 'sistem/baglan.php';
$sifreyenile = $db->query("SELECT * FROM uyeler WHERE id = 1")->fetch(PDO::FETCH_ASSOC);
$mail=$sifreyenile['kullanici_mail'];
    $ip=$_SERVER['REMOTE_ADDR'];
    $gidis="Çıkış Yaptı";
$kisigiris=$db->query("INSERT INTO kisilog (kisimail,kisiharaket,ip) values ('$mail','$gidis','$ip')");
    Header("Refresh: 0.1; url=http://localhost/190928038-Semih%20Daghan/index.php");
?>