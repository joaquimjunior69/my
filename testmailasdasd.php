<?php
function sendmail($recipient,$name,$subject,$content,$AltBody)
{
	include "PhpMailer/class.phpmailer.php";
	$email = new PHPMailer();
	$email->IsSMTP();
	$email->SMTPDebug  = 1;
	$email->Debugoutput = "html";
	$email->Host       = "smtp.live.com";
	$email->Port       = 587;
	$email->SMTPSecure = "tls";
	$email->SMTPAuth   = true;
	$email->Username   = "paty-xanda@hotmail.com";# email ??? wait email hotmail or loutlook
	$email->Password   = "123456p";
	$email->SetFrom("paty-xanda@hotmail.com", "DDTank System");
	$email->AddReplyTo("paty-xanda@hotmail.com","DDTank System");
	$email->AddAddress($recipient, $name);
	$email->CharSet="utf-8";
	$email->Subject = $subject;
	$email->MsgHTML($content);
	$email->AltBody = $AltBody;
	if($email->Send()) {
		return true;
	} else {
		return false;
	}
}
sendmail('bachugacon122@gmail.com','khanh','tét','kiểm tra','tét');