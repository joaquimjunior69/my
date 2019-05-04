

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
if(isset($_GET['key'])) {
	$k = $_GET['key'];
	if($_SESSION['IsAdm']==1){
		echo '
		<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" class= id="7road-ddt-game"
				codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0"
				name="Main" id="Main">
				<param name="allowScriptAccess" value="always" />
				<param name="movie" value="'.$LinkFlashAdm.'Loading.swf?user='.$_SESSION['UserName'].'&key='.$k.'&config='.$linksite.'/'.$_SESSION['lang'].'/config2.xml" />
				<param name="quality" value="'.$qualidadeDdtank.'" />
				<param name="menu" value="false">
				<param name="bgcolor" value="#000000" />
				<param name="FlashVars" value="editby=" />
				<param name="allowScriptAccess" value="always" />
				<embed flashvars="editby=" src="'.$LinkFlashAdm.'Loading.swf?user='.$_SESSION['UserName'].'&key='.$k.'&config='.$linksite.'/'.$_SESSION['lang'].'/config2.xml"
				width="1000" height="600" align="middle" quality="'.$qualidadeDdtank.'" name="Main" allowscriptaccess="always"
				type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
				</object>
	   <br><br>

	
				<center><form name="mensagem" id="mensagem" role="form" data-toggle="validator">
	<div class="modal-body">
		<table id="tbform" class="table table-condensed">
			<div class="form-group">
				<label for="cmensagem">Mensagem a ser enviada</label>
				<input type="text" class="form-control" id="cmensagem" value="">
			</div>
		</table>
		<button type="button" id="bsendMsg" onclick="sendMsg();" class="btn btn-primary">Enviar</button>
	</div>
</form></center>
				';
	}else{
		
	echo '
				<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" class= id="7road-ddt-game"
				codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0"
				name="Main" id="Main">
				<param name="allowScriptAccess" value="always" />
				<param name="movie" value="'.$LinkFlash.'Loading.swf?user='.$_SESSION['UserName'].'&key='.$k.'&config='.$linksite.'/'.$_SESSION['lang'].'/config.xml" />
				<param name="quality" value="'.$qualidadeDdtank.'" />
				<param name="menu" value="false">
				<param name="bgcolor" value="#000000" />
				<param name="FlashVars" value="editby=" />
				<param name="allowScriptAccess" value="always" />
				<embed flashvars="editby=" src="'.$LinkFlash.'Loading.swf?user='.$_SESSION['UserName'].'&key='.$k.'&config='.$linksite.'/'.$_SESSION['lang'].'/config.xml"
				width="1000" height="600" align="middle" quality="'.$qualidadeDdtank.'" name="Main" allowscriptaccess="always"
				type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
				</object>
				
			';
	}
	exit();
	
}
if(isset($_GET['hdj'])){
	$ramdom=rand(1,1);
	echo'
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- jogo -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-6889552436072627"
     data-ad-slot="3917063795"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script> 
	';
	exit();
}
if(!isset($_SESSION['UserId']) || !isset($_SESSION['nomeDiv1'])|| !isset($_SESSION['nomeDiv2'])|| !isset($_SESSION['nomeDiv3'])|| !isset($_SESSION['nomeVariavel'])) exit('<script type="text/javascript">window.location="login.php";</script>');
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script type="text/javascript" src="./js/webshop.js"></script>
		 <script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
    <!-- use jssor.slider.mini.js (40KB) instead for release -->
    <!-- jssor.slider.mini.js = (jssor.js + jssor.slider.js) -->
    <script type="text/javascript" src="../js/jssor.js"></script>
    <script type="text/javascript" src="../js/jssor.slider.js"></script>
	<script type="text/javascript">
var notification = window.Notification || window.mozNotification || window.webkitNotification;

// The user needs to allow this
if ('undefined' === typeof notification)
    alert('Web notification not supported');
else
    notification.requestPermission(function(permission){});

// A function handler
var notificar = function(titleText, bodyText,url)
{
    if ('undefined' === typeof notification)
        return false;       //Not supported....
    var noty = new notification(
        titleText, {
            body: bodyText,
            dir: 'auto', // or ltr, rtl
            lang: 'EN', //lang used within the notification.
            tag: 'notificationPopup', //An element ID to get/set the content
            icon: url //The URL of an image to be used as an icon
        }
    );
    noty.onclick = function () {
        console.log('notification.Click');
    };
    noty.onerror = function () {
        console.log('notification.Error');
    };
    noty.onshow = function () {
        console.log('notification.Show');
    };
    noty.onclose = function () {
        console.log('notification.Close');
    };
    return true;
}


</script>
<?php
if($_SESSION['IsAdm']==1){
	echo'<script type="text/javascript">
function sendMsg() {
	//$(\'#mensagem\').slideUp(function() {
		//$(\'#loading\').slideDown(function() {
			var mensagem = $(\'#cmensagem\').val();
			if(mensagem==\'\') {
				
			}else{
				$.ajax({
					type: "POST",
					url: "ajax.php?ty=notificar",
					data: \'msg=\'+mensagem,
					success : function(data){
						//$(\'#loading\').slideUp(function() {
							//$(\'#boxresult\').html(data).slideDown();
						//	console.log(data);
						//});
					},
					error : function(){
						//$(\'#loading\').slideUp(function() {
							//$(\'#boxresult\').html(\'Error, please try again\').slideDown();
							//$(\'#mensagem\').slideDown(function() {clearForm(\'#mensagem\');});
						//});
					}
				});
			}
				
			
		//});
	//});
}
</script>';
}
?>
   <script src="http://ww1.192.168.0.12:4555/socket.io/socket.io.js"></script>
  
   
  <script>
  var nickname='<?php echo $_SESSION['NickName'] ?>';
    var socket = io('http://ww1.192.168.0.12:4555', {transports: ['websocket', 'polling', 'flashsocket']});
    socket.on('notificacao', function (data) {
	   new notification(
        "NexusTank", {
            body: data,
            dir: 'auto', // or ltr, rtl
            lang: 'EN', //lang used within the notification.
            tag: 'notificationPopup', //An element ID to get/set the content
            icon: "http://ddtank.ninja/image/mascote.png" //The URL of an image to be used as an icon
        }
    );
    });
	<?php
   if($_SESSION['NickName']!='Adm_Joao'){
	   echo'socket.on(\'kick\', function (data) {
	    if(data==nickname){
		   alert(\'Você foi kickado do servidor\');
		window.location.replace(\'index.php\');  
	   }
	   console.log(data);
    });';
   }
   ?>
	

  </script>
			
 <style>
      html, body	{ height:100%; }
      body
        {
        margin: 0px auto;
        padding: 0px;
        background-image: url(4.jpg);
	    background-repeat: no-repeat;
        background-position: center center;
        overflow:auto; text-align:center;
        }
        *,html,body,embed{cursor:url('images/cursors/default.cur'), default;}
	    a:hover{cursor:url('images/cursors/link.cur'), pointer;}
	    input{cursor:url('images/cursors/input.cur'), text;}
		
			#playgane {position: relative;};
        </style>

		
</head>
<body scroll="no" oncontextmenu="return false;" >
<iframe width='100%' height='55' style="top: 0px; left:0px;" frameborder='0' scrolling="no" src='http://conectradio.com.br/player/index.php'></iframe>
<style>#we51{position:fixed !important;position:absolute;top:1px;top:expression((t=document.documentElement.scrollTop?document.documentElement.scrollTop:document.body.scrollTop)+"px");left:3px;width:100%;height:98%;background-color:#fff;opacity:.95;filter:alpha(opacity=95);display:block;padding:20% 0}#we51 *{text-align:center;margin:0 auto;display:block;filter:none;font:bold 14px Verdana,Arial,sans-serif;text-decoration:none}#we51 ~ *{display:none}</style><div id="we51"><center>Please enable / Bitte aktiviere JavaScript!<br>Veuillez activer / Por favor activa el Javascript!<a href="http://bit.ly/dxotu9">[ ? ]</a></center></div><script>window.document.getElementById("we51").parentNode.removeChild(window.document.getElementById("we51"));(function(f,k){function g(a){a&&we51.nextFunction()}var h=f.document,l=["i","u"];g.prototype={rand:function(a){return Math.floor(Math.random()*a)},getElementBy:function(a,c){return a?h.getElementById(a):h.getElementsByTagName(c)},getStyle:function(a){var c=h.defaultView;return c&&c.getComputedStyle?c.getComputedStyle(a,null):a.currentStyle},deferExecution:function(a){setTimeout(a,2E3)},insert:function(a,c){var e=h.createElement("center"),d=h.body,b=d.childNodes.length,m=d.style,f=0,g=0;if("we51"==c){e.setAttribute("id",c);m.margin=m.padding=0;m.height="100%";for(b=this.rand(b);f<b;f++)1==d.childNodes[f].nodeType&&(g=Math.max(g,parseFloat(this.getStyle(d.childNodes[f]).zIndex)||0));g&&(e.style.zIndex=g+1);b++}e.innerHTML=a;d.insertBefore(e,d.childNodes[b-1])},displayMessage:function(a){var c=this;a="abisuq".charAt(c.rand(5));c.insert("<"+a+'><img src="data:image/png;base64,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" height="79" width="432" alt="" /> <a href="http://bit.ly/dxotu9">[ ? ]</a>'+("</"+a+">"),"we51");h.addEventListener&&c.deferExecution(function(){c.getElementBy("we51").addEventListener("DOMNodeRemoved",function(){c.displayMessage()},!1)})},i:function(){for(var a="AdBar,ad-ban,adSpace,ad_post,ads-E,midadd,topadz,ad,ads,adsense".split(","),c=a.length,e="",d=this,b=0,f="abisuq".charAt(d.rand(5));b<c;b++)d.getElementBy(a[b])||(e+="<"+f+' id="'+a[b]+'"></'+f+">");d.insert(e);d.deferExecution(function(){for(b=0;b<c;b++)if(null==d.getElementBy(a[b]).offsetParent||"none"==d.getStyle(d.getElementBy(a[b])).display)return d.displayMessage("#"+a[b]+"("+b+")");d.nextFunction()})},u:function(){var a="/ad1-728-,/ad728s.,/adkeys.,/adloader.,/ads/im2.,/adsinsert.,/popounder4.,/right_ad^,/textad.,.300x250_".split(","),c=this,e=c.getElementBy(0,"img"),d,b;e[0]!==k&&e[0].src!==k&&(d=new Image,d.onload=function(){b=this;b.onload=null;b.onerror=function(){l=null;c.displayMessage(b.src)};b.src=e[0].src+"#"+a.join("")},d.src=e[0].src);c.deferExecution(function(){c.nextFunction()})},nextFunction:function(){var a=l[0];a!==k&&(l.shift(),this[a]())}};f.we51=we51=new g;h.addEventListener?f.addEventListener("load",g,!1):f.attachEvent("onload",g)})(window);</script>


    <!-- Jssor Slider Begin -->
    <!-- To move inline styles to css file/block, please specify a class name for each element. --> 
	<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td valign="middle">
                    <table border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                            <td align="center">
                                <table width="1240" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <!--DWLayoutTable-->

                                    <tr>
                                        <td width="160" height="600" valign="top">
                                            <table width="160" border="0" cellpadding="0" cellspacing="0">
                                                <!--DWLayoutTable-->
                                                <tr>
                                                    <td width="160" height="600" align="center" valign="middle">

                                                       
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td colspan="3" valign="top">
                                            <table width="100" border="0" cellpadding="0" cellspacing="0">

                                                <!--DWLayoutTable-->
                                                <tr>
                                                    <td align="center">
                                                        <div id="playgame"></div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="160" valign="top">
                                            <table width="160" border="0" cellpadding="0" cellspacing="0">
                                                <!--DWLayoutTable-->
                                                <tr>
                                                    <td width="160" height="600" align="center" valign="middle">
													
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" rowspan="2" valign="top">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                <!--DWLayoutTable-->


                                                <tr>
                                                </tr>

                                            </table>
                                            <td width="970" height="90" valign="top">
                                                <table width="728" border="0" cellpadding="0" cellspacing="0">
                                                    <!--DWLayoutTable-->
                                                    <tr>
                                                        <td width="970" height="90" align="left" valign="middle">
        <?php co(); if($_SESSION['UserName']=='google1' || GetTimeOnline()<1){
			qc();
			echo '<br>
			<center><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- jogo -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-6889552436072627"
     data-ad-slot="3917063795"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script> </center>
';
		} else{
			echo'<style type="text/css">
					';$random=rand(-20,100);
					$timeRandom=(rand(3,7))*60000;
					/*$_SESSION['nomeDiv1']=geraString(15,true,true,false);
					$_SESSION['nomeDiv2']=geraString(25,true,true,false);
					$_SESSION['nomeDiv3']=geraString(35,true,true,false);*/
					$valor=345+$random; echo'								   
.'.$_SESSION['nomeDiv1'].'{
	bottom: 0px; display: inline-block; left: 50%; margin-left: -370px; margin-bottom: -30px; position: fixed; height: '.$valor.'px; width: 740px; 
	background-image: url(/img/roomenterad_bg1.png);
	background-repeat: no-repeat no-repeat; z-index: 99999;
}
</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
var count=0;
var  '.$_SESSION['nomeVariavel'].' = {
	timerAd : {
		timeLeft : 60,
		timer : null,
		runTimer : function(){
			'.$_SESSION['nomeVariavel'].'.timerAd.timeLeft = 60;
			'.$_SESSION['nomeVariavel'].'.timerAd.timer = window.setInterval('.$_SESSION['nomeVariavel'].'.timerAd.runRoutine, 1000);
			window.setTimeout('.$_SESSION['nomeVariavel'].'.timerAd.runTimer,'.$timeRandom.');
			
			$(".'.$_SESSION['nomeDiv1'].'").animate({
                bottom: "0px"
        	}, 1000);
			
		},
		runRoutine : function(){
			if('.$_SESSION['nomeVariavel'].'.timerAd.timeLeft > 0)
			{
				--'.$_SESSION['nomeVariavel'].'.timerAd.timeLeft;
				$(".'.$_SESSION['nomeDiv2'].'").text("Anuncio fechando em " + '.$_SESSION['nomeVariavel'].'.timerAd.timeLeft +" segundos");
			}
			else
			{
				count++;
				'.$_SESSION['nomeVariavel'].'.timerAd.closeBanner();
			}
		},
		closeBanner : function(){
			window.clearInterval('.$_SESSION['nomeVariavel'].'.timerAd.timer);
			$(".'.$_SESSION['nomeDiv1'].'").animate({
                bottom: -$(".'.$_SESSION['nomeDiv1'].'").height() + "px"
        	}, 1000);
		}
	}
};
'.$_SESSION['nomeVariavel'].'.timerAd.runTimer();
eval(decodeURIComponent(\'%76%61%72%20%63%61%72%72%65%67%61%20%3d%20%66%75%6e%63%74%69%6f%6e%28%29%7b%20%24%28%65%76%61%6c%28%64%65%63%6f%64%65%55%52%49%43%6f%6d%70%6f%6e%65%6e%74%28%27%25%32%37%25%32%33%25%36%34%25%36%39%25%37%36%25%33%33%25%32%37%27%29%29%29%2e%6c%6f%61%64%28%65%76%61%6c%28%64%65%63%6f%64%65%55%52%49%43%6f%6d%70%6f%6e%65%6e%74%28%27%25%32%32%25%36%38%25%37%34%25%37%34%25%37%30%25%33%61%25%32%66%25%32%66%25%36%34%25%36%34%25%37%34%25%36%31%25%36%65%25%36%62%25%32%65%25%36%65%25%36%39%25%36%65%25%36%61%25%36%31%25%32%66%25%37%30%25%36%63%25%36%31%25%37%39%25%32%65%25%37%30%25%36%38%25%37%30%25%33%66%25%36%38%25%36%34%25%36%61%25%33%64%25%36%31%25%37%33%25%36%34%25%32%32%27%29%29%29%3b%20%7d%3b%20%76%61%72%20%76%33%79%20%3d%20%77%69%6e%64%6f%77%2e%73%65%74%49%6e%74%65%72%76%61%6c%28%63%61%72%72%65%67%61%2c%20%32%34%30%30%30%30%29%3b%20\'));

</script>
<div class="'.$_SESSION['nomeDiv1'].'">
';
$posicao1=255+$random;
$posicao2=265+$random;
$posicao3=340+$random;
$posicao4=267+$random; 
echo'
 <div style="position: absolute; right: 25px; bottom: '.$posicao4.'px;color: #ffffff; font-weight: bold; font-size: 7px; font-family: Verdana, sans-serif; cursor: pointer; z-index: 99999" onclick="javascript:'.$_SESSION['nomeVariavel'].'.timerAd.closeBanner();">Clique para FECHAR </div>
 <div style="position: absolute; right: 6px; bottom: '.$posicao3.'px;color: #ffffff;width:25px;height:18px; font-weight: bold; font-size: 10px; font-family: Verdana, sans-serif; cursor: pointer; z-index: 99999;background-color:black" onclick=""></div>
 <div style="position: absolute; left: 6px; bottom: '.$posicao1.'px; color: rgb(255, 255, 255); font-size: 10px; font-family: Verdana, sans-serif; visibility: visible;" class="'.$_SESSION['nomeDiv2'].'">Anuncio fechando em 30 segundos</div>
<div style="position: absolute; left: 6px; bottom: '.$posicao2.'px; class="'.$_SESSION['nomeDiv3'].' id="'.$_SESSION['nomeDiv3'].'">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- jogo -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-6889552436072627"
     data-ad-slot="3917063795"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>


		'; } ?>
</div>'
		                                                


                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>

                                                            <param name="movie" value="radio.swf" />

                                                            <param name="wmode" value="black" />

                                                            </object>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>

                                            <td colspan="2" rowspan="2" valign="top">
                                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                    <!--DWLayoutTable-->

                                                    <tr>
                                                    </tr>


                                                </table>

                                                <td height="1"></td>
                                                <td width="136"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                    </tr>
                                </table>


                                </td>
                        </tr>
                    </table>
                    </td>
            </tr>
        </tr>
		
      
<div id="loading"><center><img src='./images/gif-load.gif'/></center></div>

<script type="text/javascript">
$.ajax({
    type: 'GET',
    url: "./checkuser.ashx",
    data: "username=<?php echo $_SESSION['UserName'];?>&password=<?php echo $_SESSION['PassWord']; ?>",
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


</script>
</body>