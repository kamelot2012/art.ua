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
    mysql_connect(DB_HOST, DB_LOGIN, DB_PASSWORD) or die('No connect to Data Base');
    mysql_query("SET NAMES utf8");
    mysql_select_db(DB_NAME) or die('No connect to table');
    return true;
}
function sql_query($sql){
    if(!DB_connect()){
        return false; //!!!??
    }
    $res = mysql_query($sql);
    $ret = [];
    while(false !== $row = mysql_fetch_assoc($res)){
        $ret[] = $row;
    }
    return $ret;
}
function sql_query_one($sql){
    if(!DB_connect()){
        return false; //!!!??
    }
    $res = mysql_query($sql);
    $row = mysql_fetch_assoc($res);
    return $row;
}
function sql_query_exec($sql){
    if(!DB_connect()){
        return false; //!!!??
    }
    return mysql_query($sql);

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