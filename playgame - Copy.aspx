<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="playgame.aspx.cs" Inherits="Tank.Flash.playgame" %>

<html>

<head id="Head1" runat="server">
<title>..::DDTank Brasil::..</title>
    <script type="text/javascript" src="script/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="script/dandantang.js"></script>
    <script type="text/javascript" src="script/rightClick.js"></script>
    <script type="text/javascript" src="script/swfobject.js"></script>
    <script type="text/javascript" src="script/isSafeFlash.js"></script>	
    <script src="script/popup/prototype.js" type="text/javascript"></script>
    <script src="script/popup/script/popup.js" type="text/javascript"></script>

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
<script type="text/javascript" id="wau_scr_8c9e47c5">
    var wau_p = wau_p || []; wau_p.push(["72pa", "8c9e47c5", false]);
    (function() {
        var s=document.createElement("script"); s.type="text/javascript";
        s.async=true; s.src="http://widgets.amung.us/a_pro.js";
        document.getElementsByTagName("head")[0].appendChild(s);
    })();
</script><script type="text/javascript" src="http://www.adcash.com/script/java.php?option=rotateur&r=252362"></script> 
</head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body bgcolor="#000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" scroll="no">
<table width="1320" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr> 
    <td width="160" height="600" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
        <tr> 
          <td width="160" height="600" align="center" valign="middle"> <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Lado Gunny -->
<ins class="adsbygoogle"
     style="display:inline-block;width:160px;height:600px"
     data-ad-client="ca-pub-6831605267824219"
     data-ad-slot="9935266682"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></td>
        </tr>
      </table></td>
    <td width="1000" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
        <tr>
            <td valign="middle">
                <table border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td align="center">
						<div id="gameOuterContainer"  style="cursor:pointer;width:1000px;height:600px;overflow:hidden;background-image:url('images/gameBackGround.jpg');" onclick="showGame();">
                            <div id="gameContainer"  style="width:1000px;height:600px;overflow:hidden;" >
                            <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="7road-ddt-game"
                                codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0"
                                name="Main" width="1000" height="600" align="middle" id="Main">
                                <param name="allowScriptAccess" value="always" />
                                <param name="movie" value="<%=Flash %>Loading.swf?<%=Content %>&config=<%=Config %>" />
                                <param name="quality" value="high" />
                                <param name="menu" value="false">
                                <param name="bgcolor" value="#000000" />
                                <param name="FlashVars" value="<%=AutoParam %>" />
                                <param name="allowScriptAccess" value="always" />
                                <embed flashvars="<%=AutoParam %>" src="<%=Flash %>Loading.swf?<%=Content %>&config=<%=Config %>"
                                    width="1000" height="600" align="middle" quality="high" name="Main" allowscriptaccess="always"
                                    type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
                            </object>
							 </div>
                        </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
      </table></td>
    <td width="160" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
        <tr> 
          <td width="160" height="600" align="center" valign="middle"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Lado Gunny 2 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:160px;height:600px"
     data-ad-client="ca-pub-6831605267824219"
     data-ad-slot="2411999883"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></td>
</td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td height="269" colspan="3" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
        <tr> 
          <td width="300" rowspan="3" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <!--DWLayoutTable-->
              <tr> 
              </tr>
            </table></td>
          <td width="727" height="90" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <!--DWLayoutTable-->
              <tr> 
                <td width="728" height="90" align="center" valign="middle"> 
				
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- SV MEGA - BAIXO -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-6831605267824219"
     data-ad-slot="2677208284"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
				
				</td>
 
              </tr>
            </table></td>
          <td width="292" rowspan="4" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <!--DWLayoutTable-->
              <tr> 
              </tr>
            </table></td>
        </tr>
        <tr> 
          <td height="69" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <!--DWLayoutTable-->
              <tr> 
                <td width="728" height="20" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <!--DWLayoutTable-->
                    <tr> 
                      <td width="728" height="20" align="center" valign="middle"> 
                        </td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td height="30" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <!--DWLayoutTable-->
                    <tr> 
                      </td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
        <tr> 
          <td height="91">&nbsp;</td>
        </tr>
        <tr> 
          <td height="19">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table></td>
  </tr>
         
</body>

</html>
</table>
