<!--		<div id="main">-->
<!--		<div class="nav">添加菜品</div>-->
<?php
include('../config.php');
session_start();
if(!isset($_SESSION['uname']))	header("Location: login.php");
include('adminheader.php');
?>
	<div id='content'>
		<form action='adddish.php' method='POST' enctype="multipart/form-data" id="dish_form">
			添加一个菜吧！<br />
			<label>菜名</label>
			<input type='text' name='dishname' class="textK3" form='dish_form'/><br />
			<label>菜价</label>
			<input type='text' name='dishprice' class="textK3" form='dish_form'/><br />
			<label>种类</label>
			<input type='text' name='dishstyle' class="textK3" form='dish_form'/><br />
            <label>图片</label>
            <input type='file' name='dishimage' id="file" form='dish_form'/><br />
			<input type='submit' class="btn" value='添加'/>
		</form>
	</div>
<?php



if(isset($_POST['dishname'])){

	//对上传的图片的处理
	$file_saved_name = "";
	if(isset($_FILES['dishimage'])){
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $_FILES["dishimage"]["name"]);
		echo $_FILES["dishimage"]["size"];
		$extension = end($temp);     // 获取文件后缀名
		if ((($_FILES["dishimage"]["type"] == "image/gif")
				|| ($_FILES["dishimage"]["type"] == "image/jpeg")
				|| ($_FILES["dishimage"]["type"] == "image/jpg")
				|| ($_FILES["dishimage"]["type"] == "image/pjpeg")
				|| ($_FILES["dishimage"]["type"] == "image/x-png")
				|| ($_FILES["dishimage"]["type"] == "image/png"))
			&& ($_FILES["dishimage"]["size"] < 2048000)   // 小于 2000 kb
			&& in_array($extension, $allowedExts)) {
			if ($_FILES["dishimage"]["error"] > 0) {
				echo "错误：: " . $_FILES["dishimage"]["error"] . "<br>";
			}
			else {
//				echo "上传文件名: " . $_FILES["dishimage"]["name"] . "<br>";
//				echo "文件类型: " . $_FILES["dishimage"]["type"] . "<br>";
//				echo "文件大小: " . ($_FILES["dishimage"]["size"] / 1024) . " kB<br>";
//				echo "文件临时存储的位置: " . $_FILES["dishimage"]["tmp_name"] . "<br>";


				$file_md5 = md5_file($_FILES["dishimage"]["tmp_name"]); //获取文件MD5，作为特征码
				$file_saved_name = $file_md5.'.'.$extension;

				// 判断当期目录下的 upload 目录是否存在该文件
				// 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
				if (file_exists("../upload/" . $file_saved_name)) {
					echo $file_saved_name . " 文件已经存在。 ";
				}
				else {
					// 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
					move_uploaded_file($_FILES["dishimage"]["tmp_name"], "../upload/" . $file_saved_name);
//					echo "文件存储在: " . "../upload/" . $file_saved_name;
				}
			}
		} else {
			echo "非法的文件格式";
		}
	}

	$add_dish_sql="INSERT INTO `dish` (`id`, `dname`, `styleid`, `dprice`, `dimage`) VALUES (NULL, '".$_POST['dishname']."', '".$_POST['dishstyle']."', '".$_POST['dishprice']."', '".$file_saved_name."')";
	$result = mysql_query($add_dish_sql);
	if($result) {
	    echo $result;
        echo '添加成功';
    }
	else echo '添加失败';

}
echo '<hr />';
$sql_style_list='SELECT * FROM `style`';
$style_list_result=mysql_query($sql_style_list);
echo '<div id="styleList">种类详情：<ul>';
while($row = mysql_fetch_row($style_list_result)){
	echo '<li>种类ID：'.$row[0].' 种类名：'.$row[1].'</li>';

	
}
echo '</ul></div>';
include('adminfooter.php');
?>
</div>