<?php
$username='923154212410';///Your Username
$password='furqan';///Your SECRET Password
$sender='zong';///Your Masking
$mobile='+923154212410';///add comma to send multiple sms like 92301,92310,92321
$message='Testing!';///Your Message
$post =
"sender=".urlencode($sender)."&mobile=".urlencode($mobile)."&message=".urlencode($message)."&format=json";
$url = "https://sendpk.com/api/sms.php?username=".$username."&password=".$password."";
$ch = curl_init();
$timeout = 0; // set to zero for no timeout
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows
NT 5.1; SV1)');
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
echo $content = curl_exec($ch);
?>