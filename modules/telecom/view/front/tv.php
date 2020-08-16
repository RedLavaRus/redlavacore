<?php

$var = \Core\Show\View::$var;

?>

<div class="linsloge4">Основные пакеты</div>
<div class="ty_box">
<div class="tv_packet_chalenger">
<h3>Социальный</h3>
<h4>59 ₽/мес</h4>
<div class="chanel_tv">
<div class="chanel_tv_head">67</div>
<div class="chanel_tv_foot">каналов</div>

</div>
<a  id="tv1"   class="calan_list">Список каналов</a>
</div>
<div class="tv_packet_chalenger">
<h3>Базовый</h3>
<h4>180 ₽/мес</h4>
<div class="chanel_tv">
<div class="chanel_tv_head">122</div>
<div class="chanel_tv_foot">каналов</div></div>
<a  id="tv2"   class="calan_list">Список каналов</a>
</div>
<div class="tv_packet_chalenger">
<h3>Расширенный</h3>
<h4>279 ₽/мес</h4>
<div class="chanel_tv">
<div class="chanel_tv_head">154</div>
<div class="chanel_tv_foot">каналов</div></div>
<a  id="tv3"   class="calan_list">Список каналов</a>
</div>
</div>
 <div id="res">   </div>
                
        

</div>


<script>
$(document).ready(function(){
    $('#tv1').click(function(){
    $.ajax({
    url: "/?go=ajax&func=showtvpack&tp=1",
    cache: false,
    success: function(html){
    $("#res").html(html);
    }
    });
    return false;
    });

    $('#tv2').click(function(){
    $.ajax({
    url: "/?go=ajax&func=showtvpack&tp=2",
    cache: false,
    success: function(html){
    $("#res").html(html);
    }
    });
    return false;
    });

    $('#tv3').click(function(){
    $.ajax({
    url: "/?go=ajax&func=showtvpack&tp=3",
    cache: false,
    success: function(html){
    $("#res").html(html);
    }
    });
    return false;
    });
    });

</script>