<?php

$var = \Core\Show\View::$var;


$tp_in=
'           <div class="connect_box_i1_head"> '.$var["tp_info"][0]["name"].'<br><br></div>
            
<div class="connect_box_i1_opis2"><b> '.$var["tp_info"][0]["opisanie"].'</b> <br></div>
<div class="connect_box_i1_prise"><b> '. $var["tp_info"][0]["prises"].'</b> <small><small> руб/мес </small></small></div>
';
$zd = new \Modules\Telecom\Modules\Zayavka;
$zd->addClient($var,$tp_in);


$massanger=
'
<h1>Информация о тарифном плане</h1>
        <div class="connect_box_i1">
'.strip_tags($tp_in).'        </div>
<h1>Информация о клиенте</h1>
Улица: '.$var['url']["post"]["s1"].'<br>
Дом: '.$var['url']["post"]["s2"].'<br>
Квартира: '.$var['url']["post"]["s3"].'<br>
Фамилия: '.$var['url']["post"]["s5"].'<br>
Имя: '.$var['url']["post"]["s4"].'<br>
Телефон: '.$var['url']["post"]["s6"].'<br>
';
$massanger_teleg=
'
тариф: '.strip_tags($tp_in).'

Информация о клиенте
Улица: '.$var['url']["post"]["s1"].'
Дом: '.$var['url']["post"]["s2"].'
Квартира: '.$var['url']["post"]["s3"].' 
Фамилия: '.$var['url']["post"]["s5"].' 
Имя: '.$var['url']["post"]["s4"].' 
Телефон: '.$var['url']["post"]["s6"].'
';
$mail =  new \Core\Mail\Send();
$mail -> send("Новая заявка",\CFG::$mail_login,\CFG::$mail_login,$massanger);

$telega = new \Core\Social\Telegram;
$telega -> message(\CFG::$telegram_token, \CFG::$telegram_chat, $massanger_teleg);
?>

<div class="linsloge4">
    Статус
    </div>
    
 
        <div class="sus_bloc">
            <div class="sus_img"><img src="/res/img/sas.png"></div>
            <div class="sus_text"><h1>Ваша заявка принята.</h1> <p>С вами в ближайшее время свяжется оператор!</p></div>
        </div>
    <br><br>