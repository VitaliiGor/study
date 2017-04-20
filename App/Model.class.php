<?php

namespace App;


abstract class Model
{
    const TABLE = '';
    public $id;

    public static function findAll(){
        $db = \App\Db::instance();
        return $db->query('SELECT * FROM ' . static::TABLE,
                            [],
                            static::class);
    }

    public static function findById($id){
        $db = \App\Db::instance();
        $res = $db->query('SELECT * FROM ' . static::TABLE . ' WHERE id = :id ',
                            [ ':id' => $id ],
                            static::class);
        return $res[0];
    }

    public function isNew(){
        return empty($this->id);
    }

    public function insert(){
        if(!$this->isNew())
            return;
        $column = [];
        $values = [];
        foreach($this as $k => $v){
            if('id' == $k)
                continue;
            $column[] = $k;
            $values[':'.$k] = $v;
        }
        $sql = 'INSERT INTO ' .static::TABLE. ' (' . implode(',', $column) . ') 
                VALUES (' . implode(',', array_keys($values)) . ')';
        $db = \App\Db::instance();
        $db->execute($sql, $values);
        $this->id = $db->getDb()->lastInsertId();
    }

    public function update(){
        $column = [];
        $values = [];
        foreach($this as $k=>$v){
            if('id' == $k)
                continue;
            $column[] = $k.' = :'.$k;
            $values[':'.$k] = $v;
        }
        $sql = 'UPDATE ' .static::TABLE. ' SET ' .implode(', ', $column). ' 
                WHERE id = ' .$this->id;
        //var_dump($sql);
        //die();
        $db = \App\Db::instance();
        $db->execute($sql, $values);
    }

    public function save(){
        if($this->isNew())
            return $this->insert();
        return $this->update();
    }

    public function delete(){
        $sql = 'DELETE FROM ' .static::TABLE. ' WHERE id = :id ';
        $values[':id'] = $this->id;
        $db = \App\Db::instance();
        $db->execute($sql, $values);
    }


}