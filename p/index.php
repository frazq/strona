<?php

require('inc/config.php');
require('inc/header.php');

$guild_id = $_GET['id'];

include 'includes/config.php';
$link = mysqli_connect("$db_host", "$db_user", "$db_pass", "$db_table");
$link->set_charset('utf8mb4');

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT * FROM `bot_linki` WHERE guild_link='$guild_id'";

$result = $link->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
} else {
  header('Location: info.php');
}

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
    <link rel="stylesheet" type="text/css" href="system.css">
    <link rel="stylesgeet" href="https://rawgit.com/creativetimofficial/material-kit/master/assets/css/material-kit.css">


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=":busts_in_silhouette: Online: <?php echo "brak"; ?>"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <title><?php echo $row['nazwa_serwera']. " - <?php echo $nazwa?>"; ?></title>
    <?php if($row['premium']=="1") {?>
        <meta name="theme-color" content="#<?php echo $row['embed_color']; ?>">
    <?php } else {?>
        <meta name="theme-color" content="#4c61b1">
    <?php } ?>
    <meta property="og:url" content="<?php echo $link?>">
    <meta property="og:type" content="website">
  
    <meta property="og:title" content="<?php echo $row['nazwa_serwera']; ?>">
  
    <meta property="og:description" 
    content="🔸 Kategoria: <?php echo $row['kategoria']; ?>
             👥 Użytkowników: <?php echo $row['members']; ?>" />
    <meta property="og:site_name" content="Beta testy nowego layoutu profili serwerów" />
    <meta property="og:image" content="<?php echo $row['icon_url']; ?>" >
    <?php if($row['auto_inv']=="yes") {?>
        <meta HTTP-EQUIV="Refresh" CONTENT="1;URL=<?php echo $row['invite']; ?>">
    <?php }?>

    <?php if($row['auto_inv']=="yes") {?>
        <meta HTTP-EQUIV="Refresh" CONTENT="1;URL=<?php echo $row['invite']; ?>">
    <?php }?>
</head>

<body class="profile-page">


    <nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg "  color-on-scroll="100"  id="sectionsNav">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="info.php"><?php echo $nazwa?> </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="dropdown nav-item">
                      <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">
                          <i class="material-icons">apps</i> STRONA
                      </a>
                      <div class="dropdown-menu dropdown-with-icons">
                        <a href="regulamin.php" class="dropdown-item">
                            <i class="material-icons">layers</i> Regulamin
                        </a>
                        
                        <a href="lista.php" class="dropdown-item">
                            <i class="material-icons">content_paste</i> Lista
                        </a>

                        <a href="<?php echo $link?>/support" class="dropdown-item">
                            <i class="material-icons">content_copy</i> Support
                        </a>
                      </div>
                    </li>
      				<li class="nav-item">
                      <a href="https://discord.com/oauth2/authorize?client_id=677232158276059147&scope=bot&permissions=8" class="nav-link">
                          <i class="fa fa-plus-square" aria-hidden="true"></i> Dodaj bota
      					</a>
      				</li>
      				
                </ul>
            </div>
        </div>
    </nav>
    
    <?php if(!$row['premium']=="1") {?>
        <div class="page-header header-filter" data-parallax="true" style="background-image: url('https://cutewallpaper.org/21/discord-backrounds/Quickly-remade-the-new-discord-invite-background-discordapp.jpg');""></div>
    <?php } else {
        if($row['type']=="1") {?>
            <div class="page-header header-filter" data-parallax="true" style="background-image:url('<?php echo $row['back_url'];?>');"></div>
        <?php } elseif($row['type']=="2") { ?>
            <div class="page-header header-filter" data-parallax="true" style="background-color: #<?php echo $row['color_theme'];?>;"></div>
    <?php }
    }?>

    <div class="main main-raised">
		<div class="profile-content">
            <div class="container">
                <div class="row">
	                <div class="col-md-6 ml-auto mr-auto">
        	           <div class="profile">
	                        <div class="avatar">
	                            <img src="<?php echo $row['icon_url'];?>" alt="avatar" class="img-raised rounded-circle img-fluid">
	                        </div>
	                        <div class="name">
	                            <h3 class="title"><?php echo $row['nazwa_serwera'];?></h3>
								<h6><?php echo $row['kategoria'];?></h6>
	                        </div>
	                    </div>
    	            </div>
                </div>
                <div class="description text-center">
                    <p style="color: #000; font-size: 20px;"><?php echo $row['description'];?></p><br><br>
                    <h3 style="font-size: 40px; color: #000;"><?php echo $row['members'];?></h3>
                    <p style="color: #000;">Użytkowników</p>
                </div>
				<div class="row">
					<div class="col-md-6 ml-auto mr-auto">
                        <div class="profile-tabs">
                          <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="<?php echo $row['invite'];?>">
                                <i class="fa fa-plus-square" aria-hidden="true"></i>
                                  Dołącz
                                </a>
                            </li>  
                          </ul>
                        </div>
    	    	</div>
            </div>
        
          <div class="tab-content tab-space">
            <div class="tab-pane active text-center gallery" id="studio">
  				<div class="row">
  					<div class="col-md-3 ml-auto">
  					</div>
  					<div class="col-md-3 mr-auto">
  					</div>
  				</div>
  			</div>
            <div class="tab-pane text-center gallery" id="works">
      			<div class="row">
      				<div class="col-md-3 ml-auto">
                   <div class="col-md-3 mr-auto">
                   </div>
      			</div>
  			</div>
            <div class="tab-pane text-center gallery" id="favorite">
      			<div class="row">
      				<div class="col-md-3 ml-auto">
      				</div>
      				<div class="col-md-3 mr-auto">
      				 </div>
      			</div>
      		</div>
          </div>

        
            </div>
        </div>
	</div>
	
    <?php if(!$row['premium']=='1'){?>
	<footer class="footer text-center ">
		<p><script type="text/javascript">
	atOptions = {
		'key' : '4646a5f92cbda5bd58308df7a770d14b',
		'format' : 'iframe',
		'height' : 60,
		'width' : 468,
		'params' : {}
	};
	document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.bestdisplayformats.com/4646a5f92cbda5bd58308df7a770d14b/invoke.js"></scr' + 'ipt>');
</script></p>
        <p><?php echo $nazwa?> 2020</p>
    </footer>
    <?php } else {?>
    <footer class="footer text-center ">
    <p><?php echo $nazwa?> 2020</p>
    </footer>
    <?php } ?>
    
    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>

<?php require('inc/footer.php');?>