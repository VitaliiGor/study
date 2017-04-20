<?php


namespace App\Controllers;


use App\View;

class News
{
    public static $count ;
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function action($action){
        $methodName = 'action' . $action;
        $this->beforeAction();
        return $this->$methodName();
    }

    protected function beforeAction(){

        echo 'Counter: ' . ++self::$count;
    }

    protected function actionIndex(){

        $this->view->news = \App\Models\News::findAll();
        $this->view->title = 'Last news:';
        $this->view->display( __DIR__ . '/../templates/index.php');
    }

    protected function actionOne(){
        $id = (int)$_GET['id'];
        $this->view->article = \App\Models\News::findById($id);
        $this->view->title = 'This news:';
        $this->view->display( __DIR__ . '/../templates/one.php');
    }

}