<?php
#----------------------------------------#
#------------Admin Painel v1.0-----------#
#--------Create by bachugacon122----=----#
#----------------------------------------#
@session_start();
# Configurações de conexão
$conn                      = null;
$c_host                    = 'WIN-N14OJGB796O';
$config['UID']             = 'sa';
$config['PWD']             = 'Ss123456';
$config['Database']        = 'Db_Membership75';
$config['CharacterSet']    = 'UTF-8'; #Not change this value
$dbtank					   = 'Db_Tank75';;
$dbmember				   = 'Db_Membership75';
# Configurações do site
$nomeDDtank                  = 'DDTank World 7.6';
$linksite  					 = 'http://192.168.0.12:8080';
$linkconfig  				 = 'http://192.168.0.12:8080/br/config2.xml';
$LinkFlash 			         = 'http://192.168.0.12:8080/newflashbr337v9/';
$LinkFlashAdm			     = 'http://192.168.0.12:8080/newflashbr77/';
$LinkFlashTemplo             = 'http://192.168.0.12:8080/newflashbr337/';
$linkpainel					 = 'http://192.168.0.12:8080/painel';
$linkfacebook				 = 'https://www.facebook.com/DDTankWorldGame';
$title						 = 'DDTank World 7.8 - Servidor Privado ';
$keywords					 = 'DDtank,Private,Pirata,Painel,Free';
$description				 = 'Servidor totalmente atualizado temos painel free';
# Configurações funções do site
$painel					   = true;
$loginFacebook			   = true;
$postFacebook			   = true;
$nickPostFacebook		   = true;
# Configurações login facebook
$appId						= '936975859727912';
$secret						= 'ee229ec9bf7a9ce1e3f2361151e17857';
$scopeFacebook				= 'email';
if($postFacebook)			$scopeFacebook.=',publish_actions';

$msgPostFacebook			= array(
							  "message" => "Comecei a jogar DDTank # 7.6 - Servidor Privado ",
							  "link" => "192.168.0.12:8080",
							  "picture" => "http://192.168.0.12:8080/img/logo.jpg",
							  "name" => "DDTank World 7.6 - Servidor Privado  ",
							  "caption" => "Venha jogar agora mesmo",
							  "description" => "DDtank  7.8",
							  'privacy' => json_encode(array('value'=>'EVERYONE')),
							  );
# Configurações do jogo
$qualidadeDdtank		   = 'high';
$goldStart				   = 999999999;
$Play[0]                   = 'play.php'; //Play game with ads
$Play[1]                   = 'playvip.php'; //Play game no ads
$RateTimeToCoin = 5; #Rate of time online to coin

# Configurações email
$email = '';
$senha = '';
#-----------------------------------------
include('function.php');