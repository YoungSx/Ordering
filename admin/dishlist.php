<?php
include('../config.php');
session_start();
if(!isset($_SESSION['uname']))	header("Location: login.php");
include('adminheader.php');
echo "<div id='content'>";
//接收到dishid来删除菜
if(isset($_GET['dishid'])){
    $dishid=$_GET['dishid'];
//    $img_sql = "SELECT `dimage` FROM `dish` WHERE `id =`".$dishid;
//    $img_result = mysql_query($img_sql);
//    $dimage= mysql_fetch_row($img_result)[0];

    $delete_sql="DELETE FROM `ordering`.`dish` WHERE `dish`.`id` = ".$dishid;
    $detele_result = mysql_query($delete_sql);
    if($detele_result){
        echo " <div id = 'tip'>删除成功</div>";
//        unlink("../upload/".$dimage);
    }else{
        echo " <div id = 'tip'>删除失败</div>";
    }
}


$sql="SELECT * FROM `dish` ORDER BY `styleid`";
$result = mysql_query($sql);
if(!$result) exit();
$i=0;
$styleid="";
while($row=mysql_fetch_row($result)){
    $dish[$i]['id']=$row[0];
    $dish[$i]['dname']=$row[1];
    $dish[$i]['styleid']=$row[2];
    $dish[$i]['dprice']=$row[3];
    $dish[$i]['dimage']=$row[4];


    //输出菜系名，不重复输出
    if($styleid != $dish[$i]['styleid']){
        $styleid = $dish[$i]['styleid'];
        $stylesql = "SELECT `stylename` FROM `style` WHERE `styleid`='" . $styleid . "'";
        $styleresult = mysql_query($stylesql);
        $stylename= mysql_fetch_row($styleresult)[0];
        echo "<div class=\"stylename\">$stylename</div>";
    }
    //输出每个菜系下的菜
<<<<<<< HEAD
    echo "
    <li>
            <div class='dishname'>" . $dish[$i]['dname'] . "</div>
            <div class='dishprice'>" . $dish[$i]['dprice'] . "</div>
            <a href='dishlist.php?dishid=" . $dish[$i]['id'] . "' class='delete btn'>删除</a>
=======
    echo "<li>
            <div class='dishname'>" . $dish[$i]['dname'] . "</div>
            <div class='dishprice'>" . $dish[$i]['dprice'] . "</div>
            <a href='dishlist.php?dishid=" . $dish[$i]['id'] . "' class='delete'>删除</a>
>>>>>>> origin/master
           </li>";
    $i++;
}


echo "</div>";
include('adminfooter.php');
?>
