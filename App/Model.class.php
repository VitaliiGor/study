<?php

namespace App;


abstract class Model
{
    const TABLE = '';

    public static function findAll(){
        $db = \App\Db::getInstance();
        return $db->query('SELECT * FROM ' . static::TABLE, static::class);
    }

    public static function findById($id){
        $db = \App\Db::getInstance();
        $res = $db->query('SELECT * FROM ' . static::TABLE . ' WHERE id = ' . $id, static::class);
        return $res[0];
    }


}