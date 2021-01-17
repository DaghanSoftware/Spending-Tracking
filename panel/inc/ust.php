<?php
require_once 'sistem/baglan.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">

    <title>Kullanıcı Paneli</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/main.css">

   <link href="js/sweetalert/sweetalert.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="app sidebar-mini">

<header class="app-header"><a class="app-header__logo" href="index.php">Ana Sayfa</a>
<a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>

    <ul class="app-nav">
        <li><a onclick="return confirm('Çıkış yapmak istiyor musunuz ?');" class="app-nav__item" href="cikis.php"><i class="fa fa-sign-out fa-lg"></i>Çıkış yap</a></li>
    </ul>
</header>