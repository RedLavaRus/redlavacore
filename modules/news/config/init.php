<?php
namespace Modules\News\Config;

use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;

class Init
{
    public function install()
    {
        $banners = new Create();
        $banners -> create("news_micro")
        ->add("text","text","","null","Текст новости");
        $banners ->execute();

    }
    public function delete()
    {
        
    }
}