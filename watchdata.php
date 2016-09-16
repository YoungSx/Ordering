<?php
include('config.php');
$sql="SELECT * FROM `menu` where `already`=0 ORDER BY `time`";
$result = mysql_query($sql);
if(!$result) exit();
$i=0;
while($row=mysql_fetch_row($result)){
	$menu[$i]['mid']=$row[0];
	$menu[$i]['tid']=$row[1];
	$menu[$i]['menujson']=$row[2];
	$menu[$i]['totalprice']=$row[3];
	$menu[$i]['time']=$row[4];
	$my_menu=json_decode($menu[$i]['menujson']);
	echo '<li>';
	foreach($my_menu as  $value){//一次是一道菜
		$dish_name_sql="SELECT `dname` FROM `dish` where id=".$value[0];
		$result1 = mysql_query($dish_name_sql);
		$row1 = mysql_fetch_row($result1);
		echo $row1[0].':'.$value[1].'<br />';
	}

	
	echo $menu[$i]['tid'].'号桌，共'.$menu[$i]['totalprice'].'元<button onclick="disposeMenu('.$menu[$i]['mid'].',this);watchData();">处理</button><br /><hr />';
	$i++;
}
?>