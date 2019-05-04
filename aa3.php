
<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body scroll="no" oncontextmenu="return false;">
<script>
$(document).bind("contextmenu",function(e) {
     e.preventDefault();
});
</script>
<div style="top:0px;border:0px;right:0px;">
<?php
$anuncio=rand(1,4);
if($anuncio==1){
 echo'
 <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
 <!-- meio webshop -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-7031489204399812"
     data-ad-slot="4580549487"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>


';}
if($anuncio==2){
 echo'
 <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- meio webshop2 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-7031489204399812"
     data-ad-slot="1696181486"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>


';}
if($anuncio==3){
 echo'
 <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- meio webshop3 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-7031489204399812"
     data-ad-slot="4649647885"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>


';}
if($anuncio==4){
 echo'
 <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- meio webshop4 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-7031489204399812"
     data-ad-slot="7603114286"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>


';}
if($anuncio==5){
	echo '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- teste nexus -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-5786499107872296"
     data-ad-slot="2981332367"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>';
}

?>
</div>
</body>
</html>
