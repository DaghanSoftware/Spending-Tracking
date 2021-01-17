<?php
require_once '../sistem/baglan.php';
if($_POST['hesappara']>0){
    $ilkhesap = $_POST['ilkhesap'];
    $ikincihesap = $_POST['ikincihesap'];
    $hesappara = $_POST['hesappara'];

    if ($ilkhesap != $ikincihesap){

    $ilkhesapdegisken = $db->query("SELECT * FROM hesapekle WHERE hesapadi = '$ilkhesap'")->fetch(PDO::FETCH_ASSOC);
    $ilkhesapmiktar = $ilkhesapdegisken['miktar'];
    $ilkhesapbirim = $ilkhesapdegisken['birim'];

    $ikincihesapdegisken = $db->query("SELECT * FROM hesapekle WHERE hesapadi = '$ikincihesap'")->fetch(PDO::FETCH_ASSOC);
    $ikincihesapmiktar = $ikincihesapdegisken['miktar'];
    $ikincihesapbirim = $ikincihesapdegisken['birim'];

    if ($ilkhesapbirim==$ikincihesapbirim){

        $ilkhesapcikarma = $ilkhesapmiktar - $hesappara;
        $ikincihesaptoplama = $ikincihesapmiktar + $hesappara;

        $güncelleilkhesap = $db->query("UPDATE hesapekle SET miktar = $ilkhesapcikarma WHERE hesapadi = '$ilkhesap'");
        $güncelleikincihesap = $db->query("UPDATE hesapekle SET miktar = $ikincihesaptoplama WHERE hesapadi = '$ikincihesap'");

        if ($güncelleilkhesap->rowCount() && $güncelleilkhesap->rowCount()){
            echo "basarili";
        }
        else{
            echo "hata";
        }
    }
    else{
        echo "format";
    }

}
else{
    echo "hesap";
}

}
else{
    echo "bos";
}