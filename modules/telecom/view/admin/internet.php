<?php

$var = \Core\Show\View::$var;


?>
<div id="result"></div>
<div class="box_box">
    <div class="a_line_global">
        <div class="a_line_global_num fl1">Номер</div>
        <div class="a_line_global_name fl8">Найменовани</div>
        <div class="a_line_global_num fl1">Редактирование</div>
        <div class="a_line_global_num fl1">Удаление</div>
    </div>
<?php
        $orm = new \Core\Orm\Orm;
        $tarifs = $orm->select("id,name,opisanie,prises,dop_cods")
            ->where("
            type = shpd
            "
            )->from("telecom_tarifs")->execute()->object();
            $z=0;
        //var_dump("<pre>",$tarifs->object[0]);
foreach ($tarifs->object as $tp) {
    $z++;
    ?>
    <div class="a_line_global">
        <div class="a_line_global_num fl1"><?php echo $tp["id"];?></div>
        <div class="a_line_global_name fl8"><?php echo $tp["name"];?></div>
        <a><div class="a_line_global_num fl1" id="s<?php echo $tp["id"];?>">Редакт</div></a>
        <div class="a_line_global_num fl1">Удалить</div>
    </div>
    <?php
}
?>
</div>
<div class="nav_panel_bot_line"><br>
    <div class="a_button_bun">Сохранить</div>
</div>
<?php
foreach ($tarifs->object as $tp) {
    ?>
<script>
$(function(){
$('#s<?php echo $tp["id"];?>').click(function(){
$.ajax({
  type: "POST",
  url: '/admin/telecom/interten/?go=ajax&func=showtp&tp=<?php echo $tp["id"];?>',
  success: function(data) {
             $('#result').html(data);
  }
});
});
});
</script>
<script>
                jQuery(function($){
                    $(document).mouseup(function (e){ // событие клика по веб-документу
                        var div = $(".a_tp_box_in"); // тут указываем ID элемента
                        var div1 = $(".fon_blac_7"); // тут указываем ID элемента
                        if (!div.is(e.target) // если клик был не по нашему блоку
                            && div.has(e.target).length === 0) { // и не по его дочерним элементам
                            div1.hide(); // скрываем его
                        }
                    });
                })
                
</script>
<?php
}
?>