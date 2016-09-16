<?php

//b32_16586865_ordering b32_16586865 sql113.byethost32.com 1346852258
$con = mysql_connect('127.0.0.1','root','usbw');
$menu=array(array(),array(),array(),array());
$menu_pr=array();
if(!$con) echo '连接数据库失败';
mysql_query("SET NAMES UTF-8");
mysql_select_db("ordering");
