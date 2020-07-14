<?php
/**
 * Конфиругационный файл
 */
class CFG
{
    public static $db_name = 'redlava';//Название базы данных
    public static $db_user = "ph";//Пользователь базы данных
    public static $db_pass = "ph1234PH";//Пароль от базы данных
    public static $db_host = "127.0.0.1";//Адрес базы данных
    public static $db_port = "3306";//Порт базы данных
    public static $db_code = "utf8";//Порт базы данных
    public static $debag   =true;//Порт базы данных

    public static function debag($status = true){
        if($status)
        {
            ini_set('error_reporting', E_ALL);
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
        }
    }
}

?>