<?php
include('../config.php');
session_start();
if(!isset($_SESSION['uname']))	header("Location: login.php"); 
include('adminheader.php');
echo <<<EOT1
			<div id='content'>
				<div>尚未处理的菜单:</div>
				<div id="menuListDIV">
					<ol id="menuListUl">
					</ol>
				</div>
			</div>
EOT1;
include('adminfooter.php');
?>