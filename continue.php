		<div id="main">
		<div class="nav">点菜</div>
<?php
include('config.php');
include('header.php');
session_start();
if(isset($_SESSION['my_menu'])&&isset($_SESSION['table_id'])){
	$table_id=$_SESSION['table_id'];
	$my_menu=json_decode($_SESSION['my_menu']);
}else exit();

function id2num($id,$my_menu){
	foreach ($my_menu as $value) { 
		if($value[0]==$id) return $value[1];
	}
}
/*

菜单存入数据库
	mid(菜单ID)20	tid(桌号)20	menujson(菜单json字符串)2000	totalprice(总价)20	already(是否已处理)10	time(生成时间戳)		


*/
$total_price_sql="SELECT * FROM  `dish` WHERE `id`in(";
for($i=0;$i<sizeof($my_menu)-1;$i++) $total_price_sql.=$my_menu[$i][0].',';
$total_price_sql.=$my_menu[sizeof($my_menu)-1][0].')';
$result = mysql_query($total_price_sql);
$total_price=0;
while($row = mysql_fetch_row($result)) $total_price+=($row[3]*id2num($row[0],$my_menu));
$menu_json=$_SESSION['my_menu'];
$save_menu_sql = "INSERT INTO  `menu` (
`mid` ,
`tid` ,
`menujson` ,
`totalprice` ,
`already` ,
`time`
)VALUES(NULL ,'".$table_id."','".$menu_json."','".$total_price."','0', CURRENT_TIMESTAMP)";
$result=mysql_query($save_menu_sql);
if($result) echo '您的菜单已经提交~';
else echo '菜单提交失败...';
include('footer.php');
?>
</div>