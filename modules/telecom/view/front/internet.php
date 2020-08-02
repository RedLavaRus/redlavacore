<?php

$var = \Core\Show\View::$var;

?>

<div class="linsloge4">
    Подключиться к ТТК в Краснодаре<br>
    Подключим Интернет за 1 день
    </div>
    
<div class="tp_box">
        <?php
        $tp= new \Modules\Telecom\Modules\Tarifs;
        $tp->showTP($var["tarifs"]->object);

?>
        
                
        

</div>