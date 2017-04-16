<?php


namespace App\Models;


class User
{
    public $name;
    public $email;

    public static function findAll(){
        $db = \App\Db::getInstance();
        return $db->query("SELECT * FROM users", '\App\Models\User');
    }

}