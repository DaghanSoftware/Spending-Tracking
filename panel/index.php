<?php require_once 'inc/ust.php'; ?>
<?php require_once 'inc/sol.php'; ?>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> Hesap İşlemleri</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item active"><a href="#">Anasayfa</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="clearfix"></div>
            <div class="col-md-12">
                <div class="tile">
                    <div class="m-t-30">
                        <body>
                        <div class="container">

                            <!-- Hesap Ekle Kısmı-->
                            <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Yeni Hesap Oluştur <i class="fa fa-user-circle-o" aria-hidden="true"></i></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>


                                        <form action="" method="" id="kayitformu">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Hesap Adı:</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                       <span class="input-group-text" id="basic-addon1">
                                                         <i class="fa fa-address-card" aria-hidden="true"></i>
                                                        </div>
                                                        <input type="text" class="form-control"  name="hesapadi" placeholder="Hesabınızın adını giriniz...">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Para Birimi:</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-try" aria-hidden="true"></i></span>
                                                        </div>
                                                        <select type="text" name="birim" class="form-control required" >
                                                            <option selected>Para Birimi Seçilmedi</option>
                                                            <?php
                                                            foreach ($db->query("SELECT * FROM parabirimi") as $category ){
                                                                echo '<option value="'.$category["pbirim"].'">'.$category["pbirim"].'</option>';
                                                            }
                                                            ?>

                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Hesap Türü:</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                        </div>
                                                        <input type="radio" aria-required="true" name="hesaplar"  value="Kart"> Kart
                                                        <input type="radio" aria-required="true" name="hesaplar"  value="Nakit"> Nakit
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Miktar:</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                       <span class="input-group-text" id="basic-addon1">
                                                         <i class="fa fa-google-wallet" aria-hidden="true"></i>
                                                        </div>
                                                        <input type="number" name="para" class="form-control required" placeholder="Hesabınıza Ekleyeceğiniz Miktarı Giriniz...">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">İptal Et</button>
                                                <input class="btn btn-primary" type="submit" id="kaydet" onclick="return false" value="Hesap Ekle">

                                                <input type="hidden" name="action" value="adduser">
                                                <input type="hidden" name="userid" id="userid" value="adduser">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Hesap Ekle Kısmı Son-->

                            <!-- Para Transferi -->
                            <div class="modal fade" id="paratransfer" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Para Transfer <i class="fa fa-money" aria-hidden="true"></i></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>


                                        <form action="" method="" id="paraTransfer">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Hesap Adı:</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                       <span class="input-group-text" id="basic-addon1">
                                                         <i class="fa fa-first-order" aria-hidden="true"></i>
                                                        </div>
                                                        <select class="custom-select" id="ilkhesap">
                                                            <option selected>Hesap Seçiniz...</option>
                                                            <?php
                                                            foreach ($db->query("SELECT * FROM hesapekle") as $hesapadi ){
                                                                echo '<option value="'.$hesapadi["hesapadi"].'">'.$hesapadi["hesapadi"].'[' . $hesapadi['birim'] . '] ' . ' (' . $hesapadi['nakitkart'] . ')' . '</option>';
                                                            }
                                                            ?>

                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Para Birimi:</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-shirtsinbulk" aria-hidden="true"></i></span>
                                                        </div>
                                                        <select class="custom-select" id="ikincihesap">
                                                            <option selected>Hesap Seçiniz...</option>
                                                            <?php
                                                            foreach ($db->query("SELECT * FROM hesapekle") as $hesapadi ){
                                                                echo '<option value="'.$hesapadi["hesapadi"].'">'.$hesapadi["hesapadi"].'[' . $hesapadi['birim'] . '] ' . ' (' . $hesapadi['nakitkart'] . ')' . '</option>';
                                                            }
                                                            ?>

                                                        </select>
                                                    </div>
                                                </div>




                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Miktar:</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                       <span class="input-group-text" id="basic-addon1">
                                                         <i class="fa fa-try" aria-hidden="true"></i>
                                                        </div>
                                                        <input type="number" name="hesappara" class="form-control required" placeholder="Hesabınıza Ekleyeceğiniz Miktarı Giriniz...">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">İptal Et</button>
                                                <button type="submit" class="btn btn-primary my-3" id="gonder" onclick="return false">Gönder</button>

                                                <input type="hidden" name="action" value="adduser">
                                                <input type="hidden" name="userid" id="userid" value="adduser">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Para Transferi Son -->

                            <div class="row mb-2">
                                <div class="col-3">
                                    <button type="button" class="btn btn-primary m-0" data-toggle="modal" data-target="#userModal"><i class="fa fa-paper-plane"></i>&nbsp;Hesap Ekle <i class="fa fa-user-circle-o" ></i></button>
                                </div>
                                <div class="col-3">
                                <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#paratransfer"><i class="fa fa-money"></i>&nbsp;Para Transferi <i class="fa fa-money" ></i></button>
                                </div>

                            </div>
                            <!-- tablo başlangıcı -->
                            <table class="table"  id="userstable">
                                <thead>
                                <tr>
                                    <th scope="col">İd</th>
                                    <th scope="col">Hesap Adı</th>
                                    <th scope="col">Para Birimi</th>
                                    <th scope="col">Hesap Türü</th>
                                    <th scope="col">Bütçe</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody><tr>
                                    <?php
                                    $sorgu = $db->query("SELECT * FROM hesapekle");
                                    while ( $sonuc = $sorgu->fetch(PDO::FETCH_ASSOC) ){
                                    $accountId = $sonuc['id'];
                                    $hesapadi = $sonuc['hesapadi'];
                                    $birim = $sonuc['birim'];
                                    $hesappss = $sonuc['nakitkart'];
                                    $miktar = $sonuc['miktar'];
                                    ?>

                                    <td class="align-middle"><?php echo $accountId; ?></td>
                                    <td class="align-middle"><?php echo $hesapadi; ?></td>
                                    <td class="align-middle"><?php echo $birim; ?></td>
                                    <td class="align-middle"><?php echo $hesappss; ?></td>
                                    <td class="align-middle"><?php echo $miktar; ?></td>
                                    <td class="align-middle"></td>
                                    <td class="align-middle"></td>

                                    <td>
                                        <button type="button" class="btn btn-warning userViewModal" data-toggle="modal" id="<?php echo $accountId; ?>"><i class="fa fa-address-card-o"></i></button>

                                      <button type="button" class="btn btn-info editAccount" id="<?php echo $accountId; ?>"><i class="fa fa-pencil"></i>Düzenle</button>
                                       <button type="button" class="btn btn-danger delAccount" id="<?php echo $accountId; ?>"><i class="fa fa-trash-o"></i>Sil</button>  </td>

                                </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                            </table><!-- tablo sonu -->
                        </div>
                        <!-- hesapsil -->
                        <div class="modal fade" id="delViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <form action="" method="post" id="deleteForm">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hesabı silmek istediğinize emin misiniz ?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" id="delete_details">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary my-3" id="delete">Sil</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- sil -->
                        <!-- hesap güncelle -->
                        <div class="modal fade" id="editEmpModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <form action="" method="post" id="updateForm">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hesabı Düzenle</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel"></h4>
                                        </div>
                                        <div class="modal-body" id="update_details">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary my-3" id="update">Güncelle</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">İptal Et</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- hesap güncelle son -->
                        <!-- hesap ayrıntı başlangıc -->
                        <div class="modal fade" id="userViewModal" tabindex="-1" role="dialog" aria-labelledby="userViewModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hesap Ayrıntısı <i class="fa fa-info" aria-hidden="true"></i></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container" id="profile">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4">
                                                    <img src="http://placehold.it/100x100" alt="" class="rounded responsive" />
                                                </div>
                                                <div class="col-sm-6 col-md-8">
                                                    <h4 class="text-primary">Nakit Hesabı</h4>
                                                    <p class="text-secondary">
                                                        <i class="fa fa-envelope-o" aria-hidden="true"></i> Miktar:
                                                        <br />
                                                        <i class="fa fa-money" aria-hidden="true"></i> xxxxxxxxxx
                                                    </p>
                                                    <!-- Split button -->
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                    </div>
                                </div>
                            </div>
                            <!-- hesap ayrıntı son -->

                        <div>

                            <!-- Script -->
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
                            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

                        </div>
                        <div id="overlay" style="display:none;">
                            <div class="spinner-border text-danger" style="width: 3rem; height: 3rem;"></div>
                            <br/>
                            Loading...
                        </div>
                        </body>
                        <script>
                            $(document).ready(function(){
                                // $('#overlay').fadeIn().delay(2000).fadeOut();
                            });
                        </script>

                    </div>
                </div>
            </div>
        </div>


        </div>
    </main>
    <script>
        $(document).ready(function(){

            $("#kaydet").click(function(){
                var hesapadi = $("input[name=hesapadi]").val();
                var para = $("input[name=para]").val();
                var birim = $("select[name=birim]").val();
                var hesaplar = document.querySelector('input[name="hesaplar"]:checked').value;
                console.log(hesapadi,para,birim,hesaplar);
                $.ajax({
                    url: "ajaxif/hesapolustur.php",
                    type: "POST",
                    data:{
                        'hesapadi':hesapadi,
                        'para':para,
                        'birim':birim,
                        'hesaplar':hesaplar
                    },
                    success: function(sonuc){
                        if($.trim(sonuc) == "bos"){
                            swal("Hata","Lütfen tüm alanları doldurun","error");
                        }else if($.trim(sonuc) == "hata"){
                            swal("Hata","Sistem hatası oluştu","error");
                        }else if($.trim(sonuc) == "basarili"){
                            swal("Başarılı","Hesap oluşturma işlemi başarıyla gerçekleşti.","success");
                            $("input[name=hesapadi]").val('');
                            $("input[name=para]").val('');
                            window.setTimeout(function(){
                                location.reload();
                            } ,2100);

                        }
                    }
                });
            });
        });


        $(document).ready(function(){
            $("#gonder").click(function(){
                var ilkhesap = document.getElementById('ilkhesap');
                var ilkhesap = ilkhesap.options[ilkhesap.selectedIndex].value;
                var ikincihesap = document.getElementById('ikincihesap');
                var ikincihesap = ikincihesap.options[ikincihesap.selectedIndex].value;
                var hesappara = $("input[name=hesappara]").val();
                console.log(ilkhesap,ikincihesap,hesappara);
                $.ajax({
                    url: "ajaxif/paragonder.php",
                    type: "POST",
                    data:{
                        'ilkhesap':ilkhesap,
                        'ikincihesap':ikincihesap,
                        'hesappara':hesappara
                    },
                    success: function(sonuc){
                        if($.trim(sonuc) == "bos"){
                            swal("Hata","Lütfen tüm alanları doldurun","error");
                        }else if($.trim(sonuc) == "format"){
                            swal("Hata","Farklı para birimleri arasında para transferi yapamazsınız!!!","error");
                        }else if($.trim(sonuc) == "hesap"){
                            swal("Hata","Göndereceğiniz hesap ile gönderen hesap arasında para transferi gerçekleştirilmez!!!","error");
                        }else if($.trim(sonuc) == "hata"){
                            swal("Hata","Sistem hatası oluştu","error");
                        }else if($.trim(sonuc) == "basarili"){
                            swal("Başarılı","Transfer İşlemi Başarıyla Gerçekleşmiştir","success");
                            $("input[name=hesappara]").val( '');
                            window.setTimeout(function(){
                                location.reload();
                            } ,1800);
                        }
                    }
                });
            });
            $(document).on('click', '.delAccount', function() {
                var accountId = $(this).attr('id');
                $.ajax({
                    url: "ajaxif/hesapsilistermisin.php",
                    type: "POST",
                    data: {
                        accountId: accountId
                    },
                    success: function(data) {
                        $("#delete_details").html(data);
                        $("#delViewModal").modal('show');
                    }
                });
            });
            $(document).on('click', '.userViewModal', function() {
                var accountId = $(this).attr('id');
                $.ajax({
                    url: "ajaxif/hesapbilgi.php",
                    type: "POST",
                    data: {
                        accountId: accountId
                    },
                    success: function(data) {
                        $("#profile").html(data);
                        $("#userViewModal").modal('show');
                    }
                });
            });


            $(document).on('click', '#delete', function() {
                $.ajax({
                    url: "ajaxif/hesapsil.php",
                    type: "POST",
                    data: $("#deleteForm").serialize(),
                    success: function(sonuc){
                        if($.trim(sonuc) == "hata"){
                            swal("Hata","Sistem hatası oluştu","error");
                        }else if($.trim(sonuc) == "bos"){
                            swal("Hata","Hesabı Silmek İçin Hesabınızda Para Olmaması Lazım","error");
                        }else if($.trim(sonuc) == "basarili"){
                            swal("Başarılı","Silme İşlemi Başarıyla Gerçekleşti","success");
                            window.setTimeout(function(){
                                location.reload();
                            } ,1800);
                        }
                    }
                });
                return false;
            });
            $(document).on('click', '.editAccount', function() {
                var accountId = $(this).attr('id');
                $.ajax({
                    url: "ajaxif/hesapgüncelleform.php",
                    type: "POST",
                    data: {
                        accountId: accountId
                    },
                    success: function(data) {
                        $("#update_details").html(data);
                        $("#editEmpModal").modal('show');
                    }
                });

            });
            $(document).on('click', '#update', function() {

                $.ajax({
                    url: "ajaxif/hesapgüncelle.php",
                    type: "POST",
                    data: $("#updateForm").serialize(),
                    success: function(data) {
                        swal("Başarılı","Güncelleme işlemi başarıyla gerçekleşti","success");
                        $("input[name=hesappara]").val( '');
                        window.setTimeout(function(){
                            location.reload();
                        } ,1800);
                    }
                });

            });

        });
    </script>

<?php require_once 'inc/alt.php'; ?>