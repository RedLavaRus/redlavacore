<?php

namespace Core\User;

use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;
use Core\User\User as User;

/*
    Обработка авторизации по умолчанию
    */
class Def
{/*
    Создание таблицы для пользователей
    */
    public function install()
    {
        $dd = new Create();
        $dd -> create("user_def")
        ->add("login","VARCHAR","255","not null","Логин")
        ->add("password","VARCHAR","255","not null","Пароль")
        ->add("email","VARCHAR","255","not null","Емаил")
        ->add("ip_reg","VARCHAR","255","not null","ип регистрации")
        ->add("date_reg","VARCHAR","255","not null","дата регистрации");
        $dd ->execute();
    }
    /*
    Регистрация пользователя
    */
    public function register($login,$pass,$pass2,$ip,$mail)
    {
        //Проверить логин
        $login_result = new User;
        $login_result->login($login);
        //Проверить Пароль
        //Проверить Почту
        //Проверить Ип
        //Проверить Дату
        //Проверить Выполнить регистрацию
    }
    /*
   авторизация пользователя
    */
    public function auth($login,$pass,$ip)
    {
        
    }
    /*
   Завершение сессии
    */
}