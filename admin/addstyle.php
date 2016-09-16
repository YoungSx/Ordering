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
			添加菜的种类！<br />
			<label>种类名（如川菜或主食）</label><br>
			<input type='text' class="textK3" name='stylename' form='style_form'/><br />
			<input type='submit' class="btn" value='添加'/>
		</form>
	</div>
<?php

if(isset($_POST['stylename'])){
	$add_style_sql="INSERT INTO `style` (`styleid`, `stylename`) VALUES (NULL, '".$_POST['stylename']."')";
	$result = mysql_query($add_style_sql);
	if($result) echo '添加成功';
	else echo '添加失败';
}

include('adminfooter.php');
?>
</div>