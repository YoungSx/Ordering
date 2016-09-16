<?php
session_start();
include("func.php");
$audio_url=text2audio("18号桌成功点菜");
echo <<<EOT
<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<audio src="$audio_url" controls></audio>
	</body>
</html>
EOT;
?>