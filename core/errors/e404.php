<?php

namespace Core\Errors;


use \CFG;
  /*
  Менеджер, отвечает за порядок запуска функций
  */
class E404
{
    public static function show()
    {
        echo "Ошибка 404, страница не найдена!";
        die();
    }
}