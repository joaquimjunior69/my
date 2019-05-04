<?php co(); if($_SESSION['UserName']=='google1' || GetTimeOnline()<1){
			qc();
			echo '<br>
			<center><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- jogo -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-7031489204399812"
     data-ad-slot="2623409483"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script> </center>
';
		} else{
			echo'<style type="text/css">
					';$random=rand(-20,100);
					$timeRandom=(rand(3,5))*60000;
					$_SESSION['nomeDiv1']=geraString(7,true,true,false);
						$_SESSION['nomeDiv2']=geraString(9,true,true,false);
						$_SESSION['nomeDiv3']=geraString(5,true,true,false);
						$_SESSION['nomeVariavel']=geraString(13,true,true,false);
					$valor=345+$random; echo'								   
.'.$_SESSION['nomeDiv1'].'{
	bottom: 0px; display: inline-block; left: 50%; margin-left: -370px; margin-bottom: -30px; position: fixed; height: '.$valor.'px; width: 740px; 
	background-image: url(/img/roomenterad_bg1.png);
	background-repeat: no-repeat no-repeat; z-index: 99999;
}
</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
';
$script='
var count=0;
var  '.$_SESSION['nomeVariavel'].' = {
	timerAd : {
		timeLeft : 60,
		timer : null,
		runTimer : function(){
			'.$_SESSION['nomeVariavel'].'.timerAd.timeLeft = 60;
			'.$_SESSION['nomeVariavel'].'.timerAd.timer = window.setInterval('.$_SESSION['nomeVariavel'].'.timerAd.runRoutine, 1000);
			window.setTimeout('.$_SESSION['nomeVariavel'].'.timerAd.runTimer,'.$timeRandom.');
			//if(count<6){
			$(".'.$_SESSION['nomeDiv1'].'").animate({
                bottom: "0px"
        	}, 1000);
			//}
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

';
echo '<script type="text/javascript">';

echo cryptJs($script,rand(1,2));
echo'</script>';
echo'
<div class="'.$_SESSION['nomeDiv1'].'">
';
$posicao1=255+$random;
$posicao2=265+$random;
$posicao3=340+$random;
$posicao4=270+$random; 
echo'
 <div style="position: absolute; right: 25px; bottom: '.$posicao4.'px;color: #ffffff; font-weight: bold; font-size: 7px; font-family: Verdana, sans-serif; cursor: pointer; z-index: 99999" onclick="javascript:'.$_SESSION['nomeVariavel'].'.timerAd.closeBanner();">Clique para FECHAR <img src="img/roomenterad_close.png"></img></div>
 <div style="position: absolute; right: -3px; bottom: '.$posicao3.'px;color: #ffffff;width:25px;height:18px; font-weight: bold; font-size: 10px; font-family: Verdana, sans-serif; cursor: pointer; z-index: 99999;background-color:invisible" onclick=""></div>
 <div style="position: absolute; left: 6px; bottom: '.$posicao1.'px; color: rgb(255, 255, 255); font-size: 10px; font-family: Verdana, sans-serif; visibility: visible;" class="'.$_SESSION['nomeDiv2'].'">Anuncio fechando em 30 segundos</div>
<div style="position: absolute; left: 6px; bottom: '.$posicao2.'px; class="'.$_SESSION['nomeDiv3'].' id="'.$_SESSION['nomeDiv3'].'">
<iframe width=\'728px\' height=\'90px\' scrolling="no" frameborder=\'0\' src=\'http://192.168.0.12/play.php?asdf='.$_SESSION['hdj'].'\'  ></iframe>
</div>

		'; } ?>
