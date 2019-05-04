

<?php
$rd = rand(0,9999999).rand(0,9999999).uniqid();
 $_SESSION['positionAnuncio']=rand(-20, 30);
 
include('global.php');

if(isset($_GET['lang'])) {
	if($_GET['lang'] == 'br' || $_GET['lang'] = 'vt') {
		$_SESSION['lang'] = $_GET['lang'];
	} else $_SESSION['lang'] = 'br';
}
if(!isset($_SESSION['lang'])) $_SESSION['lang'] = 'br';
if(isset($_POST['key'])) {
	
	$_SESSION['k'] = $_POST['key'];
	echo $k;
	exit();
	
}
if(isset($_GET['asdf'])){
include ("anuncio.php");
exit();
}
if(!isset($_SESSION['UserId']) || !isset($_SESSION['nomeDiv1'])|| !isset($_SESSION['nomeDiv2'])|| !isset($_SESSION['nomeDiv3'])|| !isset($_SESSION['nomeVariavel']) || !isset($_SESSION['hdj'])) exit('<script type="text/javascript">window.location="login.php";</script>');
if(isset($_SESSION['IsVip']) && $_SESSION['IsVip'] == 1) exit('<script type="text/javascript">window.location="playvip.php";</script>');
?>

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
		<meta name="robots" content="noindex">
		<link rel="shortcut icon" href="http://i.imgur.com/t0VGKfV.png"/>
		<script src="./js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="./js/adblock.js"></script>
		<script type="text/javascript" src="./js/webshop.js"></script>
		 <script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
    <!-- use jssor.slider.mini.js (40KB) instead for release -->
    <!-- jssor.slider.mini.js = (jssor.js + jssor.slider.js) -->
    <script type="text/javascript" src="../js/jssor.js"></script>
    <script type="text/javascript" src="../js/jssor.slider.js"></script> 
			
 <style>
       html, body	{ height:100%; }
      body
        {
        margin: 0px auto;
        padding: 0px;
        background-image: url(images/bg_all.jpg);
	    background-repeat: no-repeat;
        background-position: center center;
        overflow:auto; text-align:center;
        }
        *,html,body,embed{cursor:url('images/cursors/default.cur'), default;}
	    a:hover{cursor:url('images/cursors/link.cur'), pointer;}
	    input{cursor:url('images/cursors/input.cur'), text;}
    </style>

		
</head>
<body scroll="no" oncontextmenu="return false;" >
<style>#we51{position:fixed !important;position:absolute;top:1px;top:expression((t=document.documentElement.scrollTop?document.documentElement.scrollTop:document.body.scrollTop)+"px");left:3px;width:100%;height:98%;background-color:#fff;opacity:.95;filter:alpha(opacity=95);display:block;padding:20% 0}#we51 *{text-align:center;margin:0 auto;display:block;filter:none;font:bold 14px Verdana,Arial,sans-serif;text-decoration:none}#we51 ~ *{display:none}</style><div id="we51"><center>Please enable / Bitte aktiviere JavaScript!<br>Veuillez activer / Por favor activa el Javascript!<a href="http://bit.ly/dxotu9">[ ? ]</a></center></div><script>window.document.getElementById("we51").parentNode.removeChild(window.document.getElementById("we51"));(function(f,k){function g(a){a&&we51.nextFunction()}var h=f.document,l=["i","u"];g.prototype={rand:function(a){return Math.floor(Math.random()*a)},getElementBy:function(a,c){return a?h.getElementById(a):h.getElementsByTagName(c)},getStyle:function(a){var c=h.defaultView;return c&&c.getComputedStyle?c.getComputedStyle(a,null):a.currentStyle},deferExecution:function(a){setTimeout(a,2E3)},insert:function(a,c){var e=h.createElement("center"),d=h.body,b=d.childNodes.length,m=d.style,f=0,g=0;if("we51"==c){e.setAttribute("id",c);m.margin=m.padding=0;m.height="100%";for(b=this.rand(b);f<b;f++)1==d.childNodes[f].nodeType&&(g=Math.max(g,parseFloat(this.getStyle(d.childNodes[f]).zIndex)||0));g&&(e.style.zIndex=g+1);b++}e.innerHTML=a;d.insertBefore(e,d.childNodes[b-1])},displayMessage:function(a){var c=this;a="abisuq".charAt(c.rand(5));c.insert("<"+a+'><img src="data:image/png;base64,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" height="79" width="432" alt="" /> <a href="http://bit.ly/dxotu9">[ ? ]</a>'+("</"+a+">"),"we51");h.addEventListener&&c.deferExecution(function(){c.getElementBy("we51").addEventListener("DOMNodeRemoved",function(){c.displayMessage()},!1)})},i:function(){for(var a="AdBar,ad-ban,adSpace,ad_post,ads-E,midadd,topadz,ad,ads,adsense".split(","),c=a.length,e="",d=this,b=0,f="abisuq".charAt(d.rand(5));b<c;b++)d.getElementBy(a[b])||(e+="<"+f+' id="'+a[b]+'"></'+f+">");d.insert(e);d.deferExecution(function(){for(b=0;b<c;b++)if(null==d.getElementBy(a[b]).offsetParent||"none"==d.getStyle(d.getElementBy(a[b])).display)return d.displayMessage("#"+a[b]+"("+b+")");d.nextFunction()})},u:function(){var a="/ad1-728-,/ad728s.,/adkeys.,/adloader.,/ads/im2.,/adsinsert.,/popounder4.,/right_ad^,/textad.,.300x250_".split(","),c=this,e=c.getElementBy(0,"img"),d,b;e[0]!==k&&e[0].src!==k&&(d=new Image,d.onload=function(){b=this;b.onload=null;b.onerror=function(){l=null;c.displayMessage(b.src)};b.src=e[0].src+"#"+a.join("")},d.src=e[0].src);c.deferExecution(function(){c.nextFunction()})},nextFunction:function(){var a=l[0];a!==k&&(l.shift(),this[a]())}};f.we51=we51=new g;h.addEventListener?f.addEventListener("load",g,!1):f.attachEvent("onload",g)})(window);</script>
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td valign="middle">
                <table border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td align="center">
						<div id="gameOuterContainer"  style="cursor:pointer;width:1000px;height:600px;overflow:hidden;background-image:url('images/gameBackGround.jpg');" onclick="showGame();">
                            <div id="gameContainer"  style="width:1000px;height:600px;overflow:hidden;" >
                            <?php
														if($_SESSION['IsAdm']==1){
		echo '
		<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" class= id="7road-ddt-game"
				codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0"
				name="Main" id="Main">
				<param name="allowScriptAccess" value="always" />
				<param name="movie" value="'.$LinkFlashAdm.'Loading.swf?user='.$_SESSION['UserName'].'&key='.$_SESSION['k'].'&config='.$linksite.'/'.$_SESSION['lang'].'/config2.xml" />
				<param name="quality" value="'.$qualidadeDdtank.'" />
				<param name="menu" value="false">
				<param name="bgcolor" value="#000000" />
				<param name="wmode" value="direct" />
				<param name="FlashVars" value="editby=" />
				<param name="allowScriptAccess" value="always" />
				<embed flashvars="editby=" src="'.$LinkFlashAdm.'Loading.swf?user='.$_SESSION['UserName'].'&key='.$_SESSION['k'].'&config='.$linksite.'/'.$_SESSION['lang'].'/config2.xml"
				width="1000" height="600" align="middle" quality="'.$qualidadeDdtank.'" name="Main" allowscriptaccess="always"
				type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" wmode="direct" />
				</object>
				';
	}else{
		
	echo '
	
				<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" class= id="7road-ddt-game"
				codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0"
				name="Main" id="Main">
				<param name="allowScriptAccess" value="always" />
				<param name="movie" value="'.$LinkFlashAdm.'Loading.swf?user='.$_SESSION['UserName'].'&key='.$_SESSION['k'].'&config='.$linksite.'/'.$_SESSION['lang'].'/config2.xml" />
				<param name="quality" value="'.$qualidadeDdtank.'" />
				<param name="menu" value="false">
				<param name="bgcolor" value="#000000" />
				<param name="wmode" value="direct" />
				<param name="FlashVars" value="editby=" />
				<param name="allowScriptAccess" value="always" />
				<embed flashvars="editby=" src="'.$LinkFlashAdm.'Loading.swf?user='.$_SESSION['UserName'].'&key='.$_SESSION['k'].'&config='.$linksite.'/'.$_SESSION['lang'].'/config2.xml"
				width="1000" height="600" align="middle" quality="'.$qualidadeDdtank.'" name="Main" allowscriptaccess="always"
				type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" wmode="direct" />
				</object>
				
			';
	}
	?>
							 </div>
                        </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
      



</body>