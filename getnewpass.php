<?php
#----------------------------------------#
#----------WebShop GunnyII v4.0----------#
#--------Create by bachugacon122---------#
#----Email : bachugacon122@hotmail.com---#
include('global.php');
if(isset($_SESSION['UserId'])) die();
co();
if(isset($_GET['Request'])) {
	$u = EscapeString($_POST['u']);
	$e = EscapeString($_POST['e']);
	$q = q("Select TOP 1 UserId From {$dbtank}.dbo.Sys_Users_Detail Where Email = '{$e}' AND UserName = '{$u}'");
	
	if(qn($q) == 1) {
		$q = q("Select COUNT(ID) as count From {$dbtank}.dbo.Log_Password Where UserName = '{$u}' AND IsChange = 'False'");
		$info = qa($q);
		if($info['count'] != 0) {
			echo 'Verifique a Caixa de entrada ou Lixeira do seu email, ja foi enviado um pedido de alteração de senha';
			exit();
		}
		else {
			$time = gmdate("Y-m-d H:i:s", time() + 3600*(date('0')-2));
			$code = md5($u.$time);
			q("INSERT INTO {$dbtank}.dbo.Log_Password ([UserName],[Code],[Time],[IsChange]) VALUES ('{$u}','{$code}','{$time}','False')");
			$q = q("SELECT TOP 1 PasswordTwo FROM {$dbtank}.dbo.Sys_Users_Detail Where UserName = '{$u}'");
			$info = qa($q);
			$bagpass = $info['PasswordTwo'];
			$subject = 'Recuperação de senha NexusTank';
			$content = '<h1 style="color: #CF0B0E"><strong>'.$u.'</strong>, recupere seu acesso!</h1>
<p style="color: #212121; font-family: Tahoma, \'Lucida Sans Unicode\', \'Lucida Sans\', \'DejaVu Sans\', Verdana, sans-serif;">Estamos entrando em contato pois foi soliciado em nosso site  a recuperação de dados de acesso.<br>
verifique logo abaixo as instruções para recuperar a sua conta</p>
<p style="color: #212121; font-family: Tahoma, \'Lucida Sans Unicode\', \'Lucida Sans\', \'DejaVu Sans\', Verdana, sans-serif;">Se deseja recuperar <a href="'.$linksite.'/getnewpass.php?check=True&u='.$u.'&code='.$code.'">clique aqui</a> 
 , se o link não funcionar Copie o link abaixo e cole no seu navegador<br />
 <a href="'.$linksite.'/getnewpass.php?check=True&u='.$u.'&code='.$code.'">'.$linksite.'/getnewpass.php?check=True&u='.$u.'&code='.$code.'</a><br><br>';
	if($bagpass != '') $content .= '<h3>A Senha da sua mochila é: <strong>'.$bagpass.'</strong></h3>';
$content .= '
<p style="font-family: \'Lucida Grande\', \'Lucida Sans Unicode\', \'Lucida Sans\', \'DejaVu Sans\', Verdana, sans-serif; color: #CF0B0E;"><strong>Recomendamos que você altere sua senha após efetuar o login!</strong></p>';
			$AltBody = 'Pedir uma nova senha';
			sendmail($e,$u,$subject,$content,$AltBody);
			echo 'Sua solicitação de recuperação foi enviada para o seu email, caso o email não esteja na caixa de entrada verifique na Caixa de SPAM ou na Lixeira';
			exit();
		}
	}
	else {
		echo "Usuario ou email incorreto";
		exit();
	}
}
elseif(isset($_GET['check'])) {
	$u = EscapeString($_GET['u']);
	$code = EscapeString($_GET['code']);
	$q = q("SELECT TOP 1 * FROM {$dbtank}.dbo.Log_Password Where UserName = '{$u}' AND Code = '{$code}' AND IsChange = 'False'");
	if(qn($q) == 1) {
		q("UPDATE {$dbtank}.dbo.Log_Password SET IsChange = 'True' Where UserName = '{$u}'");
		$newpass = rand(100000,999999);
		$q = q("SELECT TOP 1 UserId FROM Mem_Users Where UserName = '{$u}'");
		$info = qa($q);
		$uid = $info['UserId'];
		q("Update Mem_UserInfo Set Password = '".strtoupper(md5($newpass))."' Where UserId = '{$uid}'");
		echo '<center> Sua nova senha é : <strong>'.$newpass.'</strong>  <br />Entre com a nova senha e depois altere como preferir</center>';
		exit();
	} else {
		echo '<center>Código de autenticação está incorreto</center>';
		exit();
	}
}