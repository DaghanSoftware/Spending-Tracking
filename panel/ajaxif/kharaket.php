<?php
require_once '../sistem/baglan.php';

if(isset($_POST["from_date"], $_POST["to_date"]))
{
    $output = '';
    $haraketfilterele = $db->query("SELECT * FROM kisilog WHERE kdate BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' ",PDO::FETCH_ASSOC);
    $result = '';
    $output .= '  
           <table class="table table-bordered">  
                                    <tr>
                                    <th>İd</th>
                                    <th>İşlemi Gerçekleştiren Kullanıcı</th>
                                    <th>Haraket</th>
                                    <th>Tarih</th>
                                    <th>İp</th>
                                    </tr>
      ';
    if($haraketfilterele->rowCount())
    {
        while ($haraketfiltre = $haraketfilterele->fetch(PDO::FETCH_ASSOC)) {
            $output .= '  
                     <tr>  
                          <td>'. $haraketfiltre["id"] .'</td>  
                          <td>'. $haraketfiltre["kisimail"] .'</td>  
                          <td>'. $haraketfiltre["kisiharaket"] .'</td>  
                          <td> '. $haraketfiltre["kisitarih"] .'</td>  
                          <td>'. $haraketfiltre["ip"] .'</td>  
                     </tr>  
                ';
        }
    }
    else
    {
        $output .= '  
                <tr>  
                     <td colspan="5">Seçtiğiniz tarihler arasında yapılan işlem bulunmamakta</td>  
                </tr>  
           ';
    }
    $output .= '</table>';
    echo $output;
}
?>
