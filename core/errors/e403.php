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
        echo "Ошибка 403, нет прав доступа!";
        die();
    }
}