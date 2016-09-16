<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style/layout.css">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<title>自助点餐系统</title>
  		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=no"/>
  		<script src="JS/mainscript.js"></script>
	</head>
	<body>
		<div id="main">
		<div class="nav">点菜</div>
			<div id="header">
<?php
if(isset($_GET['tableId'])){
	session_start();
	$_SESSION['table_id']=$_GET['tableId'];
	echo '亲爱的'.$_GET['tableId']."号桌客人，请在下面选择喜欢的菜，祝您用餐愉快！";
}
?>
				<div id='cnav'>
					<ul>
						<li class='cnavli'>
							<div id='totalCountDiv'><div class="num"><span id='totalCountSpan' >0</span></div> <input form='menu_form' disabled='disabled' id='submit1' class='submit btn1' type='submit' value='买单'/></div>
						</li>

					</ul>
				</div>
				
				
			</div>
			<div id="center">
<?php
include('config.php');
$sql="SELECT * FROM dish";
$result = mysql_query($sql);
$sql="SELECT * FROM style";
$style_result = mysql_query($sql);
while($row = mysql_fetch_row($style_result))	$dstyle[$row[0]]=$row[1];
while($row = mysql_fetch_row($result))	$menu_pr[]=$row; //把菜单结果集存在一个数组备用
foreach($menu_pr as $value)	$menu[$value[2]][]=array($value[0],$value[1],$value[3],$value[4]); //$menu[菜系id][0..n][菜id,菜名,菜价]
for($i=0;$i<sizeof($menu);$i++){
	if($menu[$i]){
		$style_name=$dstyle[$i];
		echo <<<EOT2
				<div id='row1' class='row'>
					<div id='title1' class='title'>$style_name</div>
					<div id='cont1' class='cont'>
EOT2;
	}//<input type='checkbox' form='menu_form' class='menu_checkbox' value='".$menu[$i][$j][0]."' name='dish[]'/>
	for($j=0;$j<sizeof($menu[$i]);$j++){
		echo "<div class='dish'>
							<div class='dtitle'>".$menu[$i][$j][1]."</div>
							<div class='dcont'>
								<img src='upload/".$menu[$i][$j][3]."' alt=''>
								<div class='count-modify'>
									<span class='minus' onclick='minusDC(".$menu[$i][$j][0].")'>-</span><input type='text' class='count' id='count".$menu[$i][$j][0]."' name='count'/><span class='add' onclick='addDC(".$menu[$i][$j][0].")'>+</span>
								</div>
							</div>	
						</div>";
	}
	if($menu[$i]) echo "</div></div>";
}
echo <<<EOT
				<!--
				<div id="udtitle">还有什么想对厨师说的？</div>
				<textarea name="user_describe" id="" cols="30" rows="10"></textarea>
				-->
				<form action='confirm.php' method='POST' id="menu_form">
					<input type="hidden" name="myMenuIPT" id="hiddenInput" form='menu_form' value="">
				</form>
			</div>
EOT;
include('footer.php');
?>