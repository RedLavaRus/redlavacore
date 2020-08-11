<?php
namespace Modules\Telecom\Modules\Ajax;

use Core\Orm\Orm as Orm;

class Internet
{
    public function index($url)
    {

       $is_id =  $url["get"]["tp"];

            $orm1 = new Orm;
            $tarifs1 = $orm1->select("id,name,opisanie,prises,dop_cods")
                ->where("
                id = $is_id
                "
                )->from("telecom_tarifs")->execute()->object();

            $tpres ='  
            <form>
            <div class="fon_blac_7">
            <div class="a_tp_box_in">
            <div class="tp_box_lect">
                <br>
            </div>
            <div class="tp_box_name">
Название тарифного плана
            <input id="username" name="name" required="required" type="text" value="'.$tarifs1->object[0]["name"].'"/>
             <br><br>
            </div>
            <div class="tp_box_opis">
            Описание тарифного плана
            <textarea id="username" name="opisanie" required="required" type="text" "/>'.$tarifs1->object[0]["opisanie"].'</textarea >
            </div>
            <div class="tp_box_prise">
            цена
                <b><input id="username" name="prises" required="required" type="text" value="'.$tarifs1->object[0]["prises"].'"/></b> <small><small> руб/мес </small></small>
            </div>
            
            <p class="login button">
                <input type="submit" value="Сохранить" />
            </p>
            <br><br><br>
                </div></div>
</form>
                    ';
        
        $result = new \Core\Show\View;
        $result->add("tarifs", $tpres);
        $result->view("/modules/telecom/view/ajax/internet.php");
    }
}