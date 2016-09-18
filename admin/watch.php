<?php
include('../config.php');
session_start();
if(!isset($_SESSION['uname']))	header("Location: login.php"); 
include('adminheader.php');
echo <<<EOT1
			<div id='content'>
				<div><h3 class="stylename">尚未处理的菜单<h3></div>
				<div id="menuListDIV">
					<ol id="menuListUl">
					</ol>
				</div>
			</div>
EOT1;
include('adminfooter.php');
?>