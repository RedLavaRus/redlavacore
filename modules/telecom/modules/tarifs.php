<?php
namespace Modules\Telecom\Modules;

use Core\Orm\Orm as Orm;

class Tarifs
{
    public function tarifs($type)
    {
 
        $orm = new Orm;
        $tarifs = $orm->select("id,name,opisanie,prises,dop_cods")
            ->where("
            type = $type
            "
            )->from("telecom_tarifs")->execute()->object();

            return $tarifs;

    }
    public function showTP($tarifs)
    {
        $x = 0;
        foreach($tarifs as $tp)
        {
            
        $x++;
        if($x == 5)
        {
            echo '</div><div class="tp_box">';
            $x=1;
        }
        echo '<div class="tp_box_in">
            <div class="tp_box_lect">
                <br>
            </div>
            <div class="tp_box_name">
            '.$tp["name"].' <br><br>
            </div>
            <div class="tp_box_opis">

            '.$tp["opisanie"].'
            </div>
            <div class="tp_box_prise">
            
                <b>'.$tp["prises"].'</b> <small><small> руб/мес </small></small>
            </div>
            <a href="/connect/'.$tp["id"].'">
                <div class="tp_box_connect">
                    ПОДКЛЮЧИТЬ
                </div>
            </a>

        </div>';
        
        }
        while($x != 4){
            echo '<div class="tp_box_in_off"></div>';
            $x++;
        }
        

    }
}