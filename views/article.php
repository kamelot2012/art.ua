<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
if (isset($_GET['id']) && !empty($_GET['id'])){
    $id = 1 * $_GET['id'];
};
echo $id;
?>
</body>
</html>
