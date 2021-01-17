<?php
require_once '../sistem/baglan.php';
$islemhesap = $_POST['islemhesap'];
$kategori = $_POST['kategori'];
$kurum = $_POST['kurum'];
$harcananmiktar = $_POST['harcananmiktar'];
$sifreyenile = $db->query("SELECT * FROM uyeler WHERE id = 1")->fetch(PDO::FETCH_ASSOC);
$mail=$sifreyenile['kullanici_mail'];
$gidis="kategorisinde harcama yaptı";
$ip=$_SERVER['REMOTE_ADDR'];
if($_POST['islemhesap'] != "" && $_POST['kategori'] != "" && $_POST['kurum'] != "" && $_POST['harcananmiktar'] != ""){
    $eskibakiye = $db->query("SELECT miktar FROM hesapekle WHERE hesapadi = '$islemhesap'")->fetch(PDO::FETCH_ASSOC);
    $eskibakiye = $eskibakiye['miktar'];
    $güncelbakiye = $eskibakiye - $harcananmiktar;

    $kategorig = $db->query("SELECT amounts FROM chartjs WHERE title = '$kategori'")->fetch(PDO::FETCH_ASSOC);
    $kategorig = $kategorig['amounts'];
    $kategorigüncelle = $kategorig + $harcananmiktar;

    $db->exec("UPDATE chartjs SET amounts = $kategorigüncelle WHERE title = '$kategori'");
    $db->exec("UPDATE hesapekle SET miktar = $güncelbakiye WHERE hesapadi = '$islemhesap'");
    $cikisyap=$db->query("INSERT INTO kisilog (kisimail,kisiharaket,ip) values('$mail','$kategori $gidis','$ip')");
    $gönder = $db->prepare("INSERT INTO haraketler SET kategori = :kategori, harcananmiktar = :harcananmiktar, islemhesap = :islemhesap, gbakiye = :gbakiye, eskibakiye = :eskibakiye, kurum = :kurum, ip = :ip");
    $islem = $gönder->execute(array("kategori" => $kategori,
                                    "harcananmiktar" => $harcananmiktar,
                                    "islemhesap" => $islemhesap,
                                    "gbakiye" => $güncelbakiye,
                                    "eskibakiye" => $eskibakiye,
                                    "kurum" => $kurum,
                                    "ip" => $ip,
    ));
    if ($islem){
        echo "basarili";
    }
    else{
        echo "hata";
    }
}
else{
    echo "format";
}