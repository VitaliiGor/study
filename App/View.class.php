<?php
/**
 * Created by PhpStorm.
 * User: V
 * Date: 19.04.2017
 * Time: 19:12
 */

namespace App;


class View
        implements \Countable
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

    public function render($template){
        ob_start();
        foreach($this->data as $prop => $value){
            $$prop = $value;
        }
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function display($template){
        echo $this->render($template);
    }

    public function count()
    {
        return count($this->data);
    }

}