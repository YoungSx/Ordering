<?php
include('../config.php');
if(isset($_POST['uname']) && isset($_POST['pword'])){
	if($_POST['uname']=='admin' && $_POST['pword']=='password'){
		session_start();
		$_SESSION['uname']=$_POST['uname'];
		header("Location: watch.php"); 
	}
}

echo "
<!DOCTYPE html>
<html>
	<head>
		<link rel='stylesheet' type='text/css' href='../style/layout.css'>
		<meta http-equiv='content-type' content='text/html; charset=UTF-8' />
		<title>自助点餐系统</title>
  		<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=no'/>
	</head>
	<body>
";

?>

		<div class="choose">
			<div class="choose1"><div><a href="../index.php" class="chooseLeft1" >顾客</a></div></div>
			<div class="choose2"><div><a href="login.php" class="chooseRight1" >商家</a></div></div>
		</div>
		<div class="cten">
			<form action='login.php' method='POST' id="login_form">
				<label>用户名</label>
				<input type='text' class="textK1" name='uname' form='login_form'/><br />
				<label>密&nbsp;&nbsp;&nbsp;&nbsp;码</label>
				<input type='password' class="textK1" name='pword' form='login_form'/><br />
				<div class="indexButton">
					<input type='submit' class="btn" value='登录'/><br />
				</div>
				
				用户名：admin 密码：password
			</form>
		</div>
<?php
include('adminfooter.php');
?>