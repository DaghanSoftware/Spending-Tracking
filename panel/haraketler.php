<?php require_once 'inc/ust.php'; ?>
<?php require_once 'inc/sol.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
</head>
<main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> Haraketler</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Anasayfa</li>
                <li class="breadcrumb-item active"><a href="#">Haraket Listesi</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="clearfix"></div>
            <div class="col-md-12">
                <div class="tile">
                    <div class="m-t-30">
                        <body>
                        <form action="" class="form-inline date-form">
                            <div class="col-md-3">
                                <input type="date" name="from_date" id="from_date" class="form-control" placeholder="İlk Tarih" />
                            </div>
                            <div class="col-md-3">
                                <input type="date" name="to_date" id="to_date" class="form-control" placeholder="İkinci Tarih" />
                            </div>
                            <div class="col-md-5">
                                <input type="button" name="filter" id="filter" value="Filtrele" class="btn btn-info" />
                            </div>
                            <div style="clear:both"></div>
                        </form>
                            <br />
                            <div id="order_table">
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
                                    <?php

                                    $haraketsay = $db->query("SELECT * FROM haraketler");
                                    while ($haraketquery = $haraketsay->fetch(PDO::FETCH_ASSOC)) {
                                        $haraketid = $haraketquery['id'];
                                        $haraketkategori = $haraketquery['kategori'];
                                        $haraketmiktar = $haraketquery['harcananmiktar'];
                                        $haraketislemh = $haraketquery['islemhesap'];
                                        $haraketidgbakiye = $haraketquery['gbakiye'];
                                        $haraketidebakiye = $haraketquery['eskibakiye'];
                                        $haraketidislemtarih = $haraketquery['islemtarih'];
                                        $haraketidkurum = $haraketquery['kurum'];
                                        $haraketidislemip = $haraketquery['ip'];
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $haraketid; ?></th>
                                            <td><?php echo $haraketkategori; ?></td>
                                            <td><?php echo $haraketidkurum;?></td>
                                            <td><?php echo $haraketmiktar; ?></td>
                                            <td><?php echo $haraketislemh; ?></td>
                                            <td><?php echo $haraketidgbakiye;?></td>
                                            <td><?php echo $haraketidebakiye; ?></td>
                                            <td><?php echo $haraketidislemtarih; ?></td>
                                            <td><?php echo $haraketidislemip; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>
</main>
                        </body>
                        </html>


<?php require_once 'inc/alt.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function(){
        $.datepicker.setDefaults({
            dateFormat: 'yy-mm-dd'
        });
        $(function(){
            $("#from_date").datepicker();
            $("#to_date").datepicker();
        });
        $('#filter').click(function(){
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            if(from_date != '' && to_date != '')
            {
                $.ajax({
                    url:"ajaxif/haraketfiltrele.php",
                    method:"POST",
                    data:{from_date:from_date, to_date:to_date},
                    success:function(data) {
                        $('#order_table').html(data);
                    }
                });
            }
            else
            {
                swal("Hata","Tarih seçmeden listeme filtreleme işlemi yapamazsınız","error");
            }
        });
    });
</script>

