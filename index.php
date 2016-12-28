<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 27.12.2016
 * Time: 20:40
 */
require __DIR__ . '/models/article.php';

$article = ArticlesGetAll();

require_once __DIR__ . '/views/articles.php';

?>

