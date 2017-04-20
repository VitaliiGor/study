<?php

$url = $_SERVER['REQUEST_URI'];

require __DIR__ . '/autoload.php';

$controller = new \App\Controllers\News();
$action = $_GET['action'] ?: 'Index';

$controller->action($action);









/*$view = new \App\View();
$view->news = \App\Models\News::findAll();
$view->title = 'Last news:';


$view->display( __DIR__ . '/App/templates/index.php');

$news=\App\Models\News::findAll();
include  __DIR__ . '/App/templates/index.php';
*/
?>