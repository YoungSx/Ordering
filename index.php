
<?php
echo <<<EOT
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
			<form  action='home.php' method='GET' id="table_form">
				<div class="choose">
					<div class="choose1">
						<div><a href="index.php" class="chooseLeft" >顾客</a></div>
					</div>
					<div class="choose2">
						<div><a href="admin/login.php" class="chooseRight" >商家</a></div>
					</div>
				<div>
				<div class="table">我在这张桌</div>
				<select name="tableId" id="selectTableId" >
EOT;
$table_num=9;
while($table_num--) echo "<option value='".($table_num + 1)."'>".($table_num + 1)."</option>";
echo <<<EOT1
						
				</select>
					<input type="submit" class="btn" value="我要点菜"/>
					<a href="src/test.html" class="btn">在线扫码</a>
			</form>
		</div>
	</body>
</html>
EOT1;
?>
<?php
include('footer.php');
?>
