<?php
include('config.php');
if(!isset($_GET['mid'])) exit();
$menu_id=$_GET['mid'];
$sql="UPDATE `menu` SET `already` = '1' WHERE `menu`.`mid` = ".$menu_id;
$result = mysql_query($sql);
if($result) echo '1';
else echo '0';
?>