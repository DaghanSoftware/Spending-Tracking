<?php
require_once '../sistem/baglan.php';
$kullanici_adi = $_POST['kullanici_adi'];
$kullanici_mail = $_POST['kullanici_mail'];
$kullanici_tel = $_POST['kullanici_tel'];
$kullanici_adres = $_POST['kullanici_adres'];
$kullanici_sifre = $_POST['kullanici_sifre'];
$sifreyenile = $db->query("SELECT * FROM uyeler WHERE id = 1")->fetch(PDO::FETCH_ASSOC);
$mail=$sifreyenile['kullanici_mail'];
$gidis="Üye Bilgilerini Güncelledi";
$ip=$_SERVER['REMOTE_ADDR'];
if($kullanici_adi!= "" && $kullanici_mail!= "" && $kullanici_tel!= "" && $kullanici_adres!= "" && $kullanici_sifre!= ""){

    $query = $db->prepare("UPDATE uyeler SET kullanici_adi = :kullanici_adi, kullanici_mail = :kullanici_mail, kullanici_tel = :kullanici_tel, kullanici_adres = :kullanici_adres, kullanici_sifre = :kullanici_sifre");
    $update = $query->execute(array(
        "kullanici_adi" => $kullanici_adi,
        "kullanici_mail" => $kullanici_mail,
        "kullanici_tel" => $kullanici_tel,
        "kullanici_adres" => $kullanici_adres,
        "kullanici_sifre" => $kullanici_sifre
    ));
    if ($query->rowCount()){
        $cikisyap=$db->query("INSERT INTO kisilog (kisimail,kisiharaket,ip) values('$kullanici_mail','$gidis','$ip')");
        echo "basarili";
    }
    else{
        echo "hata";
    }
}
else{
    echo "bos";
}