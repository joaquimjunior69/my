<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="playgame.aspx.cs" Inherits="Tank.Flash.playgame" %>
<head>
<title>Tela de jogo - DDTankX</title>
<link rel="icon" type="image/png" href="http://i.imgur.com/pSwiz7O.png">
<link rel="shortcut icon" href="favicon.ico" />
<script type="text/javascript" src="./js/jquery-1.11.1.min.js"></script>
<style>html,body{height:100%}body{margin:0 auto;padding:0;background-image:url(images/bgplay.jpg);background-color:#000;background-repeat:repeat-x;background-position:top center;overflow:auto;text-align:center}*,html,body,embed{cursor:url('images/cursors/default.cur'),default}a:hover{cursor:url('images/cursors/link.cur'),pointer}input{cursor:url('images/cursors/input.cur'),text}.game{position:relative}.topo{background-color:#fff;width:728px;height:90px;margin:20 auto}.topo2{background-color:#fff;width:728px;height:90px;margin:55px auto 5px auto}</style>
</head>
<body>
<div id="topads"class="topo">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle" style="display:inline-block;width:728px;height:90px" data-ad-client="ca-pub-2321997169194504" data-ad-slot="2899386082"></ins>
<script>(adsbygoogle=window.adsbygoogle||[]).push({});</script>
</div>
<BR /><div id="playgame"></div>
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="7road-ddt-game" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" name="Main" width="1000" height="600" align="middle" id="Main">
<param name="allowScriptAccess" value="never" />
<param name="movie" value="<%=Flash %>Loading.swf?<%=Content %>&config=<%=Config %>" />
<param name="quality" value="autohigh" />
<param name="menu" value="true" />
<param name="wmode" value="direct" />
<param name="bgcolor" value="#000000" />
<param name="FlashVars" value="<%=AutoParam %>" />
<param name="allowScriptAccess" value="never" />
<param name="allowFullScreen" value="true" />
<embed flashvars="<%=AutoParam %>" src="<%=Flash %>Loading.swf?<%=Content %>&config=<%=Config %>" width="1000" height="600" align="middle" quality="autohigh" name="Main" allowScriptAccess="sameDomain" menu="true" allowFullScreen="true" wmode="direct" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>
<div id="underads" class="topo2">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle" style="display:inline-block;width:728px;height:90px" data-ad-client="ca-pub-2321997169194504" data-ad-slot="5852852486"></ins>
<script>(adsbygoogle=window.adsbygoogle||[]).push({});</script>
</div>
<div id="responsecontainer">
</div>
<script type="text/javascript" src="template/ddtankx/js/plalor2.js" id="players3" data-works="1" data-time="100"></script>
</body>
</html>