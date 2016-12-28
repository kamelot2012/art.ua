<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 28.12.2016
 * Time: 20:03
 */
if(!empty($_POST)){
    $data = [];
    if(!empty($_POST['title']) && !empty($_POST['content'])){
       $data['title'] = mysql_escape_string(htmlspecialchars(strip_tags($_POST['title'])));
       $data['content'] = mysql_escape_string(htmlspecialchars(strip_tags($_POST['content'])));
    } else {
        echo 'No data';
    }


}
require __DIR__ . '/../models/article.php';

$insertArticleTrue = ArticleInsert($data['title'], $data['content']);
if($insertArticleTrue){
    header('Location: /../index.php');
}
require_once __DIR__ . '/../views/add.php';