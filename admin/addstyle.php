<!--		<div id="main">-->
<!--		<div class="nav">添加种类</div>-->
<?php
include('../config.php');
session_start();
if(!isset($_SESSION['uname']))	header("Location: login.php"); 
include('adminheader.php');
?>
	<div id='content'>
		<form action='addstyle.php' method='POST' id="style_form">
			<h3 class="stylename">添加菜的种类<h3>
			<label>种类名（如川菜或主食）</label><br>
			<input type='text' class="textK1 " name='stylename' form='style_form'/><br />
			<input type='submit' class="btn" value='添加'/>
			<br>

		</form>
	</div>
<?php

if(isset($_POST['stylename'])){
	$add_style_sql="INSERT INTO `style` (`styleid`, `stylename`) VALUES (NULL, '".$_POST['stylename']."')";
	$result = mysql_query($add_style_sql);
	if($result) echo '添加成功';
	else echo '添加失败';
}
echo '<hr />';
$sql_style_list='SELECT * FROM `style`';
$style_list_result=mysql_query($sql_style_list);
echo '<div id="styleList">已有种类<ul>';
while($row = mysql_fetch_row($style_list_result)){
	echo '<li>种类ID：'.$row[0].' 种类名：'.$row[1].'</li>';

	
}
echo '</ul></div>';

include('adminfooter.php');
?>