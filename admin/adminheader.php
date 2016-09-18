<?php
echo "
<!DOCTYPE html>
<html>
	<head>
		<link rel='stylesheet' type='text/css' href='../style/layout.css'>
		<meta http-equiv='content-type' content='text/html; charset=UTF-8' />
		<title>自助点餐系统</title>
		<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=no'/>
		<script src='JS/mainscript.js'></script>
		<script src='JS/dispose.js'></script>
			<style> 
a{ text-decoration:none;color: #007DFF;} 
</style>
	</head> 
	<body onLoad='repeatGetData()'>
		<div id='main'>
		<div class=\"nav\">自助点餐系统商家管理页面</div>
		<div id='navbar'>
            <div class='num1'><a href='watch.php'>未处理</a></div>
            <div class='num1'><a href='adddish.php'>添加菜</a></div>
            <div class='num1'><a href='dishlist.php'>删除菜</a></div>
            <div class='num1'><a href='addstyle.php'>添加种类</a></div>
            <div class='num1'><a href='createQRCode.php'>二维码</a></div>
		</div>
";