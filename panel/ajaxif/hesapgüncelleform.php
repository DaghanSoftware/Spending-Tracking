<?php
require_once '../sistem/baglan.php';
if (isset($_POST['accountId'])) {
    $id = $_POST['accountId'];
    $query = $db->query("SELECT * FROM hesapekle WHERE id = '$id'");
    while ( $merkezguncelle = $query->fetch(PDO::FETCH_ASSOC) ){
        $id = $merkezguncelle['id'];
        $hesapadi = $merkezguncelle['hesapadi'];
        $nakitkart = $merkezguncelle['nakitkart'];
        $hesappara = $merkezguncelle['miktar'];
        $hesapbirim = $merkezguncelle['birim'];

    }
}
?>
    <div class="modal-body">
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Hesap Numarası:</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                                                       <span class="input-group-text" id="basic-addon1">
                                                         <i class="fa fa-star" aria-hidden="true"></i>
                </div>
                <input type="text" class="form-control" name="hesapid" value="<?php echo $id; ?>" readonly="">
            </div>
        </div>

        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Hesap Adı:</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                                                       <span class="input-group-text" id="basic-addon1">
                                                         <i class="fa fa-address-card" aria-hidden="true"></i>
                </div>
                <input type="text" class="form-control" name="hesapadi" value="<?php echo $hesapadi; ?>">
            </div>
        </div>


        <div class="form-group">
            <label for="message-text" class="col-form-label">Para Birimi:</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-try" aria-hidden="true"></i></span>
                </div>
                <input type="text" class="form-control" name="hesapbirim" value="<?php echo $hesapbirim; ?>" readonly="">
            </div>
        </div>


        <div class="form-group">
            <label for="message-text" class="col-form-label">Hesap Türü:</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-id-card" aria-hidden="true"></i></span>
                </div>
                <input type="text" class="form-control" name="hesapnakitkart" value="<?php echo $nakitkart; ?>" readonly="">
            </div>
        </div>

        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Miktar:</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                                                       <span class="input-group-text" id="basic-addon1">
                                                         <i class="fa fa-google-wallet" aria-hidden="true"></i>
                </div>
                <input type="number" class="form-control" name="hesapmiktar" value="<?php echo $hesappara; ?>">
            </div>
        </div>

    </div>