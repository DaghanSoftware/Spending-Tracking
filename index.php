<?php
require_once 'baglan.php';
?>
<link href="sweetalert/sweetalert.css" rel="stylesheet">
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Semih Dağhan</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/ac794817c2.js"></script>
</head>
<body>
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/bg.svg">
		</div>
		<div class="login-content">
            <form action="" method="">
				<img src="img/avatar.svg">
				<h2 class="title">Hoşgeldin</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>E-Posta Adresi</h5>
                       <input type="email" name="kullanici_mail" class="input" required>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i">
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Şifre</h5>
                       <input type="password" name="kullanici_sifre"  class="input" required>
            	   </div>
            	</div>
                        <button type="submit" id="login" class="btn" onclick="return false">Giriş Yap</button>
                        <a href="indexkayitol.php">
                        <input type="button" class="btn" value="Kayıt Ol" name="selam">
                        </a>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="sweetalert/sweetalert.min.js"></script>

</body>
</html>
<script>
    $(document).ready(function(){
        $("#login").click(function(){
            var kullanici_mail = $("input[name=kullanici_mail]").val();
            var kullanici_sifre = $("input[name=kullanici_sifre]").val();
            console.log(kullanici_mail,kullanici_sifre);
            $.ajax({
                url: "kontrol.php",
                type: "POST",
                data:{
                    'kullanici_mail':kullanici_mail,
                    'kullanici_sifre':kullanici_sifre
                },
                success: function(sonuc){
                    if($.trim(sonuc) == "bos"){
                        swal("Hata","Boş Alan Bırakmayınız","error");
                    }else if($.trim(sonuc) == "hata"){
                        swal("Hata","Mail Adresinizi ve Şifrenizi Kontrol Ediniz","error");
                    }else if($.trim(sonuc) == "basarili"){
                        swal("Başarılı","Başarıyla Giriş Yaptınız.Yönlendiriliyorsunuz","success");
                        window.setTimeout(function(){
                            location.href= "panel/index.php";
                        } ,1800);
                    }
                }
            });
        });

    });
</script>
