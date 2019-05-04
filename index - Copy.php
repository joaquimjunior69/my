<?php

/*
 * Criado por VinnyBrown;
 */

$ativo = true; 
$pagina = "pub";
$pagina2 = "kc"; 

################### Não alterar o código ###################
$ads = <<<EOF
			
EOF;
$ads2 = <<<EOF
			


EOF;
$rd = rand(0,9999999).rand(0,9999999).uniqid();
$aif = <<<EOF




EOF;
switch ($_SERVER['QUERY_STRING']) {
    case $pagina:
        if ($ativo) {
            echo $aif;
            echo <<<EOF
    <head>
    <style>body{margin:0;padding:0;overflow:hidden}</style><script type="text/javascript">if(window.self===window.top){window.location="/index.php"}else{};</script>
	<script type='text/javascript'>
var googletag = googletag || {};
googletag.cmd = googletag.cmd || [];
(function() {
var gads = document.createElement('script');
gads.async = true;
gads.type = 'text/javascript';
var useSSL = 'https:' == document.location.protocol;
gads.src = (useSSL ? 'https:' : 'http:') + 
'//www.googletagservices.com/tag/js/gpt.js';
var node = document.getElementsByTagName('script')[0];
node.parentNode.insertBefore(gads, node);
})();
</script>

<script type='text/javascript'>
googletag.cmd.push(function() {
googletag.defineSlot('/71680749/Campanha1', [300, 250], 'div-gpt-ad-1413909421316-0').addService(googletag.pubads());
googletag.defineSlot('/71680749/ds2', [[300, 250], [336, 280]], 'div-gpt-ad-1413909421316-1').addService(googletag.pubads());
googletag.pubads().enableSingleRequest();
googletag.enableServices();
});
</script>
			<body>
				{$ads}
			</body>
EOF;
        }
    case $pagina2:
        if ($ativo) {
            echo $aif;
            echo <<<EOF
            <style>body{margin:0;padding:0;overflow:hidden}</style><script type="text/javascript">if(window.self===window.top){window.location="/index.php"}else{};</script>
			<script type='text/javascript'>
var googletag = googletag || {};
googletag.cmd = googletag.cmd || [];
(function() {
var gads = document.createElement('script');
gads.async = true;
gads.type = 'text/javascript';
var useSSL = 'https:' == document.location.protocol;
gads.src = (useSSL ? 'https:' : 'http:') + 
'//www.googletagservices.com/tag/js/gpt.js';
var node = document.getElementsByTagName('script')[0];
node.parentNode.insertBefore(gads, node);
})();
</script>

<script type='text/javascript'>
googletag.cmd.push(function() {
googletag.defineSlot('/71680749/Campanha1', [300, 250], 'div-gpt-ad-1413909421316-0').addService(googletag.pubads());
googletag.defineSlot('/71680749/ds2', [[300, 250], [336, 280]], 'div-gpt-ad-1413909421316-1').addService(googletag.pubads());
googletag.pubads().enableSingleRequest();
googletag.enableServices();
});
</script>
			<body>
				{$ads2}
			</body>
EOF;
        }
        exit();

    default:

        if($ativo) {
            echo <<<EOF
            <script type="text/javascript" src=""></script>
EOF;
        }
        break;
}

  ?>

  <?php
include('global.php');
if(!isset($_SESSION['UserId']) || isset($_GET['logout'])) {
	session_destroy();
	die('<script type="text/javascript">window.location="login.php";</script>');
}
if(isset($_GET['lang'])) {
	if($_GET['lang'] == 'br' || $_GET['lang'] = 'vt') {
		$_SESSION['lang'] = $_GET['lang'];
	} else $_SESSION['lang'] = 'br';
}
if(!isset($_SESSION['lang'])) $_SESSION['lang'] = 'br';
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="UTF-8">
		<title>DDTankSystem - Versão 5.5 </title>
<link rel="icon" type="image/png" href="http://i.imgur.com/pSwiz7O.png">
<link rel="shortcut icon" href="favicon.ico" />
		
		
		<link rel="stylesheet" href="./css/bootstrap.min.css">
		<link rel="stylesheet" href="./css/bootstrap-table.css">
		<link href="./css/style.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="./js/jquery-1.11.1.min.js"></script>
		<script src="./js/bootstrap.min.js"></script>
		<script type="text/javascript" src="./js/webshop.js"></script>
		<script src="./js/bootstrap-table.js"></script>
		<script src="./js/jquery.twbsPagination.min.js"></script>
		<link rel="stylesheet" href="css/animate.css">
		<script src="js/wow.js"></script>
			<meta property="og:locale" content="pt_BR">
<meta property="og:title" content="DDTankSystem - Versão 5.5 ">
<meta name="keywords" content="DDTank System,ddtankbr,DDT,ddtank II, jogo de browser, ddtank2, jogos grátis, jogos online, jogo flash,jogo de RPG, jogos de RPG, jogo SLG, jogos online grátis, jogos casuais, jogos livres, DDTanSystem,ddtank,ddt,337, cupons grátis" /> 
<meta property='og:description' content='Jogar DDTankSystem - Versão 5.5,  novas armas, novas instancias! Servidor Mais divertido do Brasil'/>
<meta property="og:type" content="game" />
<meta property="og:url" content="http://tanksystem.net">
<meta property="og:image" content="http://i.imgur.com/fXit31Y.png">
<meta property="og:image:width" content="999" />
<meta property="og:image:height" content="958" />
<meta property="og:site_name" content="DDTankSystem - Versão 5.5 ">
		
		
		<script>
			new WOW().init();
			$(window).load(function() {
				<?php if(isset($_GET['page']) && $_GET['page'] != '') echo "getContentPage('".$_GET['page']."');";else echo 'loadCat(0,1);getpage(0);';?>
			});
		</script>
		<link href="//fonts.googleapis.com/css?family=Ubuntu:300italic,300,400italic,400,500italic,500,700italic,700" rel="stylesheet" type="text/css">

		

<style>@import url(http://fonts.googleapis.com/css?family=Ubuntu);
html{
  height: 100%;
}
body {
   min-height: 2000px;padding-top: 70px;
   font-family: 'Ubuntu', sans-serif;
   font-style:condensed;
   font-size: 14px;
  
   background-color: #2a2a2a;
   background-image: url("http://clashofclanshelper.com/index_files/bg_1.jpg");
   background-position: center center; 
   background-repeat: no-repeat, no-repeat, no-repeat;
   min-height: 100%;
}
</style>
		


	</head>
	<body>
	<?php include_once("analyticstracking.php") ?>
		<div id="gwp-header">
			<nav class="wow zoomin navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<a href="./"><img src="http://i.imgur.com/I3qB3Zh.png" alt="DDTank System" alt="DDTank System" /></a>
					</div>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Painel<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								
								<!--<li><a href="javascript:void(0);" onclick="getContentPage('history');"><span class="glyphicon glyphicon-edit"></span> Payment history</a></li>-->
								<li><a href="javascript:void(0);" onclick="getContentPage('changepass');"><span class=" glyphicon glyphicon-refresh"></span> Mudar senha</a></li>
								<!--<li><a href="javascript:void(0);" onclick="getContentPage('changemail');"><span class=" glyphicon glyphicon-envelope"></span> Mudar email</a></li>-->
								
								<li><a href=""><span class=" glyphicon glyphicon-off"></span> Deslogar</a></li>
							</ul>
						</li>
						
						<li><a href="javascript:void(0);" onclick="getContentPage('bagweb');"><span class="glyphicon glyphicon-file"></span> Mochila Virtual</a></li>
						
						<li>
							<a href="javascript:void(0);" onclick="loadCat(0,1);getpage(0);"><span class=" glyphicon glyphicon-shopping-cart"></span> Itens</a>
						</li>
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"></span> Linguagem <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="index.php?lang=br"> <img src="image/br.png" width="28" height="28" /> Português</a></li>
								<li><a href="index.php?lang=vt"><img src="image/viet.png" width="28" height="28" />  Vietnamita<br /><span>Faça seu CF aqui!</span></a></li>
							</ul>
						</li>
						<li>
						
							<a href="javascript:void(0);" onclick="getContentPage('pet');"><img src="http://i.imgur.com/MXwheYt.png" width="15" height="20" /> Deletar Pet</a>
						</li>
						<!--<li>
						<a href="http://www.systemgames.net/contato/" target="_blank"> Contato</a>
						<a href="javascript:void(0);" onclick="getContentPage('evento');"><span class=" glyphicon glyphicon-share"></span> <strong><font color="blue">Participar do Evento</font></strong></a>
						</li>-->
						<li>
						<a href="index.php?logout=true" ><span class="glyphicon glyphicon-off"></span> <strong><font color="red">Deslogar</font></strong></a>
						</li>
						
						<li>
							<a href="http://www.systemgames.net/doacoes-vip/" target="_blank"> <span class="label label-success">Comprar vip</span></font></a>
						</li>
					</ul>
					</div>
				</div>
			</nav>
		</div>
		
		<div id="gwp-body">
		
			<div class="container">
			<!-- <br /><br /> BAIXO -->
				<div data-wow-delay="0.5s" class="wow rollIn col-md-4">
					<div id="form-login" class="form-info">
						<h4><span class="glyphicon glyphicon-user"></span> Minhas informações</h4>
						<p class="info-field"><b>Identificação</b>: #<?php echo $_SESSION['UserId']; ?></p>
						<p class="info-field"><b>Usuario</b>: <span id="user-name"><?php echo $_SESSION['UserName']; ?></span>
						<p class="info-field"><b>Tipo:</b> <?php co(); if($_SESSION['IsVip'] == 1) echo ' <span class="label label-success"> Usuario VIP ( '.GetDayVip($_SESSION['UserId']).' dias )</span> '; else echo ' <span class="label label-danger"> Usuario NORMAL</span>'; qc(); ?></p>
						<p class="info-field"><b>Eu tenho <span class="label label-default" id="user-coin"><?php co(); echo loadCoin($_SESSION['UserId']); ?></span> COINS</b></p>
						<p class="info-field"><b>Tempo Online <span class="label label-default" id="user-tonl"><?php echo GetTimeOnline(); qc(); ?> Horas</span><a href="javascript:void(0)" onclick="ChangeTimeOnlineToCash()"><br >Trocar tempo online por cash</a></b></p>
						<p class="info-field"><b>MEU  IP</b></a>: <script type="text/javascript" src="http://www.whatsmyip.us/showipsimple.php"> </script>
<!--End of IP Script-->
<br /><br />
<!-- <span class="badge">Vip</span> -->
		<!--<a href="javascript:void(0);" onclick="getContentPage('evento');"> <strong><span class="btn"><span class=" glyphicon glyphicon-share"></span> Participar do Evento</span></strong></a><br />--><center><a href="<?php echo $Play[$_SESSION['IsVip']]; ?>" target="_blank"><img src="http://i.imgur.com/GhJdg4y.png" title="Jogar agora" alt="Jogar Agora" /></a><br />
		
						<br />
					
<!--<a href="https://www.facebook.com/sharer/sharer.php?u=https://www.facebook.com/ddtankturbo/photos/a.503990519619257.120731.503452913006351/860568883961417/?type=1&theater" class="btn" target="_blank">Divulgue nosso servidor</a>-->
				
		
					</center>
					
					
					<center><!-- Place this tag in your head or just before your close body tag. -->
<script src="https://apis.google.com/js/platform.js" async defer>
  {lang: 'pt-BR'}
</script>

<!-- Place this tag where you want the widget to render. -->
<div class="g-page" data-width="221" data-href="//plus.google.com/u/0/110722529940009808132" data-rel="publisher"></div>
					
					<!--<Strong>Legend Online</strong><br />
					<a href="http://goo.gl/28XFzZ" target="_blank" ><img src="http://i.imgur.com/PXqoKof.png" alt="Cadastre se Agora" title="Cadastre se Agora"></a>-->
					</center><br />
					<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fddtankturbo&amp;width=245&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=742767719088210" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:245px; height:258px;" allowTransparency="true"></iframe>
					
					</div>
					<div class="line"></div>
				</div>
				<div data-wow-delay="1s" id="boxmd8" class="wow bounceInDown col-md-8 form-shop">
					<div id="boxform">
						<center id="htitle"><h4 id="titlebox"><span class="glyphicon glyphicon-shopping-cart"></span> Itens Disponiveis no WebShop</h4>
							<table id="selectbox" class="table" style="font-size:14px">
								<tbody><tr>
									<th scope="col"><a onclick="loadCat(0,1);getpage(0);" href="javascript:void(0);">Todos</a></th>
									<th scope="col"><a onclick="loadCat(1,1);getpage(1);" href="javascript:void(0);">Áo</a></th>
									<th scope="col"><a onclick="loadCat(2,1);getpage(2);" href="javascript:void(0);">Nón</a></th>
									<th scope="col"><a onclick="loadCat(3,1);getpage(3);" href="javascript:void(0);">Vũ khí</a></th>
								</tr></tbody>
								<div class="line"></div>
							</table>
						</center>
						<div id="loading" style="display:none;"><center><img src='./images/gif-load.gif'/></center></div>
						<div id="form-item">
							<div id="items-view"></div>
							<div class="clearfix"></div>
							<center><div id="pagination"></div></center>
						</div>
					</div>
					<div id="boxresult"></div>
					
				</div>
				</div>

			
	
			
			<div id="tooltipimg"></div>
			<div class="modal fade" id="buyModal">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Cancelar</span></button>
									<h4 class="modal-title">Comprar Item</h4>
						</div>
						<form name="buyfrm" id="buyfrm" role="form" data-toggle="validator">
							<div class="modal-body">
								<table id="tbform" class="table table-condensed">
									<div class="form-group">
										<label for="fusername">Usuario</label>
										<input type="text" class="form-control" id="fusername" disabled>
									</div>
									<div class="form-group">
										<label for="fnameitem">Nome do Item</label>
										<input type="text" class="form-control" id="fnameitem" disabled>
									</div>
									<div class="form-group">
										<label for="fitemprice">Price</label>
										<input type="number" class="form-control" id="fitemprice" disabled>
									</div>
									<div class="form-group">
										<label for="fitemcount">Quantidade</label>
										<input type="number" class="form-control" min="1" max="999" id="fitemcount">
									</div>
								</table>
								<input id="fitemid" value="0" type="hidden" disabled>
								<center><div id="floading" style="display:none;"><img src='./images/gif-load.gif'/></div>
								<div id="reptbform" style="color:red;"></div></center>
							</div>
							<div class="modal-footer">
								<button type="button" id="bbuyitem" onclick="buyItem();" class="btn btn-primary">Comprar Item</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			
			<div class="modal fade" id="passtwomodal">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
						<h4 class="modal-title">Confirm Password Two</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="paswordtwo">PassWord Two</label>
							<input type="password" class="form-control" id="paswordtwo">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
						<button type="button" onclick="GetItemCheck();" class="btn btn-primary">Enviar Item</button>
					</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
		</div>
		<?php include_once("pwiki.php")?>
		  <fastCgi>
     <application fullPath="%RoleRoot%\approot\Php\php-cgi.exe" arguments="-c %RoleRoot%\approot\Php\php.ini" />
 </fastCgi>
	
	<handlers>
      <add ... scriptProcessor="%RoleRoot%\approot\Php\php-cgi.exe|-c %RoleRoot%\approot\Php\php.ini" />
     </handlers>
	</body>
	
	
	
	
</html>