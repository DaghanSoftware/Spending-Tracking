<?php require_once 'inc/ust.php'; ?>
<?php require_once 'inc/sol.php'; ?>
        <style>
            .row-mb-20 {
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: space-around;
                margin: 1% 0 0 1%;
                width: 102%;
            }
            .main-right {
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: space-around;
                margin: 1% 0 0 1%;
                width: 98%;
            }

            .circle-card {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                width: 150px;
                height: 150px;
                margin: 10px;
                background: white;
                border-radius: 100%;


            }

            .circle-card img {
                width: 115px;
                height: 119px;
            }

            .circle-card h5 {
                margin-top: 3px;
                text-align: center;
                background: white;
            }

            .circle-card h1 {
                margin-top: 40px;
                text-align: center;
            }


            @media only screen and (max-width: 1366px) {
                .circle-card{
                    width: 135px;
                    height: 135px;
                }
                .circle-card img {
                    width: 120px;
                    height: 120px;
                    border-radius: 50%;
                    border: 1px solid #999;
                }

                .circle-card h4 {
                    font-size: 1.3em;
                    margin-top: 5px;
                }

                .circle-card h1 {
                    font-size: 1.6em;
                    margin-top: 15px;
                }



            }

            @media only screen and (max-width: 768px) {
                .main-content{
                    width:100%;
                }

                .main-right {
                    width: 100%;
                    justify-content: center;
                }

                .circle-card{
                    width: 190px;
                    height: 190px;
                }

                .circle-card img {
                    width: 70px;
                    height: 70px;
                }


            }
        </style>
    <main class="app-content">
        <div class="row">
            <div class="clearfix"></div>
            <div class="col-md-12">
                <div class="tile">
                    <div class="m-t-30">
                        <body>
                        <div class="container">

                            <!-- Harcama Ekle Kısmı-->
                            <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Harcama Ekle <i class="fa fa-money" aria-hidden="true"></i></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>



                                        <form action="" method="" id="kayitformu">
                                            <div class="modal-body">


                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">İşlem Yapılan Hesap:</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-university" aria-hidden="true"></i></span>
                                                        </div>
                                                        <select type="text" name="islemhesap" class="form-control required" >
                                                            <option selected>Henüz bir hesap seçilmedi</option>
                                                            <?php
                                                            foreach ($db->query("SELECT * FROM hesapekle") as $kategori ){
                                                                echo '<option value="'.$kategori["hesapadi"].'">'.$kategori["hesapadi"].'[' . $kategori['birim'] . '] ' . ' (' . $kategori['nakitkart'] . ')' . '</option>';
                                                            }
                                                            ?>

                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Kategoriler:</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-shopping-basket" aria-hidden="true"></i></span>
                                                        </div>
                                                        <select type="text" name="kategori" class="form-control required" >
                                                            <option selected>Henüz bir kategori seçilmedi... </option>
                                                            <?php
                                                            foreach ($db->query("SELECT * FROM chartjs") as $kategori ){
                                                                echo '<option value="'.$kategori["title"].'">'.$kategori["title"].'</option>';
                                                            }
                                                            ?>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Kurum:</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                       <span class="input-group-text" id="basic-addon1">
                                                         <i class="fa fa-briefcase" aria-hidden="true"></i>
                                                        </div>
                                                        <input type="text" name="kurum" class="form-control required" placeholder="Harcama yaptığınız kurumu giriniz...">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Miktar:</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                       <span class="input-group-text" id="basic-addon1">
                                                         <i class="fa fa-money" aria-hidden="true"></i>
                                                        </div>
                                                        <input type="number" name="harcananmiktar" class="form-control required" placeholder="Harcama yaptığınız miktarı Giriniz...">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">İptal Et</button>
                                                <input class="btn btn-primary" type="submit" id="kaydet" onclick="return false" value="Ekle">

                                                <input type="hidden" name="action" value="adduser">
                                                <input type="hidden" name="userid" id="userid" value="adduser">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <!-- harcama ekle son -->

                            <div class="row-mb-20" >
                                <div class="col-3">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userModal"><i class="fa fa-credit-card" ></i>Harcama Ekle <i class="fa fa-credit-card" ></i></button>
                                </div>
                            </div>
                            <!-- kartlar -->
                                   <br>
                            <div class="main-right">


                                <div class="circle-card">
                                    <img src="images/healt.png" />
                                    <h5>Sağlık</h5>
                                    <h4>   <?php $saglik = $db->query("SELECT amounts FROM chartjs WHERE id = 1")->fetch(PDO::FETCH_ASSOC);

                                        $deriko = $saglik['amounts'];
                                        echo $deriko;
                                        ?>
                                    </h4>
                                </div>

                                <div class="circle-card">
                                    <img src="images/akaryakit.jpg" />
                                    <h5>Akaryakıt</h5>
                                    <h4><?php $saglik = $db->query("SELECT amounts FROM chartjs WHERE id = 2")->fetch(PDO::FETCH_ASSOC);

                                        $deriko = $saglik['amounts'];
                                        echo $deriko;
                                        ?></h4>
                                </div>



                                <div class="circle-card">
                                    <img src="images/market.png" />
                                    <h5>Market</h5>
                                    <h4><?php $saglik = $db->query("SELECT amounts FROM chartjs WHERE id = 3")->fetch(PDO::FETCH_ASSOC);

                                        $deriko = $saglik['amounts'];
                                        echo $deriko;
                                        ?></h4>
                                </div>

                                <div class="circle-card">
                                    <img src="images/restorant.jpg" />
                                    <h5>Restorant</h5>
                                    <h4><?php $saglik = $db->query("SELECT amounts FROM chartjs WHERE id = 4")->fetch(PDO::FETCH_ASSOC);

                                        $deriko = $saglik['amounts'];
                                        echo $deriko;
                                        ?></h4>
                                </div>

                                <div class="circle-card">
                                    <img src="images/ulasim.jpg" />
                                    <h5>Ulaşım</h5>
                                    <h4><?php $saglik = $db->query("SELECT amounts FROM chartjs WHERE id = 5")->fetch(PDO::FETCH_ASSOC);

                                        $deriko = $saglik['amounts'];
                                        echo $deriko;
                                        ?></h4>
                                </div>

                                <div class="circle-card">
                                    <img src="images/hediye.jpg" />
                                    <h5>Hediye</h5>
                                    <h4><?php $saglik = $db->query("SELECT amounts FROM chartjs WHERE id = 6")->fetch(PDO::FETCH_ASSOC);

                                        $deriko = $saglik['amounts'];
                                        echo $deriko;
                                        ?></h4>
                                </div>



                            </div>
                        </div>
                        <div>

                            <!-- JS, Popper.js, and jQuery -->
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

        <!-- Para Transferi Başlangıç -->
        <div class="row">

            <div class="clearfix"></div>
            <div class="col-md-12">
                <div class="tile">
                    <div class="m-t-30">
                        <?php
                        $stmt = $db->prepare("SELECT * FROM chartjs");
                        $stmt->execute();
                        $json=[];
                        $json2=[];
                        while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {

                            extract($row);
                            $json[]= $title;
                            $json2[]= (int)$amounts;
                        }
                        ?>
                        <canvas id="myChart"></canvas>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
                        <script type="text/javascript">


                            var ctx = document.getElementById('myChart').getContext('2d');
                            var Chart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: <?php echo json_encode($json);?>,
                                    datasets: [{
                                        label: 'Kategoriler ve Harcama Grafikleri',
                                        data: <?php echo json_encode($json2);?>,
                                        backgroundColor: [
                                            'rgba(255, 54, 71, 0.5)',
                                            'rgba(0, 48, 239, 0.6)',
                                            'rgba(255, 131, 14, 0.5)',
                                            'rgba(106, 187, 127, 0.9)',
                                            'rgba(255, 0, 0, 0.6)',
                                            'rgba(255, 45, 181, 0.6)'
                                        ],
                                        borderColor: [
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },

                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>

    </main>
<?php require_once 'inc/alt.php'; ?>
    <script>
        $(document).ready(function(){

            $("#kaydet").click(function(){
                var islemhesap = $("select[name=islemhesap]").val();
                var kategori = $("select[name=kategori]").val();
                var kurum = $("input[name=kurum]").val();
                var harcananmiktar = $("input[name=harcananmiktar]").val();
                console.log(islemhesap,kategori,kurum,harcananmiktar);
                $.ajax({
                    url: "ajaxif/harcamaekle.php",
                    type: "POST",
                    data:{
                        'islemhesap':islemhesap,
                        'kategori':kategori,
                        'kurum':kurum,
                        'harcananmiktar':harcananmiktar
                    },
                    success: function(sonuc){
                        if($.trim(sonuc) == "format"){
                            swal("Hata","Boş Alan Bırakmayınız!!!","error");
                        }else if($.trim(sonuc) == "hata"){
                            swal("Hata","Sistem hatası oluştu","error");
                        }else if($.trim(sonuc) == "basarili"){
                            swal("Başarılı","Harcama başarıyla eklendi","success");
                            $("input[name=hesappara]").val( '');
                            window.setTimeout(function(){
                                location.reload();
                            } ,1800);
                        }
                    }
                });
            });
        });

    </script>

