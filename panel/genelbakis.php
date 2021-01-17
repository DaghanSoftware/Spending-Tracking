<?php require_once 'inc/ust.php'; ?>
<?php require_once 'inc/sol.php'; ?>
    <style>
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
            width: 150px;
            height: 150px;
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
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> Genel Bakış</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Anasayfa</li>
                <li class="breadcrumb-item active"><a href="#">Genel Bakış</a></li>
            </ul>
        </div>
        <div class="row">

            <div class="clearfix"></div>
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-6">
                        <div class="tile">
                            <h3 class="text-center">Toplam Gelirler</h3>
                            <div class="main-right">
                            <div class="circle-card">
                                <img src="images/para.png" />
                                <h4>   <?php
                                    $Fiyat=$db->prepare("SELECT SUM(miktar) AS takma_ad FROM hesapekle");
                                    $Fiyat->execute();
                                    $FiyatYaz= $Fiyat->fetch(PDO::FETCH_ASSOC);
                                    $topla=$FiyatYaz['takma_ad'];
                                    echo $topla;
                                    ?>

                                </h4>
                            </div>

                        </div>


                            <?php
                            $stmt = $db->prepare("SELECT * FROM hesapekle");
                            $stmt->execute();
                            $json=[];
                            $json2=[];
                            while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {

                                extract($row);
                                $json[]= $hesapadi;
                                $json2[]= (int)$miktar;
                            }
                            ?>
                            <canvas id="xchart"></canvas>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
                            <script type="text/javascript">


                                var ctx = document.getElementById('xchart').getContext('2d');
                                var Chart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: <?php echo json_encode($json);?>,
                                        datasets: [{
                                            label: 'Gelirler',
                                            data: <?php echo json_encode($json2);?>,
                                            backgroundColor: [
                                                'rgba(255, 54, 71, 0.5)',
                                                'rgba(0, 79, 255, 0.8)',
                                                'rgba(255, 131, 14, 0.5)',
                                                'rgba(106, 187, 127, 0.9)',
                                                'rgba(255, 0, 0, 0.7)',
                                                'rgba(174, 113, 246, 1)'
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
                    <div class="col-md-6">
                        <div class="tile">
                            <h3 class="text-center">Toplam Giderler</h3>
                            <div class="main-right">
                                <div class="circle-card">
                                    <img src="images/gider.png" />
                                    <h4>   <?php
                                        $gider=$db->prepare("SELECT SUM(harcananmiktar) AS gideryaz FROM haraketler");
                                        $gider->execute();
                                        $gideryaz= $gider->fetch(PDO::FETCH_ASSOC);
                                        $gidertopla=$gideryaz['gideryaz'];
                                        echo $gidertopla;

                                        ?>


                                    </h4>
                                </div>

                            </div>


                            <?php
                            $stmt = $db->prepare("SELECT * FROM haraketler");
                            $stmt->execute();
                            $json=[];
                            $json2=[];
                            while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {

                                extract($row);
                                $json[]= $islemhesap;
                                $json2[]= (int)$harcananmiktar;
                            }
                            ?>
                            <canvas id="myChart"></canvas>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
                            <script type="text/javascript">


                                var ctx = document.getElementById('myChart').getContext('2d');
                                var Chart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: <?php echo json_encode($json);?>,
                                        datasets: [{
                                            label: 'Giderler',
                                            data: <?php echo json_encode($json2);?>,
                                            backgroundColor: [
                                                'rgba(255, 54, 71, 0.5)',
                                                'rgba(0, 79, 255, 0.8)',
                                                'rgba(255, 131, 14, 0.5)',
                                                'rgba(106, 187, 127, 0.9)',
                                                'rgba(255, 0, 0, 0.7)',
                                                'rgba(174, 113, 246, 1)'
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
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="widget-small info coloured-icon"><i class="icon fa fa-user-plus fa-3x"></i>
                            <div class="info">
                                <h4>Hesaplar</h4>
                                <p><b>
                                        <?php
                                        $sorgu = $db->prepare("SELECT COUNT(*) FROM hesapekle");
                                        $sorgu->execute();
                                        $say = $sorgu->fetchColumn();
                                        echo ' ' . $say . ' ';

                                        ?>
                                    </b></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="widget-small primary coloured-icon"><i class="icon fa fa-hourglass-start fa-3x"></i>
                            <div class="info">
                                <h4>Son Harcama</h4>
                                <p><b>
                                        <?php
                                        $sql=$db->query("SELECT * FROM haraketler ORDER BY id DESC LIMIT 1 ");
                                        while ($yaz=$sql->fetch(PDO::FETCH_ASSOC))
                                        {
                                            echo $yaz['harcananmiktar']."<br/>";

                                        }
                                        ?>
                                    </b></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="widget-small warning coloured-icon"><i class="icon fa fa-credit-card fa-3x"></i>
                            <div class="info">
                                <h4>Aylık Gider</h4>
                                <p><b>
                                        <?php
                                        $sorgu = $db->prepare("SELECT SUM(harcananmiktar) FROM haraketler WHERE MONTH(anlikzaman) = MONTH(CURDATE()); ");
                                        $sorgu->execute();
                                        $say = $sorgu->fetchColumn();
                                        echo ' ' . $say . ' ';

                                        ?>
                                    </b></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="widget-small danger coloured-icon"><i class="icon fa fa-try fa-3x"></i>
                            <div class="info">
                                <h4>Günlük Gider</h4>
                                <p><b>
                                        <?php
                                        $sorgu = $db->prepare("SELECT SUM(harcananmiktar) FROM haraketler WHERE DAY(anlikzaman) = DAY(CURDATE()); ");
                                        $sorgu->execute();
                                        $say = $sorgu->fetchColumn();
                                        echo ' ' . $say . ' ';

                                        ?></b></p>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="assets/js/jquery.js"></script>
                <script src="assets/js/bootstrap.min.js"></script>
                <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
                <script src="assets/js/jquery.scrollTo.min.js"></script>
                <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
                <script src="assets/js/common-scripts.js"></script>
                <script>
                    $(function(){
                        $('select.styled').customSelect();
                    });

                </script>

            </div>
        </div>
    </main>
<?php require_once 'inc/alt.php'; ?>