<?php
session_start();
require __DIR__ . '/autoload.php';
/**
 * Created by PhpStorm.
 * User: V
 * Date: 18.04.2017
 * Time: 11:56
 */
if(isset($_GET['id'])) {
    $newsId = abs((int)$_GET['id']);
    $n = \App\Models\News::findById($newsId);
    $_SESSION['n_id'] = $n->id;
}
/*ob_start();
echo $n->id;
$n_id = ob_get_contents();
ob_end_clean();*/

/*if($_POST['text']){
    $n->msg = $_POST['text'];
    $n->update();
    header('location: index.php');
}
*/


if(isset($_POST['text'])) {
    $id = abs((int)$_SESSION['n_id']);
    echo 'id: ' . $id . ' text: ' . $_POST['text'];
    $n = \App\Models\News::findById($id);
    $n->msg = $_POST['text'];
    $n->update();
   // header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Article</title>
    <style>
        body, textarea,input{
            font-size: 1.4em;
        }


    </style>
</head>
<body>
<h1>The article:</h1>
<p>Author: <b><?php echo $n->author; ?></b>; written: <?php echo date('d-m-Y H:i', ($n->datetime)); ?> </p>
<span>
    <a href="index.php">Back to all news</a>
</span>

    <form method="post" action="article.php">
        <textarea name="text" cols="40" rows="10"><?php echo $n->msg; ?></textarea>
        <input type="submit" name="msg" value="Edit" />


    </form>

</body>
</html>