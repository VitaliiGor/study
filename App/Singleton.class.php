<?php
/**
 * Created by PhpStorm.
 * User: V
 * Date: 17.04.2017
 * Time: 22:56
 */

namespace App;


trait Singleton
{
    protected static $instance;

    protected function __construct(){}

    private function __clone(){}

    public static function instance(){
        if(null === static::$instance){
            static::$instance = new self;
        }
        return static::$instance;
    }

}