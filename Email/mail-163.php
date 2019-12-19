<?php
require_once('class.phpmailer.php');

if(isset($_POST["getEmail"])){
	$optemail = $_POST["optemail"];
	$sendEmail = $_POST["sendEmail"];
	$sendName = $_POST["sendName"];
	$password = $_POST["password"];
	$getEmails = $_POST["getEmail"];
	$sendTitles = $_POST["title"];
	$sendCentent = $_POST["centent"];
	
	$cententHtml = htmlentities($sendCentent,ENT_QUOTES,"GB2312");
	echo $cententHtml;
	$getEmails = explode(",", $getEmails);

	if($optemail == 1){
		$hostsmtp = "smtp.163.com";
		$ports = 25;
	}else{
		$hostsmtp = "smtp.gmail.com";
		$ports = 587;
	}

	if(is_array($getEmails)){//判斷變量是否是數組
		foreach ($getEmails as $key => $email) {
			$getEmail = $email;
			$mail = new PHPMailer(); //實例化
			$mail->IsSMTP(); // 啟用SMTP
			$mail->Host = $hostsmtp; //SMTP服務器
			$mail->Port = $ports;  //發件端口
			$mail->SMTPAuth = true;  //啟用SMTP認證
			$mail->CharSet  = "UTF-8"; //設置字符集
			$mail->Encoding = "base64"; //編碼方式
			$mail->IsHTML(true); //設置支持HTML郵件

			$mail->Username = $sendEmail;  //發件郵箱
			$mail->Password = $password;  //發件郵箱密碼

			$mail->From = $sendEmail;  //發件郵箱
			$mail->FromName = $sendName;  //發件人暱稱
			$mail->Subject = $sendTitles; //郵件標題

			$address = $getEmail;//收件人郵箱
			$mail->AddAddress($getEmail);//收件人郵箱和暱稱（郵箱，暱稱），這只用郵箱
			$mail->Body = $sendCentent; //郵件正文內容
			#$mail->AddAttachment('xxx.txt','xxx.txt'); // 添加附件,指定名稱
			#$mail->AddEmbeddedImage("xxx.jpg", "my-attach", "xxx.jpg"); //設置郵件中的圖片

			//發送
			if(!$mail->Send()) {
			  	echo "發送失敗：" . $mail->ErrorInfo;
			  	echo "<br>";
			  	echo $getEmail."<b><font color='red'>發送失敗 ╮(╯﹏╰）╭</font></b>";
			  	echo "<hr>";
			} else {
			  	echo "<br>";
			  	echo $getEmail."<b><font color='greenyellow'>發送成功 (๑*◡*๑)</font></b>";
			  	echo "<hr>";
			}

			
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>發件提示</title>
	<style type="text/css">
		#timeSpan{color: red;}
	</style>
</head>
<body onload="pastTime()">
	<h2><span id="timeSpan">5</span>秒後返回...</h2>
	<p><a href="index.php">立即返回</a></p>
</body>
</html>
<script type="text/javascript">
	function pastTime(){
		window.setInterval(function(){//间隔执行
			var times=document.getElementById("timeSpan");
			times.innerHTML=times.innerHTML-1;
			//时间到0是跳转
			if(times.innerHTML==0){
				location.href="index.php";
			}
		},1000);
	}
</script>