<?php
namespace Modules\News\Modules\Blocks;

use Core\Orm\Orm as Orm;

class IndexNews
{
    public function index($url)
    {
        
        $result = new \Core\Show\View;
        $result->view("/modules/news/view/blocks/news.php");
    }
}