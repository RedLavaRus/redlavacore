<?php
namespace Modules\News\Modules\Blocks;

use Core\Orm\Orm as Orm;

class IndexNews
{
    public function index($url)
    {
        $orm = new Orm;
        $tarifs = $orm
            ->select("text")
            ->from("news_micro")
            ->order("id")
            ->desc()
            ->limit(6)            
            ->execute()
            ->object();

        $result = new \Core\Show\View;
        $result->add("news",$tarifs->object);
        $result->view("/modules/news/view/blocks/news.php");
    }
}