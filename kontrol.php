<?php
require_once("baglan.php");
if (isset($_POST['kullanici_mail']) and isset($_POST['kullanici_sifre'])) {

    $kullanici_mail = $_POST['kullanici_mail'];
    $kullanici_sifre = $_POST['kullanici_sifre'];
    $ip=$_SERVER['REMOTE_ADDR'];
    $kisiekle="Giriş Yaptı";
    if ($kullanici_mail != "" && $kullanici_sifre != ""){
    $query=$db->prepare("SELECT * FROM uyeler WHERE kullanici_mail=:kullanici_mail AND kullanici_sifre=:kullanici_sifre");
    $query->execute(array(
        'kullanici_mail' => $kullanici_mail,
        'kullanici_sifre' => $kullanici_sifre
    ));
    if ($query->rowCount()) {
        $message = $db->query("SELECT * FROM uyeler WHERE kullanici_mail = '{$kullanici_mail}'")->fetch(PDO::FETCH_ASSOC);
        $kisigiris=$db->query("INSERT INTO kisilog (kisimail,kisiharaket,ip) values ('$kullanici_mail','$kisiekle','$ip')");
        echo "basarili";
    }
    else {
        echo "hata";
    }

}
else {
    echo "bos";
}

}
else{
    echo "hata";
}

?>