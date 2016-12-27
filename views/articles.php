<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php foreach($article as $art):?>
    <a href="<?php echo  'views/'?>article.php?<?php echo 'id=' . $art['id'];?>">
    <?php echo $art['title'];?>
    </a>
    <br>
    <?php echo $art['content']; ?>
    <br>
    <?php echo $art['date']; ?>
    <br>
    <hr style="max-width: inherit">
<?php endforeach; ?>
</body>
</html>
