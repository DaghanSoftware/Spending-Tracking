<?php
require_once '../sistem/baglan.php';

 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {
      $output = '';
     $haraketfilterele = $db->query("SELECT * FROM haraketler WHERE islemtarih BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' ",PDO::FETCH_ASSOC);
     $result = '';
      $output .= '  
           <table class="table table-bordered">  
                                    <tr>
                                        <th>İd</th>
                                        <th>Kategori</th>
                                        <th>İş Yeri</th>
                                        <th>Harcama</th>
                                        <th>İşlem Yapılan Hesap</th>
                                        <th>Kalan Bakiye</th>
                                        <th>Harcama Öncesi Bakiye</th>
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
                          <td>'. $haraketfiltre["kategori"] .'</td>  
                          <td>'. $haraketfiltre["kurum"] .'</td>  
                          <td> '. $haraketfiltre["harcananmiktar"] .'</td>  
                          <td>'. $haraketfiltre["islemhesap"] .'</td>  
                          <td>'. $haraketfiltre["gbakiye"] .'</td>  
                          <td>'. $haraketfiltre["eskibakiye"] .'</td>  
                          <td>'. $haraketfiltre["anlikzaman"] .'</td>  
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
