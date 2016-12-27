<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
require '../models/article.php';
if (isset($_GET['id']) && !empty($_GET['id'])){
    $id = 1 * $_GET['id'];
};
$article = ArticleGetOne($id);
//print_r($article);
?>

<?php echo $article['title'];?>
<br>
<?php echo $article['content']; ?>
<br>
<?php echo $article['date']; ?>
<br>
<hr style="max-width: inherit">
</body>
</html>
