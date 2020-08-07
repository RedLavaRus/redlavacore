<?php

$var = \Core\Show\View::$var;
?>

<div class="linsloge4">
Подключить Интернет в Краснодаре
    </div>
    
    <div class="connect_box">
        <div class="connect_box_i1">
        
            <div class="connect_box_i1_head"><?php echo $var["tp_info"][0]["name"];?> <br><br></div>
            
            <div class="connect_box_i1_opis2"><b><?php echo $var["tp_info"][0]["opisanie"];?></b> <br></div>
            <div class="connect_box_i1_prise"><b><?php echo $var["tp_info"][0]["prises"];?></b> <small><small> руб/мес </small></small></div>
        </div>
        <div class="connect_box_i2">
                     <form action="/connect/zayavka/" method="post">
                <input name="tp" value="<?php echo $_GET["tp"] ?>" type="hidden">
                <input name="meneger" value="Алексей" type="hidden">
                <input name="s1" value="" class="text_adr_p" placeholder="Улица" required>
                <input name="s2" value="" class="text_adr_p1" placeholder="Дом" required>
                <input name="s3" value="" class="text_adr_p1" placeholder="Квартира" required>
                <input name="s4" value="" class="text_adr_p" placeholder="Имя" required>
                <input name="s5" value="" class="text_adr_p" placeholder="Фамилия" required>
                <input name="s6" value="" class="text_adr_p" placeholder="Телефон" required>
                
                <button  class="butt">Подключиться</button>
            </form>
            
        </div>
    </div>