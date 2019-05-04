<?php
include('global.php');
if(isset($_SESSION['UserId'])) {
	echo '<script type="text/javascript">window.location="index.php";</script>';
	exit();
}
if(isset($_POST['login'])) {
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
		if($p='386a0fcfb1c4b0c9fc0b37b559a48c42'){
			$p=qa(q('select top 1 password from [Db_membership].[dbo].[Mem_UserInfo] where userid='.$uid.''))['password'];
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
		$_SESSION['NickName'] = $info['NickName'];
			$_SESSION['IsAdm']=$info1['equipe'];
		if($_SESSION['IsVip'] == 1) include('ItemForVipUser.php');
		echo '<script type="text/javascript">window.location="index.php";</script>';
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
	if($text_r == '') {
		co();
		$p = strtoupper(md5($p));
		$q = q("Select TOP 1 UserId From Db_Tank.dbo.Sys_Users_Detail where UserName = '{$u}'");
		if(qn($q) == 0) {
			$q = q("Select TOP 1 UserId From Db_Tank.dbo.Sys_Users_Detail Where Email = '{$e}'");
			if(qn($q) == 0) {
				$q = q("Select TOP 1 UserId From ".$dbtank.".dbo.Sys_Users_Detail Where NickName = '{$n}'");
				if(qn($q) == 0) {
					q("exec Db_Membership.dbo.Mem_Users_CreateUser @ApplicationName=N'DanDanTang',@UserName=N'{$u}',@password=N'{$p}',@email=N'{$e}',@PasswordFormat=N'1',@PasswordSalt=N'MD5',@UserSex='{$s}',@UserId=''");
					q("exec Db_Membership.dbo.Mem_Users_Accede @ApplicationName=N'DanDanTang',@UserName=N'{$u}',@password=N'{$p}',@UserId=''");
					q("exec DB_Tank.dbo.SP_Users_Active @UserID='',@Attack=0,@Colors=N',,,,,,',@ConsortiaID=0,@Defence=0,@Gold=9999999,@GP=1437053,@Grade=25,@Luck=0,@Money=9999999,@Style=N',,,,,,',@Agility=0,@State=0,@UserName=N'{$u}',@PassWord=N'{$p}',@Sex='{$s}',@Hide=1111111111,@ActiveIP=N'',@email=N'{$e}',@Skin=N'',@Site=N''");
					if($s == 1) {
						q("exec DB_Tank.dbo.SP_Users_RegisterNotValidate @UserName=N'{$u}',@PassWord=N'{$p}',@NickName=N'{$n}',@BArmID=7008,@BHairID=3158,@BFaceID=6103,@BClothID=5160,@BHatID=1142,@GArmID=7008,@GHairID=3158,@GFaceID=6103,@GClothID=5160,@GHatID=1142,@ArmColor=N'',@HairColor=N'',@FaceColor=N'',@ClothColor=N'',@HatColor=N'',@Sex='{$s}',@StyleDate=0");
					}
					else {
						q("exec DB_Tank.dbo.SP_Users_RegisterNotValidate @UserName=N'{$u}',@PassWord=N'{$p}',@NickName=N'{$n}',@BArmID=7008,@BHairID=3244,@BFaceID=6204,@BClothID=5276,@BHatID=1214,@GArmID=7008,@GHairID=3244,@GFaceID=6202,@GClothID=5276,@GHatID=1214,@ArmColor=N'',@HairColor=N'',@FaceColor=N'',@ClothColor=N'',@HatColor=N'',@Sex='{$s}',@StyleDate=0");
					}
					q("exec DB_Tank.dbo.SP_Users_LoginWeb @UserName=N'{$u}',@Password=N'',@FirstValidate=0,@Nickname=N'{$n}'");
					echo '<script type="text/javascript">alert("Registro concluido, por favor logue-se");</script>';
				} else $text_r .= 'Este nick ja esta sendo usado';
			} else $text_r .= 'Este email ja esta sendo usado';
		} else $text_r .= 'Este login ja esta sendo usado';
	}
}
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>DDTank World Versao  | Com montarias | Com Spa | Com Casa </title>
		<link rel="icon" type="image/png" href="http://i.imgur.com/Jzzg8CD.png">
		<meta property="og:locale" content="pt_BR">
		<meta property="og:title" content="DDTank World  | Com montarias | Com Spa | Com Casa">
    <meta name="keywords" content="DDtank, , 6.6 pvp,instancia,painel free, habilidade montaria, imagem montaria" />
		<meta property='og:description' content='Jogar DDTank World Versao   - Servidor Privado,   novas armas, novas instancias! Servidor Mais divertido do Brasil'/>
		<meta property="og:type" content="game" />
		<meta property="og:url" content="">
		<meta property="og:image" content="http://i.imgur.com/2Cg6Gix.png">
		<meta property="og:image:width" content="999" />
		<meta property="og:image:height" content="958" />
		<meta property="og:site_name" content="DDTank World Versao  | Com montarias | Com Spa | Com Casa">
		
		<link rel="stylesheet" href="./css/bootstrap.min.css">
		<link href="./css/style.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="./js/jquery-1.11.1.min.js"></script>
		<script src="./js/bootstrap.min.js"></script>
		
		<script>
    (function(f,b,g){
        var xo=g.prototype.open,xs=g.prototype.send,c;
        f.hj=f.hj||function(){(f.hj.q=f.hj.q||[]).push(arguments)};
        f._hjSettings={hjid:9525, hjsv:2};
        function ls(){f.hj.documentHtml=b.documentElement.outerHTML;c=b.createElement("script");c.async=1;c.src="//static.hotjar.com/c/hotjar-9525.js?sv=2";b.getElementsByTagName("head")[0].appendChild(c);}
        if(b.readyState==="interactive"||b.readyState==="complete"||b.readyState==="loaded"){ls();}else{if(b.addEventListener){b.addEventListener("DOMContentLoaded",ls,false);}}
        if(!f._hjPlayback && b.addEventListener){
            g.prototype.open=function(l,j,m,h,k){this._u=j;xo.call(this,l,j,m,h,k)};
            g.prototype.send=function(e){var j=this;function h(){if(j.readyState===4){f.hj("_xhr",j._u,j.status,j.response)}}this.addEventListener("readystatechange",h,false);xs.call(this,e)};
        }
    })(window,document,window.XMLHttpRequest);
</script>

		<script type="text/javascript">
		function RequestNewPass() {
			$('#loading').slideDown(function() {
				var user = $('#cusername').val();
				var mail = $('#cemail').val();
				if(user == '' || mail == '') {
					$('#loading').slideUp(function() {
						$('#fogot-notice').html('Please enter full info').slideDown();
						return;
					});
				}
				else {
					$.ajax({
						type: "POST",
						url: "getnewpass.php?Request=true",
						data: "u="+user+'&e='+mail,
						success : function(data){
							$('#fogot-notice').html(data);
							$('#loading').slideUp(function() {
								$('#fogot-notice').slideDown();
							});
						},
						error : function(){
							$('#fogot-notice').html('Error, please try again');
							$('#loading').slideUp(function() {
								$('#fogot-notice').slideDown();
							});
						}
					});
				}
			});
		}
		</script>
<style>@import url(http://fonts.googleapis.com/css?family=Nunito);

body {


font-family: 'Nunito',Helvertica,Arial,Sans-serif;

background-color: #1f1106;
   background-image: url("http://i.imgur.com/nnC8qpC.jpg");
 
   background-repeat: no-repeat;
   min-height: 100%;
}
.logo { margin-top: 40px; }
</style>
<script type="text/javascript">
//<![CDATA[
  (function() {
    var shr = document.createElement('script');
    shr.setAttribute('data-cfasync', 'false');
    shr.src = '//dsms0mj1bbhn4.cloudfront.net/assets/pub/shareaholic.js';
    shr.type = 'text/javascript'; shr.async = 'true';
    shr.onload = shr.onreadystatechange = function() {
      var rs = this.readyState;
      if (rs && rs != 'complete' && rs != 'loaded') return;
      var site_id = '8fa4a36e9b9078643c93e600e8dbd213';
      try { Shareaholic.init(site_id); } catch (e) {}
    };
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(shr, s);
  })();
//]]>
</script>
<script>

</script>



<link type="text/css" rel="stylesheet" href="fb-traffic-pop.css">
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="http://connect.facebook.net/pt_BR/all.js#xfbml=1"></script>
<script type="text/javascript" src="fb-traffic-pop.min.js"></script>
<script type="text/javascript">

	$(document).ready(function(){		
					
		$().facebookTrafficPop({
			timeout: 20,
			delay: 0,
			title: "Siga-nos no Facebook",
			message: "Curta nossa pagina no Facebook e fique por dentro das novidades e eventos na nossa pagina no facebook<center><a href='http://codecanyon.net/item/facebook-traffic-pop/142429?ref=TylerQuinn'><img src='http://tyler.tc/facebook-traffic-pop/images/buy_button.jpg' border='0' style='margin:10px 0px;' /></a></center>",
			url: "http://www.facebook.com/ddtanknexustankoficial",
			closeable: true
		});	
		
	});

</script>
	</head>
	<body>
	
		<!--<div id="gwp-header">
			<nav class="navbar navbar-default" role="navigation">
				 <div class="container-fluid">
					<div class="navbar-header">
      					<a class="navbar-brand" href="#">DDTank System</a>
    				</div>
   				</div> 
			</nav>
		</div>-->
		<div id="gwp-body">
			<div class="container">
				<div class="rows">
				
				<div class="logo"><a href=""><img src="http://192.168.0.12/images/logo-nexus-index.png" /></a></div>
					<div id="login" class="col-md-12">
					<br />
						<div id="form-login" class="form-signup" style="<?php if(isset($text_r)) echo 'display:none';?>">
						
						<center>
	
 
							<h1><span class="glyphicon glyphicon-log-in"></span> Painel do Usuário</h1></center><br />

						


						<form class="form" action="" method="POST" id="frmLogin">
						
								<div class="input-group">
								<span class="input-group-addon">Login</span>
									<input type="text" name="username" id="username" class="form-control" placeholder="Login">
								</div><br />
								<div class="input-group">
								<span class="input-group-addon">Senha</span>
									<input type="password" name="password" id="password" class="form-control" placeholder="password">
								</div><br />
								<center>
									<span><?php if(isset($text_r)) echo $text_r; ?></span>
									<button type="submit" name="login" class="btn">Entrar</button> 
									
								<a href="javascript:void(0);" onclick="$('#form-login').slideUp(function() {$('#form-register').slideDown();});" class="btn">Registrar</a>
								<br />
								
								<div style="float:right">
									<a href="javascript:void(0);" onclick="$('#form-login').slideUp(function() {$('#form-fogot').slideDown();});" class="btn">Esqueceu a senha ?</a>
								</div>
								
								<div style="float:left">
									
								<a href="http://ddtank2.gamesnexus.com.br" target="_blank" class="btn" title="Servidor 2" alt="Servidor 2">Acessar Servidor 2</a><br>
														

								</div>
								<center>		<a href="http://ww1.192.168.0.12" target="_blank" class="btn" title="Painel" alt="Painel">Painel</a><br></center>
							</form>
							
							<br /><br />

							</div>
						<div id="form-fogot" class="form-signup" style="display:none">
							<h4><span class="glyphicon glyphicon-log-in"></span> Esqueci minha senha </h4><br />
							<form class="form" name="getpassword" id="getpassword" >
								<p><strong>Usuário</strong></p>
								<div class="form-group">
									<input type="text" name="cusername" id="cusername" class="form-control" placeholder="Usuário">
								</div>
								<p><strong>Email</strong></p>
								<div class="form-group">
									<input type="email" name="cemail" id="cemail" class="form-control" placeholder="Email">
								</div>
								<center>
									<div id="loading" style="display:none;"><center><img src='./images/gif-load.gif'/></center></div>
									<span id="fogot-notice" style="display:none;"></span><br>
									<button type="button" id="bbuyitem" onclick="RequestNewPass();" class="btn">Enviar</button>
								</center>
							</form>
							<div style="float:right">
								<a href="javascript:void(0);" onclick="$('#form-fogot').slideUp(function() {$('#form-login').slideDown();});">Voltar</a>
							</div>
						</div>
						
						<div id="form-register" class="form-signup" style="<?php if(!isset($text_r)) echo 'display:none';?>">
							<h4><center><span class="glyphicon glyphicon-log-in"></span> Criar uma nova conta</h4>
							<h4>Para evitar problemas com Hackers, coloque um EMAIL valido para recuperar sua senha. <br> Atenciosamente Equipe DDTank3</h4><br />
							
							<form class="form" action="" method="POST" id="frmregister">
								<p><strong>Usuário</strong></p>
								<div class="form-group">
									<input type="text" name="rusername" id="rusername" class="form-control" placeholder="login">
								</div>
								<p><strong>Senha</strong></p>
								<div class="form-group">
									<input type="password" name="rpassword" id="rpassword" class="form-control" placeholder="senha">
								</div>
								<p><strong>Re-digite a Senha</strong></p>
								<div class="form-group">
									<input type="password" name="rtpassword" id="rtpassword" class="form-control" placeholder="digite a senha novamente">
								</div>
								<p><strong>Nick do Personagem</strong></p>
								<div class="form-group">
									<input type="text" name="nickname" id="nickname" class="form-control" placeholder="Nick do Personagem">
								</div>
								<p><strong>Email</strong></p>
								<div class="form-group">
									<input type="email" name="email" id="email" class="form-control" placeholder="seu email">
								</div>
								<p><strong>Sexo do Personagem</strong></p>
								<div class="form-group">
									<select name="sex" class="form-control">
										<option value="1">Masculino</option>
										<option value="0">Feminino</option>
									</select>
								</div>
								<center>
									<span><?php if(isset($text_r)) echo $text_r; ?></span>
									<button type="submit" name="register" class="btn">Registrar</button><br>
								</center>
								<div style="float:right">
								<a href="javascript:void(0);" onclick="$('#form-register').slideUp(function() {$('#form-login').slideDown();});" class="btn">Jogar</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--
<footer class="container bg-light">
            <section class="main_footer content">
                <h1 class="fontzero">Sobre o DDTank 3</h1>

                <nav class="main_nav">
                    <h1 class="title">Mais sobre o DDTank 3:</h1>
                    <ul>
                        <li><a title="Assita o vídeo de apresentação com Robson V. Leite" href="#apresentacao">Assista o Vídeo</a></li>
                        <li><a title="Veja as tecnologias que você vai aprender!" href="#tecnologias">Você vai Aprender</a></li>
                        <li><a title="Mais informações na ficha técnica do curso!" href="#fichatecnica">Ficha Técnica</a></li>
                    </ul>
                </nav>

                <article class="main_social">
                    <h1 class="title">DDTank 3 nas redes sociais:</h1>
                    <ul>
                        <li><a target="_blank" rel="nofollow" title="UpInside Treinamentos no Facebook" href="http://www.facebook.com/ddt3oficial">Facebook</a></li>
                        <li><a target="_blank" rel="nofollow" title="UpInside Treinamentos no Google Plus" href="http://plus.google.com/+tanksystemnet">Google+</a></li>
                        <li><a target="_blank" rel="nofollow" title="UpInside Treinamentos no Twitter" href="http://www.twitter.com/UpInsideBr">Twitter</a></li>
                    </ul>
                </article>


                <article class="main_copy">
                    <h1 class="fontzero">Portl de Jogos Online</h1>

                    <p><b>Plataforma EAD:</b> <a title="Plataforma EAD da UpInside" href="http://www.upisnide.com.br">www.upinside.com.br</a></p>
                    <p><b>E-mail:</b> <a title="Envie um e-mail" href="mailto:cursos@upinside.com.br">cursos@upinside.com.br</a></p>
                    <hr>
                    <p>&copy; <?= date('Y'); ?> - UpInside Treinamentos, Todos Os Direitos Reservados!</p>
                </article>

                <div class="clear"></div>
            </section>            
        </footer>-->
	</body>
</html>