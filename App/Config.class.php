<?php
/**
 * Created by PhpStorm.
 * User: V
 * Date: 18.04.2017
 * Time: 18:34
 */

namespace App;


class Config
{
    use Singleton;

    const CONFIG = 'D:/USR/www/myConfig.ini';

    protected $config;
    private $updated = false;

    protected function __construct()
    {
        if(file_exists(self::CONFIG))
            $this->config = parse_ini_file(self::CONFIG);
    }

    public function __destruct(){
        if(!$this->updated)
            return;
        $f = fopen(self::CONFIG, 'w');
        if(!$f)
            return;
        foreach($this->config as $k=>$v){
            fputs($f, "$k=$v\n");
        }
        fclose($f);
    }

    public function getConfig($key){
        if(isset($this->config[$key]))
            return $this->config[$key];
        else
            return null;
    }

    public function setConfig($key, $value){
        if(!isset($this->config[$key]) or $this->config[$key] !=$value){
            $this->config[$key] = $value;
            $this->updated = true;
        }
    }

}