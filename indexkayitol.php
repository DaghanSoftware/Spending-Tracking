<?php
require_once 'baglan.php';
?>
<html>
<head>
	<title>Semih Dağhan</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/bg.svg">
		</div>
		<div class="login-content">
            <form action="kaydet.php" name="registration" method="post" action="" enctype="multipart/form-data">
				<img src="img/avatar.svg">
				<h3 class="title">Kayıt Olma Zamanı</h3>

           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Ad Soyad</h5>
           		   		<input type="text" class="input" name="ukadi" required>
           		   </div>
           		</div>

				           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fa fa-envelope"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Mail Adresi</h5>
           		   		<input type="email" class="input" name="umail" required>
           		   </div>
           		</div>

				           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fa fa-mobile"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Telefon</h5>
           		   		<input type="number" class="input" name="utel" required>
           		   </div>
           		</div>

				
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Şifre</h5>
           		    	<input type="password" class="input" name="usifre" required>
            	   </div>
            	</div>

				    <form method="post" action="">
                        <input type="submit" class="btn" value="Kayıt Ol" name="gonder">
                        <a href="index.php">
                            <input type="button" class="btn" value="Giriş Yap" name="selam">
                        </a>
				    </form
					
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
