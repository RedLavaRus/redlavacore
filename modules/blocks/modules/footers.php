<?php
namespace Modules\Blocks\Modules;

class Footers
{
    public function index($url)
    {
echo '<div class="footer">
<div class="footer_in">
    <div class="footer_in_1">
        <h4>ЧАСТНЫМ КЛИЕНТАМ</h4>
        <a href="/internet-i-tv/">Интернет + ТВ</a><br>
        <a href="/internet/">Интернет</a><br>
        <a href="/mobilnaya-svyaz/">Мобильная связь</a><br>
    </div>
    <div class="footer_in_1">
        <h4>ИНФОРМАЦИЯ</h4>
        <a href="/shema-podklucheniya/">Схема подключения</a><br>
        <a href="/oborudovanie/">Оборудование</a><br>
        <a href="https://krasnodar.ttk.ru/about/legal-information/" target="_blank">Правовая информация</a><br>
    </div>
    <div class="footer_in_1"> </div>

    <div class="footer_in_2"><br>
        <img src="/res/img/ttk1.png"><br>
        Сайт партнера АО "Компания ТрансТелеКом". Подключение Интернета, Телевидения ТТК в Краснодаре.  2020 г.
        <br><br>Сайт не является средством массовой информации.
    </div>
</div>';
    }
}