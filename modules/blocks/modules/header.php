<?php
namespace Modules\Blocks\Modules;

class Header
{
    public function index($url)
    {
        echo
        '
        <div class="line1">
        <div class="line1_logo">
            <div class="logo">
                <a href="/"><img src="/res/img/ttk.png"></a>
            </div>
            <a href="/"><div class="inhome">Для дома</div></a>
            <a href="https://b2b.ttk.ru/" target="_blank"><div class="inbisnes">Для бизнеса</div></a>
        </div>
        <div class="line1_logo1">
            <div class="city_img"><img src="/res/img/ik1.png"></div>
            <div class="city">Краснодар</div>
            <div class="lc_img"><img src="/res/img/ik2.png"></div>
            <a href="https://lk.ttk.ru/" target="_blank"><div class="lc">Личный кабинет</div></a>
        </div>
   </div> 


   <div class="line2">
       <a href="/internet-i-tv/"><div class="l2_item">Интернет + ТВ</div></a>
       <a href="/internet/"><div class="l2_item">Интернет</div></a>
       <a href="/mobilnaya-svyaz/"><div class="l2_item">Мобильная связь</div></a>
       <a href="/tv/"><div class="l2_item">Телевидение</div></a>
       <div class="l2_item_r">Подключение в Краснодаре тел.: <b>+7 (918) 94-32-613</b></div>       
       </div> 
    
        ';
    }
}