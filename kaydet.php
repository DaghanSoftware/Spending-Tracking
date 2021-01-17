<?php
require_once 'baglan.php';
?>
<?php
if($_POST) {
		$uye_adi=$_POST['ukadi'];
		$uye_mail=$_POST['umail'];
		$uye_tel=$_POST['utel'];
		$uye_adres=$_POST['uadres'];
		$uye_sifre=$_POST['usifre'];
		$basari2="Yeni Kayıt Oldu";
		$ip=$_SERVER['REMOTE_ADDR'];
$sql = $db->query("SELECT * FROM uyeler WHERE kullanici_mail = '$uye_mail'",PDO::FETCH_ASSOC);
$sucuk = $db->query("SELECT * FROM uyeler WHERE kullanici_adi = '$uye_adi'",PDO::FETCH_ASSOC);
if ( $sql->rowCount() )
{
	echo "<script>alert('Bu EMAİL Adresi Daha Önceden Kullanılmış!!Lütfen başka bir EMAİL Giriniz');</script>";
    header('refresh:0;url=http://localhost/taslak/indexkayitol.php');
} 

 if ( $sucuk->rowCount() )
{
		echo "<script>alert('Bu Kullanıcı Adı Daha Önceden Kullanılmış!!Lütfen Farklı Bir Kullanıcı Adı Giriniz');</script>";
    header('refresh:0;url=http://localhost/taslak/indexkayitol.php');
} else{
	$msg=$db->query("INSERT INTO uyeler ( kullanici_adi,kullanici_mail,kullanici_tel,kullanici_adres,kullanici_sifre) values('$uye_adi','$uye_mail','$uye_tel','$uye_adres','$uye_sifre')");

if($msg)
{
	echo "<script>alert('Kayıt Başarılı Üyeliğiniz Onaylanmasını Bekleyiniz');</script>";
    header('refresh:0;url=http://localhost/taslak/index.php');
	$arc=$db->query("INSERT INTO girislog ( haraket,kullanici,ip) values('$basari2','$uye_mail','$ip')");	
}
}

}
?>
 
	
 