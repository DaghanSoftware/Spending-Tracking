<?php
require_once '../sistem/baglan.php';
if (isset($_POST['accountId'])) {
    $hesapid = $_POST['accountId'];

    $query = $db->query("SELECT * FROM hesapekle WHERE id = $hesapid");

    while ( $merkez = $query->fetch(PDO::FETCH_ASSOC) ){

        $hesapid = $merkez['id'];
        $hesapmiktar = $merkez['miktar'];
    }
}
?>
<input type="hidden" name="hesapid" value="<?php echo $hesapid; ?>">
<input type="hidden" name="hesapmiktar" value="<?php echo $hesapmiktar; ?>">

