<?php

$var = \Core\Show\View::$var;
$name = "";
$kan = "";
//var_dump($var)
if($var["tps"] == 1){
    $name = "Пакет - Социальный";
    $kan = "67 каналов";
}
if($var["tps"] == 2){
    $name = "Пакет - Базовый";
    $kan = "122 каналов";
}
if($var["tps"] == 3){
    $name = "Пакет - Расширенный";
    $kan = "154 каналов";
}
?>

<div class="chanal_list_ajax_show">
    <div class="tv_packet_name"><?php echo $name;?></div>
    <div class="tv_packet_hate"><?php echo $kan;?></div>
    <div class="tv_packet_box">
    <?php 
    $tv = new \Modules\Telecom\Modules\TvList;
    $tv_chan = $tv->show($var["tps"]);
    foreach($tv_chan->object as $tvc)
    {
        echo '<div class="chanel_view1"><img src="/res/img/telecom/tv/'.$tvc["img"].'"><p>'.$tvc["name"].'</p></div>';
    }
    ?>
    
    </div>
    
    
    
    </div>

