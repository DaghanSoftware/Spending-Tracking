<?php
require_once '../sistem/baglan.php';
$hesapadi = $_POST['hesapadi'];
$para = $_POST['para'];
$birim = $_POST['birim'];
$nakitkart = $_POST['hesaplar'];
$sifreyenile = $db->query("SELECT * FROM uyeler WHERE id = 1")->fetch(PDO::FETCH_ASSOC);
$mail=$sifreyenile['kullanici_mail'];
$gidis="isminde yeni bir hesap oluşturdu";
$ip=$_SERVER['REMOTE_ADDR'];

if ($hesapadi != "" && $para != ""  && $birim != "" && $nakitkart != ""){
    $cikisyap=$db->query("INSERT INTO kisilog (kisimail,kisiharaket,ip) values('$mail','$hesapadi $gidis','$ip')");
    $query = $db->prepare("INSERT INTO hesapekle SET hesapadi = :hesapadi, miktar = :miktar, birim = :birim, nakitkart = :nakitkart");
    $insert = $query->execute(array("hesapadi" => $hesapadi,
                                    "miktar" => $para,
                                    "birim" => $birim,
                                    "nakitkart" => $nakitkart,
        ));
    if ($insert){
        echo "basarili";
    }
    else{
        echo "hata";
    }

}
else{
    echo "bos";
}


