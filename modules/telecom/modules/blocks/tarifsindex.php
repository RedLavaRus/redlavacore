<?php
namespace Modules\Telecom\Modules\Blocks;

use Core\Orm\Orm as Orm;

class TarifsIndex
{
    public function index($url)
    {

        $result = new \Core\Show\View;
        $orm = new Orm;
        $tarifs = $orm
            ->select("id,tp_id,turn")
            ->from("telecom_index")
            ->execute()
            ->object();

        //var_dump("<pre>",$tarifs->object);
        $tpres="";
        $i=0;
        foreach($tarifs->object as $tps)
        {
            $orm1 = new Orm;
            $tarifs1 = $orm1->select("id,name,opisanie,prises,dop_cods")
                ->where("
                id = ".$tps["tp_id"]."
                "
                )->from("telecom_tarifs")->execute()->object();
            $tpres.='<div class="tp_box_in">
            <div class="tp_box_lect">
                <br>
            </div>
            <div class="tp_box_name">
            '.$tarifs1->object[0]["name"].' <br><br>
            </div>
            <div class="tp_box_opis">
    
            '.$tarifs1->object[0]["opisanie"].'
            </div>
            <div class="tp_box_prise">
            
                <b>'.$tarifs1->object[0]["prises"].'</b> <small><small> руб/мес </small></small>
            </div>
            <a href="/connect/?tp='.$tarifs1->object[0]["id"].'">
                <div class="tp_box_connect">
                    ПОДКЛЮЧИТЬ
                </div>
            </a>
    
        </div>';
        $i++;
        }
        
        $result->add("tarifs", $tpres);
        $result->view("/modules/telecom/view/bloks/tarifsindex.php");
    }
}