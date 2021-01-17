<?php require_once 'inc/ust.php'; ?>
<?php require_once 'inc/sol.php'; ?>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
</head>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> Kullanıcı İşlemleri</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Anasayfa</li>
                <li class="breadcrumb-item active"><a href="#">Kullanıcı İşlemleri </a></li>
            </ul>
        </div>
        <div class="row">

            <div class="clearfix"></div>

                <div class="col-md-12">
                    <div class="tile">
                        <div class="m-t-30">
                            <?php
                            $sifreyenile = $db->query("SELECT * FROM uyeler WHERE id = 1")->fetch(PDO::FETCH_ASSOC);

                            ?>
                            <form>
                                <div class="row">
                                    <div class="form-group col-md-5">
                                        <label for="subject">Kullanıcı Adı</label>
                                        <input type="text" name="kullanici_adi" class="form-control required" value="<?php echo $sifreyenile['kullanici_adi']; ?>" placeholder="Kullanıcı Adınızı Giriniz...">
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="subject">Mail</label>
                                        <input type="email" name="kullanici_mail" class="form-control required" value="<?php echo $sifreyenile['kullanici_mail']; ?>" placeholder="Mail Adresinizi Giriniz...">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-5">
                                        <label for="subject">Telefon Numarası</label>
                                        <input type="number" name="kullanici_tel" class="form-control required" value="<?php echo $sifreyenile['kullanici_tel']; ?>" placeholder="Telefon Numaranızı Giriniz...">
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="subject">Adres</label>
                                        <input type="text" name="kullanici_adres" class="form-control required" value="<?php echo $sifreyenile['kullanici_adres']; ?>" placeholder="Adresinizi Giriniz...">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-5">
                                        <label for="subject">Şifre</label>
                                        <input type="number" name="kullanici_sifre" class="form-control required" value="<?php echo $sifreyenile['kullanici_sifre']; ?>" placeholder=" Yeni Şifrenizi Giriniz...">
                                    </div>
                                    <button class="btn my-3" type="submit"   onclick="return false;" id="update">Güncelle</button>
                                </div>




                            </form>

                        </div>
                    </div>
                </div>



            <div class="col-md-12">
                <div class="tile">
                    <div>
                        <h1><i class="fa fa-th-list"></i> Kullanıcı Haraketleri</h1>
                    </div>
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
                                        <th>İşlemi Gerçekleştiren Kullanıcı</th>
                                        <th>Haraket</th>
                                        <th>Tarih</th>
                                        <th>İp</th>
                                    </tr>
                                    <?php

                                    $haraketsay = $db->query("SELECT * FROM kisilog");
                                    while ($haraketquery = $haraketsay->fetch(PDO::FETCH_ASSOC)) {
                                        $haraketid = $haraketquery['id'];
                                        $haraketmail = $haraketquery['kisimail'];
                                        $kisiharaket = $haraketquery['kisiharaket'];
                                        $kisiharakettarih = $haraketquery['kisitarih'];
                                        $kisiip = $haraketquery['ip'];
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $haraketid; ?></th>
                                            <td><?php echo $haraketmail; ?></td>
                                            <td><?php echo $kisiharaket;?></td>
                                            <td><?php echo $kisiharakettarih; ?></td>
                                            <td><?php echo $kisiip; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                        </body>
                        </html>
                    </div>
                </div>
            </div>



        </div>
    </main>

<?php require_once 'inc/alt.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function() {

        $("#update").click(function() {
            var kullanici_adi = $("input[name=kullanici_adi]").val();
            var kullanici_mail = $("input[name=kullanici_mail]").val();
            var kullanici_tel = $("input[name=kullanici_tel]").val();
            var kullanici_adres = $("input[name=kullanici_adres]").val();
            var kullanici_sifre = $("input[name=kullanici_sifre]").val();
            console.log(kullanici_adi,"\n",kullanici_mail,"\n",kullanici_tel,"\n",kullanici_adres,"\n",kullanici_sifre,"\n");
            $.ajax({
                url: "ajaxif/uyeguncelle.php",
                type: "POST",
                data: {
                    'kullanici_adi': kullanici_adi,
                    'kullanici_mail': kullanici_mail,
                    'kullanici_tel': kullanici_tel,
                    'kullanici_adres': kullanici_adres,
                    'kullanici_sifre': kullanici_sifre
                },
                success: function(sonuc){
                    if($.trim(sonuc) == "bos"){
                        swal("Hata","Boş alan bırakmayınız. Tüm bilgileri doldurunuz!!!","error");
                    }else if($.trim(sonuc) == "hata"){
                        swal("Hata","Önceki hesap bilgilerinizi değiştirmeden güncelleme yapamazsınız","error");
                    }else if($.trim(sonuc) == "basarili"){
                        swal("Başarılı","Profil Güncelleme İşlemi Başarıyla Gerçekleşti","success");
                        $("input[name=hesappara]").val( '');
                        window.setTimeout(function(){
                            location.reload();
                        } ,1800);
                    }
                }
            });
        });

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
                        url:"ajaxif/kharaket.php",
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
    });

</script>
