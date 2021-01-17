<?php
session_start();;
@ob_start();
@date_default_timezone_set("Europe/Istanbul");

try {

    $db=new PDO("mysql:host=localhost;dbname=paratakip;charset=utf8",'root','');
}

catch (PDOExpception $cikk) {

    echo $cikk->getMessage();
}
?>
