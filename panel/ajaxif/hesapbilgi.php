<?php
require_once '../sistem/baglan.php';
if (isset($_POST['accountId'])) {
    $id = $_POST['accountId'];
    $sifreyenile = $db->query("SELECT * FROM uyeler WHERE id = 1")->fetch(PDO::FETCH_ASSOC);
    $mail=$sifreyenile['kullanici_mail'];
    $kullaniciadi=$sifreyenile['kullanici_adi'];
    $ip=$_SERVER['REMOTE_ADDR'];
    $query = $db->query("SELECT * FROM hesapekle WHERE id = '$id'");
    while ( $merkezguncelle = $query->fetch(PDO::FETCH_ASSOC) ){
        $id = $merkezguncelle['id'];
        $hesapadi = $merkezguncelle['hesapadi'];
        $nakitkart = $merkezguncelle['nakitkart'];
        $hesappara = $merkezguncelle['miktar'];
        $hesapbirim = $merkezguncelle['birim'];
        $hesaptarih = $merkezguncelle['hesaptarih'];

    }
}
?>

    <div class="modal-body">
        <div class="container" id="profile">
            <div class="row">
                <div class="col-sm-3 col-md-4">
                    <img src="images/unnamed.png" alt="" class="rounded responsive" />
                </div>
                <div class="col-sm-6 col-md-8">
                    <h4 class="text-primary"><?php echo $hesapadi; ?>  <?php echo $nakitkart; ?> Hesabı</h4>
                    <p class="text-secondary">
                    <h5 ><i class="fa fa-try" aria-hidden="true"></i> Miktar:<?php echo $hesappara; ?></h5>
                        <i class="fa fa-try" aria-hidden="true"></i> Para Birimi <?php echo $hesapbirim; ?>
                    </p>
                </div>
            </div>

        </div>
    </div>


    <div class="form-group">
        <label for="message-text" class="col-form-label">Hesap Sahibinin Adı:</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
            </div>
            <input type="text" class="form-control" name="hesapbirim" value="<?php echo $kullaniciadi; ?>" readonly="">
        </div>
    </div>


    <div class="form-group">
        <label for="message-text" class="col-form-label">Hesap Sahibinin E-Posta Adresi:</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-id-card" aria-hidden="true"></i></span>
            </div>
            <input type="text" class="form-control" name="hesapnakitkart" value="<?php echo $mail; ?>" readonly="">
        </div>
    </div>

<div class="form-group">
    <label for="message-text" class="col-form-label">Hesabın Oluşturulma Tarihi:</label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
        </div>
        <input type="text" class="form-control" name="hesapnakitkart" value="<?php echo $hesaptarih; ?>" readonly="">
    </div>
</div>



</div>