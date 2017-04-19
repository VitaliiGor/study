<?php
/**
 * Created by PhpStorm.
 * User: V
 * Date: 19.04.2017
 * Time: 19:12
 */

namespace App;


class View
{
    protected $data = [];

    public function __set($k, $v){
       $this->data[$k] = $v;
    }

    public function __get($k){
        return $this->data[$k];
    }

    public function __isset($name)
    {
        // TODO: Implement __isset() method.
    }

    public function display($template){
        include $template;
    }

}