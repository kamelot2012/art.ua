<?php
//require_once '/config/db_config.php';
define('DB_HOST', 'localhost');
define('DB_LOGIN', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'art.ua');
define('DB_TABLE', 'articles');

function DB_connect(){
//language setting
    setlocale(LC_CTYPE, "ukr");
    date_default_timezone_set('Europe/Kiev');
//connect to DB
    $link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
    if (mysqli_connect_errno()){
        echo "Извините, возникла проблема на сайте";
        echo "Номер_ошибки: " . mysqli_connect_errno() . "\n";
        echo "Ошибка: " . mysqli_connect_error() . "\n";
        return false;
    }
    $sql = "SET NAMES utf8";
    if ($result = mysqli_query($link, $sql)) {
        return $link;
    }
    return;
}
function sql_query($sql){
   $link = DB_connect();
    $ret = [];
        if ($result = mysqli_query($link,$sql)) {
            while ($row = mysqli_fetch_assoc($result)){
                $ret[] = $row;
            }
        }
    return $ret;
}
function sql_query_one($sql){
    $link = DB_connect();
    if(!$link){
        return false; //!!!??
    }
    $res = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($res);
    return $row;
}
function sql_query_exec($sql){
    $link = DB_connect();
    if(!$link){
        return false; //!!!??
    }
    return mysqli_query($link, $sql);

}
function ArticleGetOne($id){
    $sql = 'SELECT * FROM ' . DB_TABLE . ' WHERE id = '. $id;
   // echo $sql;
    return sql_query_one($sql);
}

function ArticlesGetAll(){
    $sql = 'SELECT * FROM ' . DB_TABLE . ' ORDER BY date ASC';
    return sql_query($sql);
}
function ArticleInsert($title, $content){
    if(!empty($title) && !empty($content)) {
        $sql = "INSERT INTO " . DB_TABLE . " (title, content) VALUES ('" . $title . "', '" . $content . "')";
        return sql_query_exec($sql);
    } else {
        return false;
    }

}