<?php
echo 'install';
include('config.php');
include('header.php');

$sql_table_dish="CREATE TABLE `dish` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `dname` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `styleid` INT(11) NOT NULL , `dprice` DECIMAL(5,2) NOT NULL , `dimage` VARCHAR( 50 ) NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;";
$sql_table_menu="CREATE TABLE `menu` ( `mid` INT(20) NOT NULL AUTO_INCREMENT , `tid` INT(20) NOT NULL , `menujson` VARCHAR(2000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `totalprice` DECIMAL(5,2) NOT NULL , `already` INT(10) NOT NULL , `time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`mid`)) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;";
$sql_table_style="CREATE TABLE `style` ( `styleid` INT(11) NOT NULL AUTO_INCREMENT , `stylename` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , PRIMARY KEY (`styleid`)) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;";
if(mysql_query($sql_table_dish)) echo "dish表创建成功";
else echo "dish表创建失败";
echo "<br />";
if(mysql_query($sql_table_menu)) echo "menu表创建成功";
else echo "menu表创建失败";
echo "<br />";
if(mysql_query($sql_table_style)) echo "style表创建成功";
else echo "style表创建失败";
echo "<br />";
include('footer.php');

?>