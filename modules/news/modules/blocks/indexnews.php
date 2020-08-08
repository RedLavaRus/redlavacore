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
            var_dump("<pre>",$tarifs);

        $result = new \Core\Show\View;
        $result->view("/modules/news/view/blocks/news.php");
    }
}