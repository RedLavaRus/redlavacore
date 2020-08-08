<?php

$var = \Core\Show\View::$var;

    
    ?>
<div class="news">
        
        <div class="news_line">
        <h3>Новости</h3>
        </div>
        <div class="news_line2">
            <div class="block_news_item">
            <h4><?php echo  $var["news"]["0"]["text"];?></h4>
            <?php //<div class="date_news">6 апреля</div>?>
            </div><div class="block_news_item">
            <h4><?php echo  $var["news"][1]["text"];?></h4>
            <?php //<div class="date_news">6 апреля</div>?>
            </div>
            <div class="block_news_item">
            <h4><?php echo  $var["news"][2]["text"];?></h4>
            <?php //<div class="date_news">6 апреля</div>?>
            </div>
            
        </div>
        <div class="news_line2">
            <div class="block_news_item">
            <h4><?php echo  $var["news"][3]["text"];?></h4>
            <?php //<div class="date_news">6 апреля</div>?>
            </div><div class="block_news_item">
            <h4><?php echo  $var["news"][4]["text"];?></h4>
            <?php //<div class="date_news">6 апреля</div>?>
            </div>
            <div class="block_news_item">
            <h4><?php echo  $var["news"][5]["text"];?></h4>
            <?php //<div class="date_news">6 апреля</div>?>
            </div>
        </div>
        <br><br><br>
    </div>