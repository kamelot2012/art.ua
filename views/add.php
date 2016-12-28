<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <label> Write the Title <input type="text" name="title"></label>
    <br>
    <label>Write the Content <textarea name="content"></textarea></label>
    <br>
    <input type="submit">
</form>
</body>
</html>