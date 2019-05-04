<?php
#----------------------------------------#
#------------Admin Painel v1.0-----------#
#--------Create by bachugacon122----=----#
#----------------------------------------#
$rd = rand(0,9999999).rand(0,9999999).uniqid();
session_start();

if(isset($_GET['key'])) {
	$k = $_GET['key'];
	echo '
	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" class= id="7road-ddt-game"
        codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0"
        name="Main" id="Main">
        <param name="allowScriptAccess" value="always" />
        <param name="movie" value="http://tanksystem.net/flash-br/Loading.swf?user='.$_SESSION['UserName'].'&key='.$k.'&config=http://tanksystem.net/br/config.xml" />
        <param name="quality" value="high" />
        <param name="menu" value="false">
        <param name="bgcolor" value="#000000" />
        <param name="FlashVars" value="editby=" />
        <param name="allowScriptAccess" value="always" />
        <embed flashvars="editby=" src="http://tanksystem.net/flash-br/Loading.swf?user='.$_SESSION['UserName'].'&key='.$k.'&config=http://tanksystem.net/br/config.xml"
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
	<style>
      html, body	{ height:100%; }
      body
        {
        margin: 0px auto;
        padding: 0px;
        background-image: url(http://i.imgur.com/kH70ZlX.png);
		background-color: #000;
		
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
    </style>
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
googletag.defineSlot('/71680749/2', [160, 600], 'div-gpt-ad-1410020039311-0').addService(googletag.pubads());
googletag.defineSlot('/71680749/1', [160, 600], 'div-gpt-ad-1410020039311-1').addService(googletag.pubads());
googletag.pubads().enableSingleRequest();
googletag.enableServices();
});
</script>
</head>
<body>
<?php include_once("analyticstracking.php") ?>
<div id="loading"><center><img src='http://chance.amstat.org/wp-content/plugins/wp-lightboxJS/images/loading.gif'/></center></div>

<div id="topads"class="topo">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- Baixo do Game -->
		<ins class="adsbygoogle"
		style="display:inline-block;width:728px;height:90px"
		data-ad-client="ca-pub-6831605267824219"
		data-ad-slot="8034115086"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
</div>
		<!-- <div class="lado1">
		
		<div id='div-gpt-ad-1410020039311-0' style='width:160px; height:600px;'>
		<script type='text/javascript'>
		googletag.cmd.push(function() { googletag.display('div-gpt-ad-1410020039311-0'); });
		</script>
		</div>
		</div>ddtank 2 -->

<BR /><div id="playgame" ></div>

<div id="underads" class="topo2">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- DDTankBr - index -->
		<ins class="adsbygoogle"
		style="display:inline-block;width:728px;height:90px"
		data-ad-client="ca-pub-6831605267824219"
		data-ad-slot="2546315882"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
</div>
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
</script></body>