<?php
require_once '../sistem/baglan.php';
$hesapid = $_POST['hesapid'];
$hesapadi = $_POST['hesapadi'];
$hesapmiktar = $_POST['hesapmiktar'];
$sifreyenile = $db->query("SELECT * FROM uyeler WHERE id = 1")->fetch(PDO::FETCH_ASSOC);
$mail=$sifreyenile['kullanici_mail'];
$gidis="İsimli hesabı güncelledi";
$ip=$_SERVER['REMOTE_ADDR'];
$cikisyap=$db->query("INSERT INTO kisilog (kisimail,kisiharaket,ip) values('$mail','$hesapadi $gidis','$ip')");
$guncelle = $db->query("UPDATE hesapekle SET hesapadi = '$hesapadi', miktar = '$hesapmiktar' WHERE id = '$hesapid' ");
?>
