<?php
require_once '../sistem/baglan.php';
$hesapid = $_POST['hesapid'];
$hesapmiktar = $_POST['hesapmiktar'];
$sayi1 = 0;
$hesapmiktari = $db->query("SELECT miktar FROM hesapekle WHERE id = '$hesapid'")->fetch(PDO::FETCH_ASSOC);
if ($hesapmiktar == $sayi1){

	$sil = $db->query("DELETE FROM hesapekle WHERE id = '$hesapid' ");
	if ($sil->rowCount()){
		echo "basarili";
	}
	else{
		echo "hata";
	}
}
else{
	echo "bos";
}

