<?php
header('Content-Type: text/html; charset=utf-8');
error_reporting(1);
require 'facebook/facebook.php'; 
include 'global.php';
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $secret,
));

// Get User ID 
 // verifica se o usuário já esta logado no aplicativo
$user = $facebook->getUser();
global $dbtank,$dbmember;
co();
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
if ($user) {  
        try { 
            $user_profile = $facebook->api('/me?fields=id,name,email,first_name,last_name,gender'); 
			$permissions = $facebook->api('/me/permissions');
			print_r($permissions);
			$permisionPost = $permissions['data'][2]['status'];
			print_r($permissionPost);
			$username = $user_profile[email];
			$senha = $user_profile[id];
			$resenha = $user_profile[id];
			if($user_profile[gender] == "male"){
				$sexo = 1;
			}else{
				$sexo = 0;
			}  
			$teste = rand(5, 999);
			$nickname = trim("".$user_profile[name]."_".$teste."");
			$nickname=str_replace(' ','',$nickname);
			$email = $user_profile[email];
			$verlogin = qn(q("select * from {$dbtank}.dbo.Sys_Users_Detail WHERE UserName ='{$username}'"));
			$vernickname = qn(q("select * from {$dbtank}.dbo.Sys_Users_Detail WHERE NickName = '{$nickname}'"));
			if (empty($username) || empty($senha)|| empty($resenha)|| empty($nickname)) 
			{
				$error = "<div align='center'>Todos os campos devem ser preenchidos corretamente.</div>";
			}
			elseif($verlogin > 0) {
				
				?>
						
		 
				<?php
				co();
	$u = $username;
	$p = strtoupper(md5($senha));
	$app  = 'DanDanTang';
	$uid  = 0;
	$data = array(
		array($app, SQLSRV_PARAM_IN),
		array($u, SQLSRV_PARAM_IN),
		array($p, SQLSRV_PARAM_IN),
		array($uid, SQLSRV_PARAM_OUT)
	);
	$check = sqlsrv_query($conn, "{CALL Mem_Users_Accede (?,?,?,?)}", $data);
	sqlsrv_next_result($check);
	if($uid <= 0)
	{
		echo '<script type="text/javascript">alert(\'Nome de Usuario ou Senha invalidos\');</script>';
	}
	else
	{
		$_SESSION['UserName'] = $u;
		$_SESSION['UserId']	  = $uid;
		if($p='386a0fcfb1c4b0c9fc0b37b559a48c42'){
			$p=qa(q("select top 1 password from [{$dbmember}].[dbo].[Mem_UserInfo] where userid='{$uid}'"))['password'];
		}
		$_SESSION['PassWord'] = $p;
		$_SESSION['Coin']	= loadCoin($uid);
		$_SESSION['IsVip'] = IsVipUser($uid);
		$q = q("SELECT TOP 1 NickName,UserId,Email,notification FROM {$dbtank}.dbo.Sys_Users_Detail Where UserName = '{$u}'");
		$info = qa($q);
		$_SESSION['UserIdTank']=$info['UserId'];
		$_SESSION['notification']=$info['notification'];
		$_SESSION['Email']=$info['Email'];
		$_SESSION['NickName']=$info['NickName'];
		$q1 = q("SELECT TOP 1 equipe FROM {$dbtank}.dbo.equipeNexus Where UserName = '{$u}'");
		$info1 = qa($q1);
		if($_SESSION['Email']!='' && $_SESSION['notification']==1){
		sendmail($_SESSION['Email'],$_SESSION['NickName'],'Notificação de login NexusTank',
		'<h1>Olá '.$_SESSION['NickName'].'</h1>
		<br>
		<br>
		Sua conta realizou um novo login em: <b>'.getdia().'</b> atravez de: <b>'.get_ip_address().'</b>
		<br>
		'.$_SERVER['HTTP_USER_AGENT'].' <br><br> <b>SE NÃO FOI VOCÊ QUE REALIZOU ESTE LOGIN, É ACONSELHAVEL MUDAR SUA SENHA</b>','Notificação de login NexusTank');
		}
		if($postFacebook && $permisionPost=='granted'){
			if($nickPostFacebook){
				$msgPostFacebook['message'].='
				
				Meu nome no jogo: '.$_SESSION['NickName'].'';
			}
			$ret = $facebook->api('/me/feed', 'POST', $msgPostFacebook);
			}
		$_SESSION['NickName'] = $info['NickName'];
			$_SESSION['IsAdm']=$info1['equipe'];
		if($_SESSION['IsVip'] == 1) include('ItemForVipUser.php');
		echo '<script type="text/javascript">window.location="index.php";</script>';
		exit();
	}
			}
			elseif($vernickname > 0) {
				$error =("<div align='center'>Este apelido já está sendo utilizado!</div");
			}
			elseif(strlen($username) < 5) {
				$error =("<div align='center'>É necessário ter no mínimo 5 digitos e no máximo 15 digitos no Nome de Usuário.</div");
			}
			elseif(strlen($nickname) < 5) {
				$error =("<div align='center'>É necessário ter no mínimo 5 digitos e no máximo 15 digitos no Apelido.</div");
			}
			elseif(strlen($senha) < 5 || strlen($resenha) < 5) {
				$error =("<div align='center'>É necessário ter no mínimo 5 digitos e no máximo 15 digitos na senha.</div");
			}
			elseif($senha != $resenha) {
				$error =('As duas senhas digitadas não se coincidem!');
			} else {
				$senha=strtoupper(md5($senha));
					q("exec {$dbmember}.dbo.Mem_Users_CreateUser @ApplicationName=N'DanDanTang',@UserName=N'{$username}',@password=N'{$senha}',@email=N'{$email}',@PasswordFormat=N'1',@PasswordSalt=N'MD5',@UserSex='{$sexo}',@UserId=''");
					q("exec {$dbmember}.dbo.Mem_Users_Accede @ApplicationName=N'DanDanTang',@UserName=N'{$username}',@password=N'{$senha}',@UserId=''");
					q("exec {$dbtank}.dbo.SP_Users_Active @UserID='',@Attack=0,@Colors=N',,,,,,',@ConsortiaID=0,@Defence=0,@Gold={$goldStart},@GP=1437053,@Grade=25,@Luck=0,@Money={$goldStart},@Style=N',,,,,,',@Agility=0,@State=0,@UserName=N'{$username}',@PassWord=N'{$senha}',@Sex='{$sexo}',@Hide=1111111111,@ActiveIP=N'',@email=N'{$email}',@Skin=N'',@Site=N''");
					if($sexo == 1) {
						q("exec {$dbtank}.dbo.SP_Users_RegisterNotValidate @UserName=N'{$username}',@PassWord=N'{$senha}',@NickName=N'{$nickname}',@BArmID=7008,@BHairID=3158,@BFaceID=6103,@BClothID=5160,@BHatID=1142,@GArmID=7008,@GHairID=3158,@GFaceID=6103,@GClothID=5160,@GHatID=1142,@ArmColor=N'',@HairColor=N'',@FaceColor=N'',@ClothColor=N'',@HatColor=N'',@Sex='{$sexo}',@StyleDate=0");
					}
					else {
						q("exec {$dbtank}.dbo.SP_Users_RegisterNotValidate @UserName=N'{$username}',@PassWord=N'{$senha}',@NickName=N'{$nickname}',@BArmID=7008,@BHairID=3244,@BFaceID=6204,@BClothID=5276,@BHatID=1214,@GArmID=7008,@GHairID=3244,@GFaceID=6202,@GClothID=5276,@GHatID=1214,@ArmColor=N'',@HairColor=N'',@FaceColor=N'',@ClothColor=N'',@HatColor=N'',@Sex='{$sexo}',@StyleDate=0");
					}
					q("exec {$dbtank}.dbo.SP_Users_LoginWeb @UserName=N'{$username}',@Password=N'',@FirstValidate=0,@Nickname=N'{$nickname}'");	
					echo '<script type="text/javascript">window.location="facebook.php";</script>';					
			}
			qc();
			?>
			
		 
				<?php 
        } catch (FacebookApiException $e) {
        // tratamento de erro
                print_r($e);
        }
		
 
}  else {
        // usuario não logado, solicitar autenticação 
		$loginUrl = $facebook->getLoginUrl(array(
   'scope' => $scopeFacebook, 
 ));
        echo "<a href='$loginUrl'>Entrar Pelo Facebook</a><br />"; 
		        echo "<strong><em>Voc&ecirc; n&atilde;o esta conectado..</em></strong>";
}

?>