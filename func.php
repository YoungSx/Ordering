<?php
function request($url,$method='GET'){//GET HTTPS
   $ch = curl_init(); 
   curl_setopt($ch, CURLOPT_URL,$url);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
   curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
   if($method=='POST'){
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $url);
   }else{
      curl_setopt($ch, CURLOPT_TIMEOUT, 30);
      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
   }
   return curl_exec($ch);
}
function text2audio($text=""){//文字转语音 返回语音url
	$api_key="pwDt3ispNw8WdDVWK5skipK8";
	$secret_key="OntNrAegOfGv3Gk9UZZiaMbgMrGxukMi";
	$api_token="https://openapi.baidu.com/oauth/2.0/token";
	$api_audio="http://tsn.baidu.com/text2audio";
	if(!isset($_SESSION['access_token'])){//判断session中有没有accesstoken 没有则获取（没有考虑到失效情况
		$token_url=
			$api_token."?grant_type=client_credentials"
			."&client_id=".$api_key
			."&client_secret=".$secret_key;
		$result=request($token_url,"POST");
		$result=json_decode($result);
		$access_token=$result->access_token;
		$_SESSION['access_token']=$access_token;
	}else{
		$access_token=$_SESSION['access_token'];
	}
	$audio_param=
		"?tex=".$text
		."&lan=zh"
		."&ctp=1"
		."&cuid=fad4f54sd6f54as6df4"
		."&tok=".$access_token;
	$audio_url=
		$api_audio.$audio_param;
	return $audio_url;
}