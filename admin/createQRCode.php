<?php
include('../config.php');
session_start();
if(!isset($_SESSION['uname']))	header("Location: login.php");
include('adminheader.php');
?>

<script type="text/javascript" src="JS/jquery.min.js"></script>
<script type="text/javascript" src="JS/qrcode.min.js"></script>

<h3 for="text" class="stylename">在下方输入桌号，如1，再点击生成</h3>
<input class="textK1 textK3" id="text" type="text" value="1" style="width:80%" /><br />
<div id="qrcode" style="width:100px; height:100px; margin-top:15px; text-align:center;margin: 10px auto;margin-top:25px;"></div>

<script type="text/javascript">
    var qrcode = new QRCode(document.getElementById("qrcode"), {
        width : 100,
        height : 100
    });

    function makeCode () {
        var elText = document.getElementById("text");

        if (!elText.value) {
            alert("Input a text");
            elText.focus();
            return;
        }

        qrcode.makeCode("http://dc.shangxin.link/home.php?tableId=" + elText.value);
    }

    makeCode();

    $("#text").
    on("blur", function () {
        makeCode();
    }).
    on("keydown", function (e) {
        if (e.keyCode == 13) {
            makeCode();
        }
    });
</script>
<script type="text/javascript">
    function startCreate() {
        //document.getElementById("text").value = "http://dc.shangxin.link/home.php?tableId=" + document.getElementById("text").value;
        makeCode();
    }
</script>
<button class="btn" onclick="startCreate()">生成</button>
<div>右键或长按二维码图片以保存</div>

<?php
include('adminfooter.php');
?>