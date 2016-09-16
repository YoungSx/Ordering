<div id="main">
<div class="nav">点菜</div>
<?php
if(!isset($_POST['myMenuIPT'])) exit();
include('config.php');
include('header.php');
if($_POST['myMenuIPT']==''){
	echo '你还没点菜！';
}
$my_menu=array();//0菜id 1菜num
$menu_json=json_decode($_POST['myMenuIPT']);
$menu_json=$menu_json->myMenu;
foreach ($menu_json as $key => $value) { 
	$my_menu[]=array($key,$value);//把数据整理为易处理的格式
}
/////////////////////////////////////////////

session_start();


function id2num($id,$my_menu){
	foreach ($my_menu as $value) { 
		if($value[0]==$id) return $value[1];
	}
}

$sql="SELECT * FROM  `dish` WHERE `id`in(";
for($i=0;$i<sizeof($my_menu)-1;$i++){
	$sql.=$my_menu[$i][0].',';
}
$sql.=$my_menu[sizeof($my_menu)-1][0].')';

$result = mysql_query($sql);
$full_price=0;

echo '你点了：';
while($row = mysql_fetch_row($result)){
	echo '<br />'.$row[1].'（￥';
	echo $row[3].'）*'.id2num($row[0],$my_menu);
	echo '=￥'.id2num($row[0],$my_menu)*$row[3];
	$full_price+=($row[3]*id2num($row[0],$my_menu));
}
echo '</br>总价：￥'.$full_price;
echo "</br><a href='continue.php' class='btn'>去支付</a>";
mysql_close($con);
$_SESSION['my_menu'] = json_encode($my_menu);
include('footer.php');
?>
</div>