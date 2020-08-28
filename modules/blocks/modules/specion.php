<?php
namespace Modules\Blocks\Modules;

use Core\Orm\Orm as Orm;

class Specion
{
    public function index($url)
    {
       echo '<br><br>
       <div class="index_bloc_spec flex">
        <div class="index_bloc_spec_in">
        <div class="tp_box_lect">
            <br>
        </div>
        <div class="tp_box_name">Тариф "Простой"</div>
        
        <div class="tp_box_opis1">Интернет 100 Мбит/сек</div>

        <div class="tp_box_prise">
        <b>150</b> <small><small> руб/мес </small></small>
        </div>
        <a href="/connect/?tp=10">
        <div class="tp_box_connect">
            ПОДКЛЮЧИТЬ
        </div>
        </a>
        
        </div>
        <div class="index_bloc_spec_in">
        <div class="tp_box_lect">
            <br>
        </div>
        <div class="tp_box_name">Тариф "Простой + ТВ"</div>
        
        <div class="tp_box_opis1">Интернет 100 Мбит/сек<br> Телевидение 60 каналов <br>Тв приставка</div>

        
        <div class="tp_box_prise">
            
        <b>319</b> <small><small> руб/мес </small></small>
        </div>
        <a href="/connect/?tp=11">
        <div class="tp_box_connect">
            ПОДКЛЮЧИТЬ
        </div>
        </a>
        
        </div>
       </div>
       ';
    }
}