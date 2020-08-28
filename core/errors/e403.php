<?php

namespace Core\Errors;


use \CFG;
  /*
  Менеджер, отвечает за порядок запуска функций
  */
class E403
{
    public static function show()
    {
      $url=null;
      $auth = new \Core\User\Auth;
      $auth->index($url);
        echo "Ошибка 403, нет прав доступа!";
        die();
    }
}