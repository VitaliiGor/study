<?php
require __DIR__ . '/autoload.php';


$view = new \App\View();
$view->news = \App\Models\News::findAll();
$view->title = 'Last news:';


$view->display( __DIR__ . '/App/templates/index.php');
/*
$news=\App\Models\News::findAll();
include  __DIR__ . '/App/templates/index.php';
*/
?>