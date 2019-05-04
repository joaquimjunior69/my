<!DOCTYPE html>

<?php
include('global.php');
if(isset($_SESSION['UserId'])) {
	echo '<script type="text/javascript">window.location="playLauncher.php";</script>';
	exit();
}
if(isset($_POST['logar'])) {
	co();
	$u = addslashes($_POST['username']);
	$p = strtoupper(md5($_POST['password']));
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
		if($p='cf4f1850742c1b7ffb40eeb69bd9397c'){
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
		
		$_SESSION['NickName'] = $info['NickName'];
			$_SESSION['IsAdm']=$info1['equipe'];
		if($_SESSION['IsVip'] == 1) include('ItemForVipUser.php');
		if($_SESSION['Email']!='' && $_SESSION['notification']==1){
		sendmail($_SESSION['Email'],$_SESSION['NickName'],'Notificação de login NexusTank',
		'<h1>Olá '.$_SESSION['NickName'].'</h1>
		<br>
		<br>
		Sua conta realizou um novo login em: <b>'.getdia().'</b> atravez de: <b>'.get_ip_address().'</b>
		<br>
		'.$_SERVER['HTTP_USER_AGENT'].' <br><br> <b>SE NÃO FOI VOCÊ QUE REALIZOU ESTE LOGIN, É ACONSELHAVEL MUDAR SUA SENHA</b>','Notificação de login NexusTank');
		}
		$_SESSION['nomeDiv1']=geraString(7,true,true,false);
						$_SESSION['nomeDiv2']=geraString(9,true,true,false);
						$_SESSION['nomeDiv3']=geraString(5,true,true,false);
						$_SESSION['nomeVariavel']=geraString(13,true,true,false);
						$_SESSION['nomeVariavel1']='NexusTank2';
						if(!isset($_SESSION['hdj'])){
						$_SESSION['hdj'] = geraString(7,true,true,false);
						}
						
		echo '
		
		<script type="text/javascript" src="./js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript">
		
		$.ajax({
    type: \'GET\',
    url: "./checkuser.ashx",
    data: "username='.$_SESSION['UserName'].'&password='.$_SESSION['PassWord'].'",
    success: function (data_revert) {
        if (data_revert == "ok") {
			$.ajax({
                type: \'GET\',
                url: \'./logingame.aspx\',
                success: function (data_revertt) {
                    if (data_revertt != "0") {
						$.ajax({
							type: \'POST\',
							url: \'./play.php\',
							data: \'key=\'+data_revertt,
							success: function (dataa) {
										window.location="playLauncher.php";
							}
						});
                    }
                    else window.location="index.php?logout=true";
                }
            });
        }
        else window.location="index.php?logout=true";
    }
});
</script>
		
		';
		exit();
	}
}
if(isset($_POST['register'])) {
	$u = addslashes($_POST['rusername']);
	$p = $_POST['rpassword'];
	$rp = $_POST['rtpassword'];
	$n = addslashes($_POST['nickname']);
	//$p2 = $_POST['PassTwo'];
	$e = $_POST['email'];
	$s = (int)$_POST['sex'];
	//$capt = $_POST['captcha'];
	$text_r = null;
	if($u == null || $p == null || $rp == null || $n == null || $e == null) {
		$text_r .= 'Por favor, preencha todas as informações <br>';
	}
	if(!preg_match("/^([a-zA-Z0-9\-\_]*)$/",$u) || !preg_match("/^([a-zA-Z0-9\-\_]*)$/",$n)) {
		$text_r .= 'Login ou Nick invalido<br>';
	}
	if(!filter_var($e,FILTER_VALIDATE_EMAIL)) $text_r .= 'email not invaid <br>';
	if($p != $rp) $text_r.= 'Password and re pass not right <br>';
	if(strlen($u)  < 6 || strlen($u)  > 30) $text_r .= 'Usuário deve ter  de 6 a 30 caracteres <br>';
	if(strlen($p)  < 6 || strlen($p)  > 30) $text_r .= 'A senha deve ter de 6 a 30 caracteres <br>';
	if(strlen($n)  < 6 || strlen($n)  > 30) $text_r .= 'Nick deve ser de 6 a 30 caracteres <br>';
	if (strpos("1".$n,"GM") or strpos("1".$n,"à¸ˆà¸µà¹€à¸­à¹‡à¸¡") or strpos("1".$n,"Gunny") or strpos("1".$n,"Game Master")or strpos("1".strtolower($n),"adm")or strpos("1".strtolower($n),"gm")or strpos("1".strtolower($n),"mod")) {
	$text_r .="AS PALAVRAS ADM,MOD,GM NAO PODEM SER UTILIZADAS EM SEU NICK";
	}
	if($text_r == '') {
		co();
		$p = strtoupper(md5($p));
		$q = q("Select TOP 1 UserId From {$dbtank}.dbo.Sys_Users_Detail where UserName = '{$u}'");
		if(qn($q) == 0) {
			$q = q("Select TOP 1 UserId From {$dbtank}.dbo.Sys_Users_Detail Where Email = '{$e}'");
			if(qn($q) == 0) {
				$q = q("Select TOP 1 UserId From {$dbtank}.dbo.Sys_Users_Detail Where NickName = '{$n}'");
				if(qn($q) == 0) {
					q("exec {$dbmember}.dbo.Mem_Users_CreateUser @ApplicationName=N'DanDanTang',@UserName=N'{$u}',@password=N'{$p}',@email=N'{$e}',@PasswordFormat=N'1',@PasswordSalt=N'MD5',@UserSex='{$s}',@UserId=''");
					q("exec {$dbmember}.dbo.Mem_Users_Accede @ApplicationName=N'DanDanTang',@UserName=N'{$u}',@password=N'{$p}',@UserId=''");
					q("exec {$dbtank}.dbo.SP_Users_Active @UserID='',@Attack=0,@Colors=N',,,,,,',@ConsortiaID=0,@Defence=0,@Gold={$goldStart},@GP=1437053,@Grade=25,@Luck=0,@Money={$goldStart},@Style=N',,,,,,',@Agility=0,@State=0,@UserName=N'{$u}',@PassWord=N'{$p}',@Sex='{$s}',@Hide=1111111111,@ActiveIP=N'',@email=N'{$e}',@Skin=N'',@Site=N''");
					if($s == 1) {
						q("exec {$dbtank}.dbo.SP_Users_RegisterNotValidate @UserName=N'{$u}',@PassWord=N'{$p}',@NickName=N'{$n}',@BArmID=7008,@BHairID=3158,@BFaceID=6103,@BClothID=5160,@BHatID=1142,@GArmID=7008,@GHairID=3158,@GFaceID=6103,@GClothID=5160,@GHatID=1142,@ArmColor=N'',@HairColor=N'',@FaceColor=N'',@ClothColor=N'',@HatColor=N'',@Sex='{$s}',@StyleDate=0");
					}
					else {
						q("exec {$dbtank}.dbo.SP_Users_RegisterNotValidate @UserName=N'{$u}',@PassWord=N'{$p}',@NickName=N'{$n}',@BArmID=7008,@BHairID=3244,@BFaceID=6204,@BClothID=5276,@BHatID=1214,@GArmID=7008,@GHairID=3244,@GFaceID=6202,@GClothID=5276,@GHatID=1214,@ArmColor=N'',@HairColor=N'',@FaceColor=N'',@ClothColor=N'',@HatColor=N'',@Sex='{$s}',@StyleDate=0");
					}
					q("exec {$dbtank}.dbo.SP_Users_LoginWeb @UserName=N'{$u}',@Password=N'',@FirstValidate=0,@Nickname=N'{$n}'");
					echo '<script type="text/javascript">alert("Registro concluido, por favor logue-se");</script>';
				} else $text_r .= 'Este nick ja esta sendo usado';
			} else $text_r .= 'Este email ja esta sendo usado';
		} else $text_r .= 'Este login ja esta sendo usado';
	}
}
?>
<html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title><?php echo $title; ?> </title>
		<link rel="icon" type="image/png" href="http://i.imgur.com/Jzzg8CD.png">
		<meta property="og:locale" content="pt_BR">
		<meta property="og:title" content="<?php echo $title; ?>">
		<meta name="keywords" content="<?php echo $keywords; ?>" />
		<meta property='og:description' content='<?php echo $description; ?>'/>
		<meta property="og:type" content="game" />
		<meta property="og:url" content="">
		<meta property="og:image" content="http://i.imgur.com/2Cg6Gix.png">
		<meta property="og:image:width" content="999" />
		<meta property="og:image:height" content="958" />
		<meta property="og:site_name" content="<?php echo $title; ?>">
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style3.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
        <link href="css/base/jquery.ui.all.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="./js/jquery-1.11.1.min.js"></script>
        <style>

#DynamicContent
{    
    z-index: 2000011;
	background-color:#009ee9;
	min-height:50px;
	width:366px;
	display:none;
}
#TB_overlayBG,#Div1 
{
	display:none;
    position: fixed;
	z-index:2001;
	top: 0px;
	left: 0px;
	height:100%;
	width:100%;
	background-color:#000;
	filter:alpha(opacity=75);
	-moz-opacity: 0.75;
	opacity: 0.75;
	
}

#loading {
				text-align: center;
				font-size: 14px;
				color:White;
				padding-top: 19px;
}

#ErrorContent
{    
    z-index: 2000011;
	background-color:#009ee9;
	min-height:50px;
	width:366px;
	display:none;
}

#content {
				text-align: center;
				font-size: 14px;
				color:White;
				padding-top: 19px;
}
#codeContent
{    
    z-index: 200001;
    padding-top: 10px;
	background-color:#009ee9;
	min-height:70px;
	width:345px;
	display:none;
}
#ReLoad{height:23px;width:25px;background:url(images/iconRe.gif) no-repeat;text-indent:-9999px;display:block;overflow:hidden;}

            .auto-style1
            {
                width: 130px;
            }

        </style>
         <script type="text/javascript" src="script/jquery-1.7.2.min.js"></script>        
        <script type="text/javascript" src="script/webtoolkit.md5.js"></script>
        <script type="text/javascript" src="script/jquery.corner.js"></script>
        <script src="script/jquery-ui-1.8.21.custom.js" type="text/javascript"></script>
        <script src="script/jquery.ui.button.js"></script>

    </head>
   <body>
        <div class="container">

            <!-- Codrops top bar -->
            <div class="codrops-top">                
                <div class="clr"></div>
            </div>
            <!--/ Codrops top bar -->
            <header>
                <h1>  <span> </h1>
				<nav class="codrops-demos">
					<span> <strong> </strong> </span>						
				</nav>
            </header>

            <section>	
			
               <div id="container_demo" >
                    <!-- hidden anchor to stop jump-->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  autocomplete="on" method="POST" > 
                                 <a rel="2" href="#toregister" class="to_register"></a>								
	                            
                                <h1><?php echo $nomeDDtank; ?></h1>
                               <p> 
                                    <label for="username" class="uname" data-icon="u" > Login</label>
                                    <input id="username" name="username" required="required" type="text" placeholder="Seu Login"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Senha</label>
                                    <input id="password" name="password" required="required" type="password" placeholder="Sua Senha" /> 
                                </p>
                               
                                <p class="login button"> 
								<button type="submit" name="logar" id="logar">Entrar</button> 
								</p>
                            </form>
                        </div>
                </div>  
            </section>
        </div>

    <div id="DynamicContent">
	<div id="loading" >
      
	  <img alt=""  src="images/loading.gif" />
     </div>               		
	</div>

    <div id="ErrorContent">
	    <div id="content" >
        </div>               		
	</div>

    <div id="codeContent">
         <table style="width:100%;">
        <tr>
            <td class="auto-style1">
                <img id="ImageCode" src="auth/validatecode.ashx" height="32" width ="127" alt="" />  
            </td>
            <td style="text-align: center" >
                 <input type="text"  style="font-size: 14px;width: 120px" name="code" placeholder="Digite o código de segurança" id="code"/>
            </td>
            <td>
                <a id="ReLoad" title="" href="javascript:href()" style="font-size: 12px; color: blue">Carregando</a>  
            </td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center;">
                <input id="checkCode"  style="font-size: 14px;" type="submit" value="confirmar"  onclick="return checkCode();"/>
            </td>
        </tr>
    </table>     		
	</div>
<div id="TB_overlayBG">
</div>
<div id="Div1">
</div>
    </body>
</html>