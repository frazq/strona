<?php require('config.php');?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $nazwa ?></title>
    <link rel="stylesheet" href="css/system.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate-wow.css">
    <link rel="stylesheet" href="css/dclink.css">
    <link rel="stylesheet" href="css/4style.css">
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/slick.min.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>
<body>

<div class="header">
  <a href="<?php echo $link?>" class="logo"><?php echo $nazwa ?></a>
  <div class="header-right">
    <a class="active" href="lista.php">Lista</a>
    <a href="#">Kontakt</a>
    <a href="#">O nas</a>
  </div>
</div>