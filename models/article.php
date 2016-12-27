<?php
require_once '/config/db_config.php';

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
function ArticlesGetAll(){
    $sql = 'SELECT * FROM ' . DB_TABLE . ' ORDER BY date ASC';
    return sql_query($sql);


}