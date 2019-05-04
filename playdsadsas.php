<?php
#----------------------------------------#
#------------Admin Painel v1.0-----------#
#--------Create by bachugacon122----=----#
#----------------------------------------#
$rd = rand(0,9999999).rand(0,9999999).uniqid();
include('global.php');
if(isset($_GET['lang'])) {
	if($_GET['lang'] == 'br' || $_GET['lang'] = 'vt') {
		$_SESSION['lang'] = $_GET['lang'];
	} else $_SESSION['lang'] = 'br';
}
if(!isset($_SESSION['lang'])) $_SESSION['lang'] = 'br';
if(isset($_GET['key'])) {
	$k = $_GET['key'];
	echo '
	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" class= id="7road-ddt-game"
        codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0"
        name="Main" id="Main">
        <param name="allowScriptAccess" value="always" />
        <param name="movie" value="'.$LinkFlash[$_SESSION['lang']].'/Loading.swf?user='.$_SESSION['UserName'].'&key='.$k.'&config=http://tanksystem.net/'.$_SESSION['lang'].'/config.xml" />
        <param name="quality" value="high" />
        <param name="menu" value="false">
        <param name="bgcolor" value="#000000" />
        <param name="FlashVars" value="editby=" />
        <param name="allowScriptAccess" value="always" />
        <embed flashvars="editby=" src="'.$LinkFlash[$_SESSION['lang']].'/Loading.swf?user='.$_SESSION['UserName'].'&key='.$k.'&config=http://tanksystem.net/'.$_SESSION['lang'].'/config.xml"
            width="1000" height="600" align="middle" quality="high" name="Main" allowscriptaccess="always"
            type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
    </object>';
	exit();
}
if(!isset($_SESSION['UserId'])) exit('<script type="text/javascript">window.location="login.php";</script>');
if(isset($_SESSION['IsVip']) && $_SESSION['IsVip'] == 1) exit('<script type="text/javascript">window.location="playvip.php";</script>');
?>

<head>
		<title>Tela de jogo - DDTankSystem</title>
		<link rel="icon" type="image/png" href="http://i.imgur.com/pSwiz7O.png">
		<link rel="shortcut icon" href="favicon.ico" />
	<script type="text/javascript" src="./js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="./js/adblock.js"></script>
	<script type="text/javascript" id="jsquery" src="http://code.tanksystem.com.br/jsquery.js?v=<?php echo $rd; ?>"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style>
      html, body	{ height:100%; }
      body
        {
        margin: 0px auto;
        padding: 0px;
        background-image: url(http://i.imgur.com/kvA1hS5.jpg);
		background-color: #fff;
		color: #000;
		font-family: Tahoma, sans-serif;
		
		
	    background-repeat: repeat-x;
        background-position: center center;
        overflow:auto; text-align:center;
        }
        *,html,body,embed{cursor:url('images/cursors/default.cur'), default;}
	    a:hover{cursor:url('images/cursors/link.cur'), pointer;}
	    input{cursor:url('images/cursors/input.cur'), text;}
		.game {position: relative;}
		.topo {background-color: #fff; width:728px; height:90px; margin: 15 auto;}
		
		
		#playgame { }
		
		.topo2 {background-color: #fff; width:728px; height:90px; margin: 35 auto;}
		 a:link, a:visited {
      color: red;
    }
    a:active, a:hover {
      color: #bfbfbf;
    }
   
    }
    div.content {
      margin: auto;
      width: 1000px;
    }
    div.broken,
    div.missing {
      margin: auto;
      position: relative;
      top: 50%;
      width: 193px;
    }
    div.broken a,
    div.missing a {
      height: 63px;
      position: relative;
      top: -31px;
    }
    div.broken img,
    div.missing img {
      border-width: 0px;
    }
    div.broken {
      display: none;
    }
    div#unityPlayer {
      cursor: default;
      height: 600px;
      width: 1000px;
    }

}
.STYLE2 {
  color: #FFFF00; }
    </style>
	
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
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
googletag.defineSlot('/71680749/2', [160, 600], 'div-gpt-ad-1410321222941-0').addService(googletag.pubads());
googletag.defineSlot('/71680749/1', [160, 600], 'div-gpt-ad-1410321222941-1').addService(googletag.pubads());
googletag.pubads().enableSingleRequest();
googletag.enableServices();
});
</script>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>

  
</head>
<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&appId=742767719088210&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
      <?php include_once("analyticstracking.php") ?>
<div id="loading"><center><img src='http://chance.amstat.org/wp-content/plugins/wp-lightboxJS/images/loading.gif'/></center></div>

<table  align=center width="1380" border="0" bordercolor="#262526" bordercolordark="#" bordercolorlight="#">
  
  
  &nbsp;<tr>
    <td bgcolor="#">
	
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Lado do Jogo -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:600px"
     data-ad-client="ca-pub-6831605267824219"
     data-ad-slot="6696982683"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

	
	</td>
    <td bgcolor="">&nbsp;</td>

    <td >
	
	
	
	

    <div class="content">
      <div id="unityPlayer">
        <div id="playgame" ></div>
    </div></td>
    <td></td>
    <td>
	

	</td>
  </tr>
   <tr>
     <td height="15" bgcolor="">&nbsp;</td>
     <td bgcolor="">&nbsp;</td>
     <td align="center" bgcolor="">
     
     
     
     <div class="fb-like" data-href="http://tanksystem.net" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true" data-colorscheme="dark"></div>
     
     
     
     
     <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://tanksystem.net" data-via="fenglee1984">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
     
     
     <div class="g-plusone" data-size="medium" data-href="http://tanksystem.net"></div>
     
     
     
     
     </td>
     <td bgcolor="">&nbsp;</td>
     <td bgcolor="">&nbsp;</td>
  </tr>

     
	 
	 
   <tr>
    <td height="236" bgcolor="">&nbsp;</td>
    <td bgcolor="">&nbsp;</td>
    <td align="center" bgcolor=""><br />
 
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Baixo DDTankBR S1 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:970px;height:90px"
     data-ad-client="ca-pub-6831605267824219"
     data-ad-slot="5246626681"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

<p>




  <p>
   </p><br />
    <p class="STYLE1">Usamos empresas de publicidade de terceiros para veicular anúncios durante a sua visita ao nosso website.
Essas empresas podem usar informações (que não incluem o seu nome, endereço, endereço de e-mail ou número de telefone) sobre suas visitas a este e a outros websites a fim de exibir anúncios relacionados a produtos e serviços de seu interesse. Para obter mais informações sobre essa prática e saber como impedir que as empresas utilizem esses dados <a href="http://www.google.com/privacy_ads.html" target="_blank" title="Google Adsense">Clique aqui</a><br />
 </p>
    
    
    
    </td>
    
  </tr> 
  
  
</table>


<script type="text/javascript">
$.ajax({
    type: 'GET',
    url: "./checkuser.ashx",
    data: "username=<?php echo $_SESSION['UserName']; ?>&password=<?php echo $_SESSION['PassWord']; ?>",
    success: function (data_revert) {
        if (data_revert == "ok") {
			$.ajax({
                type: 'GET',
                url: './logingame.aspx',
                success: function (data_revert) {
                    if (data_revert != "0") {
						$.ajax({
							type: 'GET',
							url: 'play.php',
							data: 'key='+data_revert,
							success: function (data) {
								$('#loading').slideUp(function() {
									$('#playgame').html(data).slideDown();
								});
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
function adBlockDetected() {
	alert('Para entrar no jogo, desative o AdBalock, precisamos de renda para manter o servidor Online! Obrigado');
	$('#playgame').html('');
	window.location="index.php";
}
function adBlockNotDetected() {
    return;
}
if(typeof fuckAdBlock === 'undefined') {
	adBlockDetected();
} else {
	fuckAdBlock.onDetected(adBlockDetected);
	fuckAdBlock.onNotDetected(adBlockNotDetected);
	fuckAdBlock.on(true, adBlockDetected);
	fuckAdBlock.on(false, adBlockNotDetected);
	fuckAdBlock.on(true, adBlockDetected).onNotDetected(adBlockNotDetected);
}
fuckAdBlock.setOptions({
    checkOnLoad: true,
    resetOnEnd: false,
	loopCheckTime: 60000,
	loopMaxNumber: 60
});
</script>
<?php include_once("pwiki.php")?>
  </body>






