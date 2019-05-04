<?php
include('global.php');
if (!isset($_SESSION['UserId']) || isset($_GET['logout'])) {
session_destroy();
die('
<script type="text/javascript">
window.location="login.php";
</script>
');
}
if (isset($_GET['lang'])) {
if ($_GET['lang'] == 'br' || $_GET['lang'] = 'vt') {
$_SESSION['lang'] = $_GET['lang'];
} else
$_SESSION['lang'] = 'br';
}
if (!isset($_SESSION['lang']))
$_SESSION['lang'] = 'br';
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>
      DDTank World 6.6 - Servidor Privado | Com montarias
    </title>
    <link rel="icon" type="image/png" href="http://i.imgur.com/Jzzg8CD.png">
    <meta property="og:locale" content="pt_BR">
    <meta property="og:title" content="DDTank 3 - Servidor Privado">
    <meta name="keywords" content="DDtank, NexusTank, 6.6 pvp,instancia,painel free, habilidade montaria, imagem montaria" />
    
    <meta property='og:description' content='Jogar DDTank World - Servidor Privado,   novas armas, novas instancias! Servidor Mais divertido do Brasil'/>
    <meta property="og:type" content="game" />
    <meta property="og:url" content="">
    <meta property="og:image" content="http://i.imgur.com/2Cg6Gix.png">
    <meta property="og:image:width" content="999" />
    <meta property="og:image:height" content="958" />
    <meta property="og:site_name" content="DDTank World 6.6 - Servidor Privado | Com montarias">
    
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/bootstrap-table.css">
    <link href="./css/style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="./js/jquery-1.11.1.min.js">
    </script>
    <script src="./js/bootstrap.min.js">
    </script>
    <script type="text/javascript" src="./js/webshop.js">
    </script>
    <script src="./js/bootstrap-table.js">
    </script>
    <script src="./js/jquery.twbsPagination.min.js">
    </script>
    <link rel="stylesheet" href="css/animate.css">
    <script src="js/wow.js">
    </script>
    
    <link rel='stylesheet' id='font-awesome-css'  href='//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css?ver=4.0' type='text/css' media='all' />
    <link rel='stylesheet' id='default_nav_font-css'  href='http://fonts.googleapis.com/css?family=Lato%3A400%2C700&#038;ver=4.0' type='text/css' media='all' />
    <link rel='stylesheet' id='default_headings_font-css'  href='http://fonts.googleapis.com/css?family=Roboto%3A400%2C100%2C300%2C700&#038;ver=4.0' type='text/css' media='all' />
    <link rel='stylesheet' id='default_body_font-css'  href='http://fonts.googleapis.com/css?family=Droid+Sans%3A400%2C700&#038;ver=4.0' type='text/css' media='all' />
    <link rel='stylesheet' id='Abel-css'  href='http://fonts.googleapis.com/css?family=Abel%3Anormal&#038;ver=4.0' type='text/css' media='all' />
    
    <script>
      new WOW().init();
      $(window).load(function() {
        <?php
          if (isset($_GET['page']) && $_GET['page'] != '')
            echo "getContentPage('" . $_GET['page'] . "');";
        else
          echo 'loadCat(7,1);getpage(1);';
        ?>
      }
          );
    </script>
    <link href="//fonts.googleapis.com/css?family=Ubuntu:300italic,300,400italic,400,500italic,500,700italic,700" rel="stylesheet" type="text/css">
    
    
    
    <style>
      
      body {
        min-height: 2000px;
        padding-top: 70px;
        font-family: 'Lato', sans-serif;
        font-style:condensed;
        font-size: 14px;
        
        background-color: #1f1106;
        background-image: url("http://i.imgur.com/nnC8qpC.jpg");
        
        background-repeat: no-repeat, no-repeat, no-repeat;
        min-height: 100%;
      }
    </style>
    
  </head>
  <body>
	<div id="fb-root">
      </div>
      <script>
        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s);
          js.id = id;
          js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.4";
          fjs.parentNode.insertBefore(js, fjs);
        }
         (document, 'script', 'facebook-jssdk'));
      </script>
      
      <div id="gwp-header">
        <nav class="wow zoomin navbar navbar-default navbar-fixed-top" role="navigation">
          <div class="container-fluid">
            <div class="navbar-header">
              <a href="./">
                <img src="http://i.imgur.com/8lgVpdr.png" alt="DDTank World" alt="DDTank World" />
              </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user">
                    </span>
                    Painel
                    <?php
if ($_SESSION['IsAdm'] == 1) {
echo ' Adm';
}
?>
                              <span class="caret">
                              </span>
                          </a>
                          <ul class="dropdown-menu" role="menu">
                            
                            
                            <li>
                              <a href="javascript:void(0);" onclick="getContentPage('changepass');">
                                <span class=" glyphicon glyphicon-refresh">
                                </span>
                                Mudar senha
                              </a>
                            </li>
                            <?php
if ($_SESSION['Email'] == '') {
echo '
<li>
<a href="javascript:void(0);" onclick="getContentPage(\'changemail\');">
<span class=" glyphicon glyphicon-refresh">
</span>
Mudar email
</a>
</li>
';
}
?>
                              <li>
                                <a href="javascript:void(0);" onclick="getContentPage('cupon');">
                                  <span class=" glyphicon glyphicon-send">
                                  </span>
                                  Enviar Cupons
                                </a>
                              </li>
                              <li>
                                <a href="javascript:void(0);" onclick="getContentPage('clearmail');">
                                  <span class=" glyphicon glyphicon-trash">
                                  </span>
                                  Limpar Email
                                </a>
                              </li>
                              
                              
                              <li>
                                <a href="index.php?logout=true">
                                  <span class=" glyphicon glyphicon-off">
                                  </span>
                                  Deslogar
                                </a>
                              </li>
                              <?php
if ($_SESSION['IsAdm'] >
0) {

echo '
<hr>
<center>
Funções Adm
</center>
<br>
<li>
<a href="javascript:void(0);" onclick="getContentPage(\'generatepass\');">
<span class=" glyphicon glyphicon-refresh">
</span>
Gerar Nova Senha
</a>
</li>
<li>
<a href="javascript:void(0);" onclick="getContentPage(\'removepass\');">
<span class=" glyphicon glyphicon-trash">
</span>
Retirar Senha Mochila
</a>
</li>




';

}

?>
                          </ul>
                      </li>
                      
                      
                      <li>
                        <a href="javascript:void(0);" onclick="getContentPage('bagweb');">
                          <span class="glyphicon glyphicon-file">
                          </span>
                          Mochila Virtual
                        </a>
                      </li>
                      
                      
                      <li>
                        <a href="javascript:void(0);" onclick="loadCat(0,1);getpage(0);">
                          <span class=" glyphicon glyphicon-shopping-cart">
                          </span>
                          Itens
                        </a>
                      </li>
                      
                      <li>
                        <a href="javascript:void(0);" onclick="getContentPage('topevent');">
                          <span class="glyphicon glyphicon-thumbs-up" STYLE="color: red; font-size: 10pt">
                          </span>
                          
                          <font STYLE="color: red; font-size: 10pt">
                            Ranking 
                          </font>
                        </a>
                      </li>
                      <li>
                        <a href="javascript:void(0);" onclick="getContentPage('topFc');">
                          <span class="glyphicon glyphicon-thumbs-up" STYLE="color: red; font-size: 10pt">
                          </span>
                          
                          <font STYLE="color: red; font-size: 10pt">
                            Ranking Fc
                          </font>
                        </a>
                      </li>
                      
                      <!--
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
</span>
Linguagem 
<span class="caret">
</span>
</a>
<ul class="dropdown-menu" role="menu">
<li>
<a href="index.php?lang=br">

<img src="image/br.png" width="28" height="28" />
Português
</a>
</li>
<li>
<a href="index.php?lang=vt">
<img src="image/viet.png" width="28" height="28" />
Vietnamita
<br />
<span>
Faça seu CF aqui!
</span>
</a>
</li>
</ul>
</li>
-->
                      <li>
						
                          <a href="javascript:void(0);" onclick="getContentPage('cnick');">
                            Mudar Nick 
                            <img src="http://novoddtank.com/novo.gif"  />
                          </a>
                      </li>
                      <li>
                        <a href="javascript:void(0);" onclick="getContentPage('pet');">
                          <img src="http://i.imgur.com/MXwheYt.png" width="15" height="20">
                          Deletar Pet
                        </a>
						
                      </li>
                      
                      <li>
						<a href="index.php?logout=true">
                          <span class="glyphicon glyphicon-off">
                          </span>
                          
                          <strong>
                            <font color="red">
                              Deslogar
                            </font>
                          </strong>
                              </a>
                      </li>
                      
                      <!--
<li>
<a href="#" target="_blank">
Contato
</a>
</li>
-->
                      
                      
                      
                      
                      
                      
                      </ul>
                  </div>
              </div>
              
          </nav>
      </div>
      
      <div id="gwp-body">
		
          <div class="container">
			
              <div data-wow-delay="0.5s" class="wow rollIn col-md-4">
                <div id="form-login" class="form-info">
                  <center>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=http://192.168.0.12/" target="_blank">
                      
                      <strong>
                        <span class="btn">
                          <span class=" glyphicon glyphicon-share">
                          </span>
                          Divulgar Servidor
                        </span>
                      </strong>
                    </a>
                  </center>
                  <br>
                  <h4>
                    <span class="glyphicon glyphicon-user">
                    </span>
                    Minhas informações
                  </h4>
                  
                  <p class="info-field">
                    <b>
                      Identificação
                    </b>
                    : #
                    <?php
echo $_SESSION['UserIdTank'];
?>
                          <a href="javascript:void(0);" onclick="alert('Nos Adicione no WhatsApp 44 8404-4281, informe seu problema e seu código de identificação')">
                            Suporte
                          </a>
                      </p>
                      <p class="info-field">
                        <b>
                          Usuario
                        </b>
                        : 
                        <span id="user-name">
                          <?php
echo $_SESSION['UserName'];
?>
                          </span>
                          <p class="info-field">
                            <b>
                              Email
                            </b>
                            : 
                            <span id="user-name">
                              <?php
if ($_SESSION['Email'] != '') {
echo $_SESSION['Email'];
} else {
echo '
<a href="javascript:void(0);" onclick="getContentPage(\'changemail\');">
<span class=" glyphicon glyphicon-refresh">
</span>
Cadastrar email
</a>
';
}
?>
                          </span>
                          <p class="info-field">
                            <b>
                              Tipo:
                            </b>
                            
                            <?php
co();
if ($_SESSION['IsVip'] == 1)
echo ' 
<span class="label label-success">
Usuario VIP ( ' . GetDayVip($_SESSION['UserId']) . ' dias )
</span>
';
elseif ($_SESSION['IsAdm'] == 1) {
echo ' 
<span class="label label-danger">
Administrador
</span>
';
} elseif ($_SESSION['IsAdm'] == 2) {
echo ' 
<span class="label label-danger">
Moderador
</span>
';
} else
echo ' 
<span class="label label-success">
Player
</span>
';
qc();
?>
                      </p>
                      <p class="info-field">
                        <b>
                          Eu tenho 
                          <span class="label label-default" id="user-coin">
                            <?php
co();
echo loadCoin($_SESSION['UserId']);
?>
  </span>
  COINS
                          </b>
                      </p>
                      <p class="info-field">
                        <b>
                          Tempo Online 
                          <span class="label label-info" id="user-tonl">
                            <?php
echo GetTimeOnline();
qc();
?>
  Horas
  </span>
  <p class="info-field">
    <b>
      Jogadores 
      <span class="label label-default" id="user-tonl">
        <?php
co();



$players = GetPlayersOnline();
if ($players 
< 70) {
$subject = 'Problema com o ddtank';
$content = 'Players online  ' . $players . ' ';
sendmail('joaovitorbor@gmail.com', 'Adm_Joao', $subject, $content, 'Problema com o ddtank');
}
$valor = (GetPlayersOnline() / 200) * 100;
if ($_SESSION['IsAdm'] == 0) {
if ($players 
< 100) {
$players = $players * 2;
} else {
$players = rand(168, 196);
}
$valor = ($players / 200) * 100;
}
if ($valor 
<= 30) {
echo '
<div class="progress">

<div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="' . $players . ' " aria-valuemin="0" aria-valuemax="200" style="width:' . $valor . '%">
<center>
' . $players . '
</center>
</div>

</div>
';


}
if ($valor >
30 && $valor 
<= 50) {
echo '
<div class="progress">

<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="' . $players . ' " aria-valuemin="0" aria-valuemax="200" style="width:' . $valor . '%">
<center>
' . $players . '
</center>
</div>

</div>
';


}
if ($valor >
50 && $valor 
<= 80) {
echo '
<div class="progress">

<div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="' . $players . ' " aria-valuemin="0" aria-valuemax="200" style="width:' . $valor . '%">
<center>
' . $players . '
</center>
</div>

</div>
';


}
if ($valor >
80 && $valor 
<= 100) {
echo '
<div class="progress">

<div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="' . $players . ' " aria-valuemin="0" aria-valuemax="200" style="width:' . $valor . '%">
<center>
' . $players . '
</center>
</div>

</div>
';


}


qc();
?>
  </span>
  <!--
<a href="javascript:void(0)" onclick="ChangeTimeOnlineToCash()">
<br >
Trocar tempo online por cash
</a>
</b>
</p>
-->
  <p class="info-field">
    <b>
      MEU  IP
    </b>
  </a>
                          : 
                          <script
                          type="text/javascript" src="http://www.whatsmyip.us/showipsimple.php">
                            
                          </script>
                          <br />
                          
                          <a href="aviso.html" target="_blank">
                            <img src="http://i.imgur.com/CgR5fUr.png" title="Jogar agora" alt="Jogar Agora" />
                          </a>
                          <br>
                          <center>
                            <a href="http://ww1.192.168.0.12" target="_blank">
                              <img src="http://i.imgur.com/B67GCNw.png" title="Abrir Painel de Itens" alt="Abrir Painel de Itens">
                            </a>
                          </center>
  </br>
                          <!--
<?php
echo $Play[$_SESSION['IsVip']];
?>
-->
                          
                          
                      </li>
                  <br />
                  
                  <div class="fb-page" data-href="https://www.facebook.com/ddtanknexustankoficial" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true">
                    <div class="fb-xfbml-parse-ignore">
                      <blockquote cite="https://www.facebook.com/ddtanknexustankoficial">
                        <a href="https://www.facebook.com/ddtanknexustankoficial">
                          DDTank World
                        </a>
                      </blockquote>
                    </div>
                  </div>
                  
                  
                  
                  
              </div>
              <br />
              
              <div class="line">
              </div>
          </div>
          
          <center>
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js">
            </script>
            <!-- cima login new -->
            <ins class="adsbygoogle"
            style="display:inline-block;width:728px;height:90px"
            data-ad-client="ca-pub-7031489204399812"
            data-ad-slot="2249867483">
            </ins>
            <script>
              (adsbygoogle = window.adsbygoogle || []).push({
              });
            </script>
          </center>
          <br />
          <div data-wow-delay="1s" id="boxmd8" class="wow bounceInDown col-md-8 form-shop">
            
            
            <div id="boxform">
              <center>
                <table id="selectbox" class="table" style="font-size:14px">
                  
                  
                  <tbody>
                    <tr>
                      <th scope="col">
                        <a onclick="loadCat(7,1);getpage(1);" href="javascript:void(0);">
                          Arma
                        </a>
                      </th>
                      <th scope="col">
                        <a onclick="loadCat(5,1);getpage(1);" href="javascript:void(0);">
                          Roupa
                        </a>
                      </th>
                      <th scope="col">
                        <a onclick="loadCat(1,1);getpage(1);" href="javascript:void(0);">
                          Chapéu
                        </a>
                      </th>
                      <th scope="col">
                        <a onclick="loadCat(4,1);getpage(1);" href="javascript:void(0);">
                          Face
                        </a>
                      </th>
                      <th scope="col">
                        <a onclick="loadCat(6,1);getpage(1);" href="javascript:void(0);">
                          Olho
                        </a>
                      </th>
                      <th scope="col">
                        <a onclick="loadCat(3,1);getpage(1);" href="javascript:void(0);">
                          Cabelos
                        </a>
                      </th>
                      
                      
                      
                      
                      
                      
                    </tr>
                  </tbody>
                  <br>
                  <tbody>
                    <tr>
                      <th scope="col">
                        <a onclick="loadCat(9,1);getpage(1);" href="javascript:void(0);">
                          Aneis
                        </a>
                      </th>
                      <th scope="col">
                        <a onclick="loadCat(8,1);getpage(1);" href="javascript:void(0);">
                          Pulseiras
                        </a>
                      </th>
                      <th scope="col">
                        <a onclick="loadCat(14,1);getpage(1);" href="javascript:void(0);">
                          Colares
                        </a>
                      </th>
                      <th scope="col">
                        <a onclick="loadCat(13,1);getpage(1);" href="javascript:void(0);">
                          Ternos
                        </a>
                      </th>
                      <th scope="col">
                        <a onclick="loadCat(2,1);getpage(1);" href="javascript:void(0);">
                          Óculos
                        </a>
                      </th>
                      <th scope="col">
                        <a onclick="loadCat(15,1);getpage(1);" href="javascript:void(0);">
                          Asas
                        </a>
                      </th>
                      
                      
                      
                      
                    </tr>
                  </tbody>
                  <br>
                  <tbody>
                    <tr>
                      <th scope="col">
                        <a onclick="loadCat(1,1);getpage(1);" href="javascript:void(0);">
                          Chapéus
                        </a>
                      </th>
                      <th scope="col">
                        <a onclick="loadCat(16,1);getpage(1);" href="javascript:void(0);">
                          Balões
                        </a>
                      </th>
                      <th scope="col">
                        <a onclick="loadCat(17,1);getpage(1);" href="javascript:void(0);">
                          Dom's
                        </a>
                      </th>
                      <th scope="col">
                        <a onclick="loadCat(40,1);getpage(1);" href="javascript:void(0);">
                          Medalhas
                        </a>
                      </th>
                      <th scope="col">
                        <a onclick="loadCat(35,1);getpage(1);" href="javascript:void(0);">
                          Ovos Pet
                        </a>
                      </th>
                      <th scope="col">
                        <a onclick="loadCat(50,1);getpage(1);" href="javascript:void(0);">
                          Equip Pet
                        </a>
                      </th>
                      
                      
                      
                      
                    </tr>
                  </tbody>
                  
                  <tbody>
                    <tr>
                      <th scope="col">
                        <a onclick="loadCat(99,1);getpage(1);" href="javascript:void(0);">
                          Fugura
                        </a>
                      </th>
                      <th scope="col">
                        <a onclick="loadCat(100,1);getpage(1);" href="javascript:void(0);">
                          Imagem Montaria
                        </a>
                      </th>
                      <th scope="col">
                        <a onclick="loadCat(62,1);getpage(1);" href="javascript:void(0);">
                          Forma Pet
                        </a>
                      </th>
                      <th scope="col">
                        <a onclick="loadCat(11,1);getpage(1);" href="javascript:void(0);">
                          Acessorios
                        </a>
                      </th>
                      <th scope="col">
                        <a onclick="loadCat(101,1);getpage(1);" href="javascript:void(0);">
                          Poções
                        </a>
                      </th>
                      <th scope="col">
                        <a onclick="formSearch();" href="javascript:void(0);">
                          Procurar
                        </a>
                      </th>
                      
                      
                      
                      
                    </tr>
                  </tbody>
                  
                  
                  
                  
                </table>
                
                <tbody>
                  <tr>
                    
                    
                    
                    
                  </a>
              </th>
            </tr>
          </tbody>
          
          <div class="line">
          </div>
      </table>
      <br>
  </center>
  <div id="loading" style="display:none;">
    <center>
      <img src='./images/gif-load.gif'/>
    </center>
  </div>
  <div id="form-item">
    <div id="items-view">
    </div>
    <div class="clearfix">
    </div>
    <center>
      <div id="pagination">
      </div>
    </center>
    <br />
    
  </div>
  
</div>

<div id="boxresult">
</div>

<center>
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js">
  </script>
  <!-- baixo webshop -->
  <ins class="adsbygoogle"
  style="display:inline-block;width:728px;height:90px"
  data-ad-client="ca-pub-7031489204399812"
  data-ad-slot="1347881483">
  </ins>
  <script>
    (adsbygoogle = window.adsbygoogle || []).push({
    });
  </script>
</center>
</div>





</div>

<div id="tooltipimg">
</div>
<div class="modal fade" id="buyModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">
            ×
          </span>
          <span class="sr-only">
            Cancelar
          </span>
        </button>
        <h4 class="modal-title">
          Comprar Item
        </h4>
      </div>
      <form name="buyfrm" id="buyfrm" role="form" data-toggle="validator">
        <div class="modal-body">
          <table id="tbform" class="table table-condensed">
            <div class="form-group">
              <label for="fusername">
                Usuario
              </label>
              <input type="text" class="form-control" id="fusername" disabled>
            </div>
            <div class="form-group">
              <label for="fnameitem">
                Nome do Item
              </label>
              <input type="text" class="form-control" id="fnameitem" disabled>
            </div>
            <div class="form-group">
              <label for="fitemprice">
                Price
              </label>
              <input type="number" class="form-control" id="fitemprice" disabled>
            </div>
            <div class="form-group">
              <label for="fitemcount">
                Quantidade
              </label>
              <input type="number" class="form-control" min="1" max="999" id="fitemcount">
            </div>
          </table>
          <input id="fitemid" value="0" type="hidden" disabled>
          <center>
            <div id="floading" style="display:none;">
              <img src='./images/gif-load.gif'/>
            </div>
            <div id="reptbform" style="color:red;">
            </div>
          </center>
        </div>
        <div class="modal-footer">
          <button type="button" id="bbuyitem" onclick="buyItem();" class="btn btn-primary">
            Comprar Item
          </button>
          <button type="button" class="btn btn-default" data-dismiss="modal">
            Fechar
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="searchModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">
            ×
          </span>
          <span class="sr-only">
            Cancelar
          </span>
        </button>
        <h4 class="modal-title">
          Procurar Item
        </h4>
      </div>
      <form name="searchfrm" id="searchfrm" role="form" data-toggle="validator">
        <div class="modal-body">
          <table id="tbform" class="table table-condensed">
            <div class="form-group">
              <label for="fnameitemsearch">
                Nome do Item
              </label>
              <input type="text" class="form-control" id="fnameitemsearch">
            </div>
          </table>
          <center>
            <div id="floading1" style="display:none;">
              <img src='./images/gif-load.gif'/>
            </div>
            <div id="reptbform1" style="color:red;">
            </div>
          </center>
        </div>
        <div class="modal-footer">
          <button type="button" id="bsearchitem" onclick="searchItem();" class="btn btn-primary">
            Procurar Item
          </button>
          <button type="button" class="btn btn-default" data-dismiss="modal">
            Fechar
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="passtwomodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">
            &times;
          </span>
          <span class="sr-only">
            Fechar
          </span>
        </button>
        <h4 class="modal-title">
          Confirm Password Two
        </h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="paswordtwo">
            PassWord Two
          </label>
          <input type="password" class="form-control" id="paswordtwo">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">
          Fechar
        </button>
        <button type="button" onclick="GetItemCheck();" class="btn btn-primary">
          Enviar Item
        </button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</div>

<?php
include_once("pwiki.php");
?>

  <fastCgi>
     <application fullPath="%RoleRoot%\approot\Php\php-cgi.exe" arguments="-c %RoleRoot%\approot\Php\php.ini" />
 </fastCgi>
	
	<handlers>
   
  <add ... scriptProcessor="%RoleRoot%\approot\Php\php-cgi.exe|-c %RoleRoot%\approot\Php\php.ini" />
   </handlers>

</body>



</html>
