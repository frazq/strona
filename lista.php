<?php

require('inc/config.php');
require('inc/header.php');
?>


<div class="page-content-product">
         <div class="main-product">
            <div class="container">
               <div class="row clearfix">
                  <div class="find-box">
                     <h1>Lista najbardziej<br>opłacalnych inwestycji</h1>
                     <h4>Zobacz je już teraz!</h4>
                     <div class="product-sh">
                        <div class="col-sm-3">
                        </div>
                     </div>
                  </div>
               </div>


        <?php
            error_reporting(0);
            include 'includes/config.php';
            $connect = mysqli_connect($db_host, $db_user, $db_pass, $db_table);
            $connect->set_charset('utf8mb4');
            if($connect === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            
            $results_per_page = 10;
            $query = "SELECT * FROM bot_linki ORDER BY bump desc LIMIT 0, 10";
            $results = mysqli_query($connect, $query) or die(mysqli_error());

            if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
            $start_from = ($page-1) * $results_per_page;
            $sql = "SELECT * FROM bot_linki ORDER BY bump desc LIMIT $start_from, ".$results_per_page;
            $rs_result = $connect->query($sql); 
            while($row = $rs_result->fetch_assoc()) {
                extract($row);
                    $nazwa_serwera = (strlen($nazwa_serwera) > 16) ? substr($nazwa_serwera,0,16).'..' :$nazwa_serwera;
                    $description = (strlen($description) > 30) ? substr($description,0,30).'..' :$description;
                            echo '<div class="col-lg-6">';
                            if ($premium == 1){
                                echo '<div class="trend-item" style="background: linear-gradient(#F7971E, #F45C43); border-radius: 20px;">';
                                echo '<div class="trend-pic">';
                                    echo "<img src=\"$icon_url\">";
                                        echo '</div>';
                                    echo '<div class="trend-text">';
                                    echo '<h4 style="color: #fff;">'.$nazwa_serwera.'</h4>';
                                        echo '<span style="color: #fff;">'.$kategoria.'</span>';
                                        echo '<p style="color: #fff;">'.$description.'</p>';
                                        echo "<a href=\"https://dclink.pl/$guild_link\">";
                                        echo '<div class="closed" style="background-color: #CACDD6; border-radius: 5px; background: #fff; color: #000;">Zobacz</div>';
                                        echo '</a>';
                                        echo "<a href=\"$invite\">";
                                        echo '<div class="open" style="border-radius: 5px; background: #fff; color: #000;">Dołącz</div>';
                                        echo '</a>';
                                        echo '</div>';
                                        
                                    echo '<div class="tic-text" style="color: #000; background-color: #fff;">Premium</div>';
                                    echo '</div>';
                        echo '</div>';
                            }
                            elseif ($premium == 2){
                                echo '<div class="trend-item" style="background: linear-gradient(#11eda7, #11b6ed); border-radius: 20px;">';
                                echo '<div class="trend-pic">';
                                    echo "<img src=\"$icon_url\">";
                                        echo '</div>';
                                    echo '<div class="trend-text">';
                                    echo '<h4 style="color: #fff;">'.$nazwa_serwera.'</h4>';
                                        echo '<span style="color: #fff;">'.$kategoria.'</span>';
                                        echo '<p style="color: #fff;">'.$description.'</p>';
                                        echo "<a href=\"https://dclink.pl/$guild_link\">";
                                        echo '<div class="closed" style="background-color: #CACDD6; border-radius: 5px; background: #fff; color: #000;">Zobacz</div>';
                                        echo '</a>';
                                        echo "<a href=\"$invite\">";
                                        echo '<div class="open" style="border-radius: 5px; background: #fff; color: #000;">Dołącz</div>';
                                        echo '</a>';
                                        echo '</div>';
                                        
                                    echo '<div class="tic-text" style="color: #000; background-color: #fff;">Partner</div>';
                                    echo '</div>';
                        echo '</div>';
                            }
                            else{
                                echo '<div class="trend-item" style="border-radius: 20px;">';
                                echo '<div class="trend-pic">';
                                    echo "<img src=\"$icon_url\">";
                                        echo '</div>';
                                    echo '<div class="trend-text">';
                                    echo '<h4>'.$nazwa_serwera.'</h4>';
                                        echo '<span>'.$kategoria.'</span>';
                                        echo '<p>'.$description.'</p>';
                                        echo "<a href=\"https://dclink.pl/$guild_link\">";
                                        echo '<div class="closed" style="border-radius: 5px; background: #039dfc;">Zobacz</div>';
                                        echo '</a>';
                                        echo "<a href=\"$invite\">";
                                        echo '<div class="open" style="border-radius: 5px; background: #039dfc;">Dołącz</div>';
                                        echo '</a>';
                                        echo '</div>';
                                        
                                    echo '<div class="tic-text" >Free</div>';
                                    echo '</div>';
                        echo '</div>';
                            }
                            
                        }
        ?>
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="<?php echo $link?>/lista.php?page=1">1</a></li>
  </ul>
</nav>



<?php require('inc/footer.php');?>