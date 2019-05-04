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
			<param name="movie" value="'.$LinkFlash[$_SESSION['lang']].'/Loading.swf?user='.$_SESSION['UserName'].'&key='.$k.'&config=http://s2.tanksystem.net/'.$_SESSION['lang'].'/config.xml" />
			<param name="quality" value="medium" />
			<param name="menu" value="true">
			<param name="bgcolor" />
			<param name="FlashVars" value="editby=" />
			<param name="allowScriptAccess" value="always" />
			<embed flashvars="editby=" src="'.$LinkFlash[$_SESSION['lang']].'/Loading.swf?user='.$_SESSION['UserName'].'&key='.$k.'&config=http://s2.tanksystem.net/'.$_SESSION['lang'].'/config.xml"
			width="1000" height="600" align="middle" quality="medium" name="Main" allowscriptaccess="always"
			type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
			</object>
		';
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
	
	
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<style>
      html, body	{ height:100%; }
      body
        {
        margin: 0px auto;
        padding: 0px;
        background-image: url();
		background-color: #000;
		color: #fff;
		font-family: Tahoma, sans-serif;
		
		
	    background-repeat: repeat-x;
       
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
	

  
  <script type="text/javascript" src="http://www.adcash.com/ad/display.php?r=358554"></script>
   
   
 <!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-548c441a3f58a820" async="async"></script>
<!-- [INSTALATION] -->
	
  <!-- libraries (copy and check path correctness) -->
  <script src="js/libs/jquery.min.js"></script>
  <script src="js/libs/jquery.ui.highlight.min.js"></script>
	
  <!-- social locker (copy and check path correctness) -->
  <script src="js/jquery.onp.sociallocker.1.7.6.js"></script>
  <link type="text/css" rel="stylesheet" href="css/jquery.onp.sociallocker.1.7.6.min.css" />
  <link type="text/css" rel="stylesheet" href="css/jquery.onp.sociallocker.1.7.6.min.css" />
	
  <!-- [USAGE] -->
    
  
   <script>

    jQuery(document).ready(function ($) {

        $("#system .jogo").sociallocker({

            demo: false,

            text: {
                header: "Conteúdo bloqueado",
                message: "<strong>Para abrir o jogo, clique em curtir em uma das nossas redes sociais.</strong>"
            },
            
           
            theme: "flat",           
            
            
            buttons: {
                order: [
                    "twitter-tweet"
                    ,"facebook-like"
					,"facebook-share"
                    ,"google-plus"
					
                ]
            },
            
          
            facebook: {
                appId: "1404394766478573",
                like: {
                    
                    url: "http://facebook.com/systemgamesbr"
                }
            },
            twitter: {
                tweet: {
                   
                    url: "http://tanksystem.net"
                }
            },
            google: {
                plus: {
                   
                    url: "http://tanksystem.net" 
                }
            }            
        });

    });
  </script>

    
  <!-- [DON'T COPY] -->
	
  <!-- styles and scripts for this example -->
  <link href="css/examples.css" rel="stylesheet" type="text/css" />
  <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

</head>
<body>

<center>
   <?php include_once("analyticstracking.php") ?>
	  
	 

<table  align=center width="1280" >
  	  <div id="loading"><center><img src='http://chance.amstat.org/wp-content/plugins/wp-lightboxJS/images/loading.gif'/></center></div>
  
  <tr>
    <td>
	
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Lado Gunny -->
<ins class="adsbygoogle"
     style="display:inline-block;width:160px;height:600px"
     data-ad-client="ca-pub-6831605267824219"
     data-ad-slot="9935266682"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

	
	</td>
    <td>
	

	
	</td>

    <td >
	
	
	
	

    <div class="content">
		
      <div id="unityPlayer">
	    
        <div class="wrap">

    <div class="notice">
     
    </div> 
  
     
	  
    
    <article id="system">
        
	
        
        <section class="example">
            <div class="jogo" style="display: none;">
                <div id="playgame" ></div>
            </div>
        </section>
        
    </article>

        
  </div>

        
    </div></td>
    <td>
	
	</td>
    <td>
	
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Lado Gunny 2 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:160px;height:600px"
     data-ad-client="ca-pub-6831605267824219"
     data-ad-slot="2411999883"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
	</td>
  </tr>
   <tr>
     <td height="15"></td>
     <td></td>
     <td align="center" bgcolor="">
     
  
     
     </td>
     <td bgcolor=""></td>
     <td bgcolor=""></td>
  </tr>

     
	 
	 
   <tr>
    <td height="236" bgcolor=""></td>
    <td bgcolor=""></td>
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
  <center>
  
  </center><br />
  
    
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


  </body>






