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
        <param name="quality" value="high" />
        <param name="menu" value="false">
        <param name="bgcolor" value="#000000" />
        <param name="FlashVars" value="editby=" />
        <param name="allowScriptAccess" value="always" />
        <embed flashvars="editby=" src="'.$LinkFlash[$_SESSION['lang']].'/Loading.swf?user='.$_SESSION['UserName'].'&key='.$k.'&config=http://s2.tanksystem.net/'.$_SESSION['lang'].'/config.xml"
            width="1000" height="600" align="middle" quality="high" name="Main" allowscriptaccess="always"
            type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
    </object>';
	exit();
}
if(!isset($_SESSION['UserId'])) exit('<script type="text/javascript">window.location="login.php";</script>');
if(isset($_SESSION['IsVip']) && $_SESSION['IsVip'] == 0) exit('<script type="text/javascript">window.location="play.php";</script>');
?>

<head>
		<title>Tela de jogo - DDTankSystem</title>
		<link rel="icon" type="image/png" href="http://i.imgur.com/pSwiz7O.png">
		<link rel="shortcut icon" href="favicon.ico" />
	<script type="text/javascript" src="./js/jquery-1.11.1.min.js"></script>
	
      
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
	

	
	
	<script type="text/javascript">
<!--
	var allowLeave = 2;
	var www="";
	var name="弹弹堂";
        var isPay=false;
	
	function trace(){
		alert("充值");
	}
	function setFavorite(path,titlename,allowvalue)
	{ 
             www=path;
             name=titlename;
             allowLeave=allowvalue;
	}
	function toLocation(url,msg){
		alert(msg);
		closeWindow("1",url);
	}
	
	function addToFavorite()
	{
		var ua = navigator.userAgent.toLowerCase();
		if(ua.indexOf("msie 8")>-1){
			external.AddToFavoritesBar(www,name,'');//IE8
		}else{
			try {
				window.external.addFavorite(www, name);
			} catch(e) {
				try {
					window.sidebar.addPanel(name, www, "");//firefox
				} catch(e) {
					alert("Trình duy?n này kh?ng h? tr? tính n?ng này,h?y dùng Ctrl+D ?? thêm");
				}
			}
		}
	}

	function getLocationUrl(){
		var addurl = document.location.href;
		 //thisMovie("7road-ddt-game").sendSwfNowUrl(addurl.toString());
		try{
			thisMovie("7road-ddt-game").sendSwfNowUrl(addurl.toString());
		}catch(e){
			if (window.clipboardData){
				window.clipboardData.setData("Text", addurl.toString());
			}
			else if (window.netscape){
				try {
					netscape.security.PrivilegeManager.enablePrivilege(addurl.toString());
				} catch (e) {
					alert("Trình duy?t t? ch?i,h?y nh?n F6 ?? nh?n link copy"); 
				}
				
			}else{
				alert("Trình duy?n này kh?ng h? tr? tính n?ng này,h?y nh?n F6 ?? nh?n link copy"); 
			}
		}
	}

     //3.1新功能
    //js与as交互
     function thisMovie(movieName) {
         if (navigator.appName.indexOf("Microsoft") != -1) {
             return window[movieName];
         } else {
             return document[movieName];
         }
     }
     
     var flashCall   =false;     
     function closeWindow(flag,loginUrl) { 
     flashCall   =true;
     if(flag=="0"){
	    top.window.opener=null; 
	    top.window.open("","_self"); 
	    top.window.close(); 
         }else if(flag=="1") { 
              //修改登陆Url
	        window.location.href=loginUrl;
         }
    }
    function setFlashCall(){
	flashCall=true;
    }
    
    //set Active and email
     var dailyTask=-1,dailyActivity=-1,dailyEmail=-1;
    function setDailyTask(_dailyTask){
	dailyTask=_dailyTask;
    }
    function setDailyActivity(_dailyActivity){
	dailyActivity=_dailyActivity;
     }
    function setDailyEmail(_dailyEmail){
	dailyEmail=_dailyEmail;
     }
     
	window.onbeforeunload = function(e)
    	{
           askUserLeave(e);
    }
    function killErrors() //杀掉所有的出错信息
    { 
	    return true; 
    }
	function sandaFillHandler ()
	{
		if(ibw_public.existNameSpace('sdoNewPay'))
		{
			ibw_public.openWidget('sdoNewPay');
		}
	}
	
	function setFlashFocus()
	{
		//document.getElementById('7road-ddt-game').focus();
	}
  window.onerror = killErrors; 

   	function pushfeed(myJSONtext){
	var data = eval('(' + myJSONtext + ')');
	      		//alert(myJSONtext);
				zmf.ui(
			        {		        	
						pub_key: data.pub_key,
						sign_key: data.sign_key,
						action_id: data.actId,
						uid_to: data.userIdTo,
						object_id: data.objectId,
						attach_name: data.attachName,
						attach_href: data.attachHref,
						attach_caption: data.attachCaption,
						attach_des: data.attachDescription,
						media_type: data.mediaType,
						media_img: data.mediaImage,
						media_src: data.mediaSource,
						actlink_text: data.actionLinkText,
						actlink_href: data.actionLinkHref,
						tpl_id: data.tplId,
						suggestion: [data.itemTitle1,data.itemTitle2,data.itemTitle3]
						//suggestion: ["suggestion1", "suggestion2", "suggestion3"]

			        })
	      	}  

// -->
    </script>
	
</head>
<body scroll="no" onload= "setFlashFocus();">
<?php include_once("analyticstracking.php") ?>

	
	<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td valign="middle">
                <table border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td align="center">
						<div id="gameOuterContainer"  style="cursor:pointer;width:1000px;height:600px;overflow:hidden;background-image:url('images/gameBackGround.jpg');" onclick="showGame();">
                            <div id="gameContainer"  style="width:1000px;height:600px;overflow:hidden;" >
                            <div id="playgame" ></div>
							 </div>
                        </div>
                        </td>
                    </tr>
                </table>
            </td>
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
							url: 'playvip.php',
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
<?php include_once("pwiki.php")?>
</body>