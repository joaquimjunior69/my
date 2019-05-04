<?php
#----------------------------------------#
#------------Admin Painel v1.0-----------#
#--------Create by bachugacon122----=----#
#----------------------------------------#
include('global.php');
if(!isset($_SESSION['UserId'])) die();
if(isset($_GET['ty']))
{
	global $linksite,$linkpainel,$dbtank,$dbmember;
	co();
	switch ($_GET['ty'])
	{
		case 'tooltip':
			gettooltip();
			qc();
			break;
			case 'notificar':
			sendNotification();
			break;
			case 'kick':
			kickar();
			break;
			case 'sendFacebook':
			sendFacebook();
			qc();
			break;
			case 'listRecover':
			listRecover();
			qc();
			break;
			case 'itemAuxiliar':
			itemAuxiliar();
			qc();
			break;
			case 'playerInfo':
			playerInfo();
			qc();
			break;
			case 'clearBag':
			clearBag();
			qc();
			break;
			case 'sendEmail':
			sendEmail();
			qc();
			break;
		case 'item':
			getitem();
			qc();
			break;
			
		case 'event_top':
			GetTopWin();
			qc();
			break;
			case 'topFc':
			GetTopFc();
			qc();
			break;
		case 'gnp':
			getpage();
			qc();
			break;
		case 'form':
			include('module.php');
			buildform();
			qc();
			break;
		case 'buy':
			buyitem();
			qc();
			break;
		case 'bagweb':
			GetinfoBag();
			qc();
			break;
		case 'gitem':
			GetItemToGame();
			qc();
			break;
			case 'enviarItem':
			enviarItem();
			qc();
			break;
			case 'ritem':
			RecoverItemToGame();
			qc();
			break;
		case 'ctime':
			ChangeTimeOnlineToCash();
			qc();
			break;
		case 'cpass':
			ChangePassUser();
			qc();
			break;
			case 'caltermail':
			ChangeMailUser();
			qc();
			break;
		case 'glogin':
			GetLinkLogin();
			qc();
			break;
		case 'cnick':
			ChangeNickName();
			qa();
			break;
			case 'deletePassword':
			DeletePassword();
			qa();
			break;
			case 'generatepass':
			GeneratePass();
			qa();
			break;
		case 'pet':
			getpet();
			qc();
			break;
		case 'del':
			delPet();
			qc();
			break;
		case 'gcoin':
			echo loadCoin($_SESSION['UserID']);
			qc();
			break;
		case 'gvip':
			echo IsVipUser($_SESSION['UserId']);
			qc();
			break;
			case 'ccupon':
			cupons();
			qa();
			break;
			case 'cmail':
			clearmail();
			qa();
			case 'notification':
			notification();
			qa();
			break;
		default:
			echo 'error '.__LINE__;
			break;
	}
} else echo 'error '.__LINE__;
function gettooltip()
{
	global $linksite,$linkpainel,$dbtank,$dbmember;
	$TemplateID = (int)$_POST['id'];
	$q = q("Select TOP 1 CategoryID,Quality,Name,NeedSex,Attack,Defence,Description,Agility,Luck from {$dbtank}.dbo.Shop_Goods Where TemplateID = {$TemplateID}");
	$query = qa($q);
	if(Count($query) > 0)
	{
		if($query['NeedSex'] != 0)
		{
			if($query['NeedSex'] == 1)
				$sexInfo = 'Masculino';
			else
				$sexInfo = 'Feminino';
		}
		else
		{
			$sexInfo = 'UNISEX';
		}
		echo '<div class="tooltip-content" id="tooltipcontent"><div class="ui-tooltip wiki-tooltip">
		<div class="tooltips"><div><div><span style="color:#FFFFFF">'.$query['Name'].'</span><br><div class="pham-chat"><span style="color:'.getQualityColor($query['Quality']).'">'.getQualityName($query['Quality']).'</span></div><div class="loai">'.GetNameItem($query['CategoryID']).'</div></div></div><img class="hr" src="./images/hr.png">';
		if($query['Attack'] > 0)
		{
			echo '<span class="stats">Ataque: '.$query['Attack'].'</span><br><span class="stats">Defesa: '.$query['Defence'].'</span><br><span class="stats">Agilidade: '.$query['Agility'].'</span><br><span class="stats">Sorte: '.$query['Luck'].'</span><br>';
		}
		echo  '<img class="hr" src="./images/hr.png"><span class="des">'.$query['Description'].'</span><img class="hr" src="./images/hr.png"><div><span class="note">Sexo: '.$sexInfo.'</span></div><div><span class="note">Efeito Permanente</span></div></div></div></div>';
	}
	else
	{
		echo 'No infomatin';
	}
}

function sendEmail(){
	global $linksite,$linkpainel,$dbtank,$dbmember;
	$problema=EscapeString($_POST['problema']);
	$subject = 'Suporte NexusTank';
	$players=GetPlayersOnline();
	$content = "NickName: {$_SESSION['NickName']}<br>UserId: {$_SESSION['UserIdTank']}<br>Email: {$_SESSION['Email']}<br>Data/Horario: ".getdia()."<br>Problema: {$problema}";
	//$content .= '<br><br>Players online  '.$players.' ';
	sendmailSuporte($_SESSION['Email'],$_SESSION['NickName'],'joao@gamesnexus.com.br','Adm_Joao',$subject,$content,'Suporte NexusTank');
	echo '<script type="text/javascript">alert("Email enviado com sucesso");</script>';
}

function sendFacebook(){
	$postFacebook=EscapeString($_POST['Facebook']);
	require 'facebook/facebook.php'; 
	global $appId,$secret;
	$facebook = new Facebook(array(
	  'appId'  => $appId,
	  'secret' => $secret,
	));
	$a=$facebook->api('/me/feed', 'POST', $postFacebook);
	print_r($a);
}

function clearBag(){
	global $linksite,$linkpainel,$dbtank,$dbmember;
	$bag=EscapeString($_POST['bag']);
	
	$q = q("SELECT TOP 1 UserID,passwordtwo From {$dbtank}.dbo.Sys_Users_Detail Where State = '1' AND IsExist = 'True' AND UserName = '".$_SESSION['UserName']."'");
	$q1 = q("SELECT TOP 1 UserID,passwordtwo From {$dbtank}.dbo.Sys_Users_Detail Where UserName = '".$_SESSION['UserName']."'");
	if(qn($q) == 1)
		$return .= 'Por favor, saia do jogo antes de executar esta operação';
	if(qa($q1)['passwordtwo']!='' && qa($q1)['passwordtwo']!='NULL'){
		$return='Retire a senha da mochila antes de executar esta operação';
	}
	//if(loadCoin($_SESSION['UserId']) < 5)
		//$return .= 'Not engough coin !';
	
	if(strlen($return) != 0) {
		echo '<script type="text/javascript">alert("'.$return.'");</script>';
		return false;
	}else{
		q("EXECUTE {$dbtank}.[dbo].[clearBagById] {$_SESSION['UserIdTank']},{$bag}");
	}
	echo '<script type="text/javascript">alert("Mochila limpa com sucesso");</script>';
}
function playerInfo(){
	global $linksite,$linkpainel,$dbtank,$dbmember;
	$nick=EscapeString($_POST['nick']);
	$q = q("SELECT TOP 1 a.NickName,c.ConsortiaName,a.ConsortiaID,grade,gp,b.Agility,b.Attack,b.Defence,b.hp,b.Luck,a.fightpower From {$dbtank}.dbo.Sys_Users_Detail as a
inner join {$dbtank}.dbo.Sys_Users_Fight as b
on a.UserID=b.UserID
inner join {$dbtank}.dbo.Consortia as c
on a.ConsortiaID=c.ConsortiaID Where NickName=N'{$nick}'");
	header('Content-Type: application/json');
	echo json_encode(qa($q));
}

function getitem()
{
	global $linksite,$linkpainel,$dbtank,$dbmember;
	if(!isset($_POST['id'],$_POST['p'])) die('error '.__LINE__);
	$nome='nenhumValor';
	if(is_numeric($_POST['id'])){
		$id = (int)$_POST['id'];
	}else{
		$id=(String)EscapeString($_POST['id']);
		$nome=$id;
	}
	$page = (int)$_POST['p'];
	if($page < 1) die();
	if($id<99){
		if($nome=='nenhumValor'){
	$where = $id == 0 ? '' : "Where CategoryID = '{$id}'";
	if($id==50){
		$where = "Where CategoryID >=50 and CategoryID<=52";
	}
	$p_off = ($page-1)*30;
	$where .= ' Order by TemplateID offset '.$p_off.' rows FETCH NEXT 50 ROWS ONLY';
	$query = q('SELECT TemplateID, Price,MaxCount, NeedSex, CategoryID, Pic, Name FROM '.$dbtank.'.dbo.Shop_Goods '.$where);
		}else{
	$where =  "where name collate Latin1_General_CI_AI like '%".$nome."%'";
	$p_off = ($page-1)*30;
	$where .= ' Order by TemplateID offset '.$p_off.' rows FETCH NEXT 50 ROWS ONLY';
	$query = q('SELECT TemplateID, Price,MaxCount, NeedSex, CategoryID, Pic, Name FROM '.$dbtank.'.dbo.Shop_Goods '.$where);
		}
	}else{
		$p_off = ($page-1)*30;
		if($id==99){
	$where = ' Order by TemplateID offset '.$p_off.' rows FETCH NEXT 50 ROWS ONLY';
	$query = q('SELECT a.TemplateID, a.Price,a.MaxCount, a.NeedSex, a.CategoryID, a.Pic, a.Name from '.$dbtank.'.dbo.Shop_Goods as A inner join '.$dbtank.'.dbo.ClothGroupTemplateInfo as B on a.TemplateID=b.TemplateID '.$where);
		}
		if($id==100){
			$where = ' Order by TemplateID offset '.$p_off.' rows FETCH NEXT 50 ROWS ONLY';
	$query = q('SELECT a.TemplateID, a.Price,a.MaxCount, a.NeedSex, a.CategoryID, a.Pic, a.Name from '.$dbtank.'.dbo.Shop_Goods as A inner join '.$dbtank.'.dbo.Mount_Draw_Template as B on a.TemplateID=b.TemplateID '.$where);
		}
		if($id==101){
			$where =  "where name collate Latin1_General_CI_AI like '%pocao%'";
	$where .= ' Order by TemplateID offset '.$p_off.' rows FETCH NEXT 50 ROWS ONLY';
	$query = q('SELECT TemplateID, Price,MaxCount, NeedSex, CategoryID, Pic, Name FROM '.$dbtank.'.dbo.Shop_Goods '.$where);
		}
	}
	if(qn($query) == 0) die();
	$info  = array();
	while($r = qa($query)) {
		$r['img'] = loadimage($r['Pic'],$r['CategoryID'],$r['NeedSex']);
		unset($r['Pic'],$r['CategoryID'],$r['NeedSex']);
		$info[] = $r;
	}
	echo json_encode($info);
}
function getpage()
{
	global $linksite,$linkpainel,$dbtank,$dbmember;
	if(!isset($_POST['id'])) die('error '.__LINE__);
	$nome='nenhumValor';
	if(is_numeric($_POST['id'])){
		$id = (int)$_POST['id'];
	}else{
		$id=(String)EscapeString($_POST['id']);
		$nome=$id;
	}
	if($id<99){
		if($nome=='nenhumValor'){
	$where = $id == 0 ? '' : "Where CategoryID = '{$id}'";
		}else{
			$where = "where name like '%".$nome."%'";
		}
	$query = q('Select Count(TemplateID) as count from '.$dbtank.'.dbo.Shop_Goods '.$where);
	}else{
		if($id==99){
		$query = q('Select Count(a.TemplateID) as count from '.$dbtank.'.dbo.Shop_Goods as A inner join '.$dbtank.'.dbo.ClothGroupTemplateInfo as B on a.TemplateID=b.TemplateID ');
		}
		if($id==100){
			$query = q('Select Count(a.TemplateID) as count from '.$dbtank.'.dbo.Shop_Goods as A inner join '.$dbtank.'.dbo.Mount_Draw_Template as B on a.TemplateID=b.TemplateID ');
		}
		if($id==101){
			$where = "where name collate Latin1_General_CI_AI like '%poção%'";
			$query = q('Select Count(TemplateID) as count from '.$dbtank.'.dbo.Shop_Goods '.$where);
		}
	}
	$info = qa($query);
	echo (int)ceil($info['count']/30);
	return false;
}
function buyitem()
{
	global $linksite,$linkpainel,$dbtank,$dbmember;
	if(!isset($_POST['id'],$_POST['c'])) die('eror '.__LINE__);
	$ItemID    = $_POST['id'];
	$Count     = $_POST['c'];
	$return    = null;
	if($ItemID == null || $Count == null)
		$return .= 'Please enter full information. <br>';
	if(!is_numeric($ItemID))
		$return .= 'Itemid invalid .<br>';
	if(!is_numeric($Count))
		$Count = 1;
	$qcheck = q("SELECT TOP 1 MaxCount,Price from {$dbtank}.dbo.Shop_Goods Where TemplateID = '{$ItemID}'");
	if(qn($qcheck) == 0)
		$return .= 'Server does not sell this item';
	$CheckItem = qa($qcheck);
	if($Count > $CheckItem['MaxCount'])
		$Count = $CheckItem['MaxCount'];
	$Price 	   = $Count*$CheckItem['Price'];
	if(loadCoin($_SESSION['UserId']) < $Price)
		$return .= 'Not enough Coin to buy this item. <br>';
	if(strlen($return) != 0)
	{
		echo $return;
		return false;
	}
	else
	{
		
		q("INSERT INTO {$dbtank}.dbo.Webshop_Bag (UserID,TemplateID,Count,TimeAdd,IsGet) VALUES ('".$_SESSION['UserId']."','{$ItemID}','{$Count}','".date("Y-m-d H:i:s", time())."','False')");
		
		echo 'Item comprado com sucesso, agora va para sua mochila virtual <a href="'.$linksite.'/index.php?page=bagweb"  >Clicando Aqui</a> e em seguida envie os itens comprados para dentro do jogo';
		echo '<br>';
		echo 'Successfully purchased item, now go to your virtual backpack <a href="'.$linksite.'/index.php?page=bagweb"  >Clicking Here</a> and then send the items to the game';
		return false;
	}
}
function GetItemToGame()
{
	global $linksite,$linkpainel,$dbtank,$dbmember;
	if(!isset($_POST['id']) || $_POST['id'] == '') {
		echo 'Please select at least one rows';
		return false;
	}
	$ArrayID = explode(',',$_POST['id']);
	$IdTrue = array();
	foreach($ArrayID as $val) {
		$q = q("SELECT TOP 1 TemplateID,Count From {$dbtank}.dbo.Webshop_Bag Where ID = '".(int)$val."' AND IsGet = 'False' AND UserId='".$_SESSION['UserId']."'");
		if(qn($q) == 1) {
			$r= qa($q);
			$r['ID'] = $val;
			$IdTrue[] = $r;
		}
	}
	$Apara = array();
	$num = count($IdTrue);
	$i = 1;$dem = 0;$para = null;
	$Count = ceil($num/5);
	$array_send = array();
	while($i <= $Count)
	{
		if(($num-$dem) >= 5)
		{
			for($j = 0; $j <= 4; $j++)
			{
				$para .= $IdTrue[$dem]['TemplateID'].','.$IdTrue[$dem]['Count'].',0,0,0,0,0,0,true|';
				$dem++;
			}
		}
		else
		{
			$two = 5-$num+$dem;
			$check = $num-$dem;
			for($j = 0; $j < $check; $j++)
			{
				$para .= $IdTrue[$dem]['TemplateID'].','.$IdTrue[$dem]['Count'].',0,0,0,0,0,0,true|';
				$dem++;
			}
			for($j = 0; $j < $two; $j++)
			{
				$para .= ',1,7,0,0,0,0,0,true|';
			}
		}
		$array_send[] = $para;$para='';
		$i++;
	}
	foreach($IdTrue as $val) {
		q("UPDATE {$dbtank}.dbo.Webshop_Bag SET IsGet = 'True',TimeGet = '".date("Y-m-d H:i:s", time())."' Where ID = '".$val['ID']."'");
	}
	foreach($array_send as $param) {
		$link_admin_send = ''.$linkpainel.'/Admin/mainRequest.ashx/SendMailByAdmin';
		$data = array(
			"title"    => "Itens do WebShop",
			"content"  => "Você comprou este item no webshop,                    Obrigado por jogar nosso servidor!",
			"UserName" => $_SESSION['UserName'],
			"param"    => $param
		);
		$data_string = json_encode($data);
		$ch          = curl_init($link_admin_send);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($data_string))
		);
		$ketqua = curl_exec($ch);
		curl_close($ch);
	}
	echo 'Item enviado com sucesso, Por favor verifique seu correio dentro do jogo!';
	echo '<br>';
	echo 'Item successfully sent Please check your mail in-game!';
	return false;
}

function sendNotification(){
	$msg=$_SESSION['NickName'];
	$msg .=': ';
	$msg .= $_POST['msg'];
	
	$link_admin_send = 'http://ww1.192.168.0.12:8082/api/notificar?notificacao='.urlencode($msg).'&senha=batatinhalinda3629@';

		$ch          = curl_init($link_admin_send);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$ketqua = curl_exec($ch);
		curl_close($ch);
		echo "Mensagem enviada com sucesso";
}


function kickar(){
	$nick = $_POST['kick'];
	
	$link_admin_send = 'http://ww1.192.168.0.12:8082/api/notificar?kick='.urlencode($nick).'&adm='.urlencode($_SESSION['NickName']).'&senha=batatinhalinda3629@';

		$ch          = curl_init($link_admin_send);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$ketqua = curl_exec($ch);
		curl_close($ch);
		echo "Usuario kickado";
}

function RecoverItemToGame()
{
	global $linksite,$linkpainel,$dbtank,$dbmember;
	if(!isset($_POST['id']) || $_POST['id'] == '') {
		echo 'Please select at least one rows';
		return false;
	}
	$ArrayID = explode(',',$_POST['id']);
	$IdTrue = array();
	foreach($ArrayID as $val) {
		$q = q("SELECT TOP 1 TemplateID,Count,ItemID From {$dbtank}.dbo.Sys_Users_Goods Where ItemID = '".(int)$val."' and UserId='".$_SESSION['UserIdTank']."'");
		if(qn($q) == 1) {
			$r= qa($q);
			$r['ItemID'] = $val;
			$IdTrue[] = $r;
		}
	}
	$Apara = array();
	$num = count($IdTrue);
	$i = 1;$dem = 0;$para = null;
	$Count = ceil($num/5);
	$array_send = array();
	while($i <= $Count)
	{
		if(($num-$dem) >= 5)
		{
			for($j = 0; $j <= 4; $j++)
			{
				$para .= $IdTrue[$dem]['TemplateID'].','.$IdTrue[$dem]['Count'].',0,0,0,0,0,0,true|';
				$dem++;
			}
		}
		else
		{
			$two = 5-$num+$dem;
			$check = $num-$dem;
			for($j = 0; $j < $check; $j++)
			{
				$para .= $IdTrue[$dem]['TemplateID'].','.$IdTrue[$dem]['Count'].',0,0,0,0,0,0,true|';
				$dem++;
			}
			for($j = 0; $j < $two; $j++)
			{
				$para .= ',1,7,0,0,0,0,0,true|';
			}
		}
		$array_send[] = $para;$para='';
		$i++;
	}
	foreach($IdTrue as $val) {
		q("delete from {$dbtank}.dbo.Sys_Users_Goods Where ItemID = ".(int)$val['ItemID']." and UserId=".$_SESSION['UserIdTank']."");
	}
	foreach($array_send as $param) {
		$link_admin_send = ''.$linkpainel.'/Admin/mainRequest.ashx/SendMailByAdmin';
		$data = array(
			"title"    => "Itens Recuperados",
			"content"  => "Você recuperou este item,                    Obrigado por jogar nosso servidor!",
			"UserName" => $_SESSION['UserName'],
			"param"    => $param
		);
		$data_string = json_encode($data);
		$ch          = curl_init($link_admin_send);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($data_string))
		);
		$ketqua = curl_exec($ch);
		curl_close($ch);
	}
	echo 'Itens recuperados com sucesso, Por favor verifique seu correio dentro do jogo!';
	echo '<br>';
	echo 'Item successfully sent Please check your mail in-game!';
	return false;
}
function enviarItem()
{
	global $linksite,$linkpainel,$dbtank,$dbmember;
	$item=EscapeString($_POST['id']);
	$qtd=EscapeString($_POST['qtd']);
		$param= ''.$item.','.$qtd.',0,0,0,0,0,0,true|,1,7,0,0,0,0,0,true|,1,7,0,0,0,0,0,true|,1,7,0,0,0,0,0,true|,1,7,0,0,0,0,0,true|';
		$link_admin_send = ''.$linkpainel.'/Admin/mainRequest.ashx/SendMailByAdmin';
		$data = array(
			"title"    => "Itens do WebShop",
			"content"  => "Você comprou este item no webshop,                    Obrigado por jogar nosso servidor!",
			"UserName" => $_SESSION['UserName'],
			"param"    => $param
		);
		$data_string = json_encode($data);
		echo $data_string;
		$ch          = curl_init($link_admin_send);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($data_string))
		);
		$ketqua = curl_exec($ch);
		curl_close($ch);
	
	return false;
}
function itemAuxiliar()
{
	global $linksite,$linkpainel,$dbtank,$dbmember;
	$item=EscapeString($_POST['id']);
	$opt=1;
	$count=qn(q("select * from {$dbtank}.dbo.ItensAuxiliar where UserId={$_SESSION['UserIdTank']} and TemplateId={$item}"));
	if($count>0){
		q("delete from {$dbtank}.dbo.ItensAuxiliar where UserId={$_SESSION['UserIdTank']} and TemplateId={$item}");
		echo 'Item removido da barra auxiliar';
	}else{
	q("insert into {$dbtank}.dbo.ItensAuxiliar values ({$_SESSION['UserIdTank']},{$item})");
	echo 'Item adicionado na barra auxiliar';
	}
}
function listRecover()
{
	global $linksite,$linkpainel,$dbtank,$dbmember;
	$rep = array();
	$q = q("Select A.TemplateID,A.Count,A.ItemID,B.Name from {$dbtank}.dbo.Sys_Users_Goods A left join {$dbtank}.dbo.Shop_Goods B on A.TemplateID = B.TemplateID where a.UserID={$_SESSION['UserIdTank']} and IsExist = 1 and BagType = -1 and place = -1 and RemoveType = 0 and ValidDate != -1");
	if(qn($q) > 0)
	{
		while($r = qa($q))
		{
			$rep[] = $r;
		}
	}
	echo json_encode($rep);
	return false;
}
function GetinfoBag()
{
	global $linksite,$linkpainel,$dbtank,$dbmember;
	$rep = array();
	$q = q("Select A.TemplateID,A.Count,A.ID,B.Name from {$dbtank}.dbo.Webshop_Bag A left join {$dbtank}.dbo.Shop_Goods B on A.TemplateID = B.TemplateID Where A.IsGet = 'False' AND A.UserID = ".$_SESSION['UserId']);
	if(qn($q) > 0)
	{
		while($r = qa($q))
		{
			$rep[] = $r;
		}
	}
	echo json_encode($rep);
	return false;
}
function GeneratePass()
{
	global $linksite,$linkpainel,$dbtank,$dbmember;
	global $conn;
	if(!isset($_POST)) die('Error '.__LINE__);
	$newpass = $_POST['rnp'];
	$user = $_POST['np'];
	$return = '';
	if($user == null || $newpass == null)
	{
		$return .= 'Please enter full form <br>';
	}
	if(strlen($newpass) < 6 || strlen($newpass) > 30)
	{
		$return .= 'A senha deve ter entre 6 e 30 caracteres <br>';
	}
	if(strlen($return) != 0)
	{
		echo $return;
		return false;
	}
	else
	{
		$app     = 'DanDanTang';
		$error   = 0;
		$newpass1=$newpass;
		$newpass = strtoupper(md5($newpass));
		$q = q("Select TOP 1 UserId From {$dbmember}.dbo.Mem_Users Where username ='".$user."'");
		$infor=qa($q);
		$q1 = q("Select TOP 1 UserId From {$dbtank}.dbo.sys_users_detail Where username ='".$user."'");
		$infor1=qa($q1);
	if(qn($q) == 1) $error=1;
	
		
		if($error <= 0)
		{
			$return .= 'A informação não está correcta <br>';
			echo $return;
			return false;
		}
		if($error == 1)
		{
			q("update {$dbmember}.dbo.Mem_UserInfo set password='{$newpass}' Where UserID =".$infor['UserId']." ");
			q("INSERT INTO {$dbtank}.[dbo].[log_Adm_MudarSenha]([userid],[username],[data])VALUES({$infor1['UserId']},'{$user}','".date("Y-m-d H:i:s", time())."')");
			echo '<script type="text/javascript">alert("Senha Altera com Sucesso");</script>';
			return false;
		} else
		{
			echo 'Error '.__LINE__;
			return false;
		}
	}
}
function ChangePassUser()
{
	global $linksite,$linkpainel,$dbtank,$dbmember;
	global $conn;
	if(!isset($_POST)) die('Error '.__LINE__);
	$pass = $_POST['p'];
	$newpass = $_POST['np'];
	$renpass = $_POST['rnp'];
	$user = $_SESSION['UserName'];
	$return = '';
	if($pass == null || $newpass == null || $renpass == null)
	{
		$return .= 'Please enter full form <br>';
	}
	if(strlen($pass) < 6 || strlen($pass) > 30 || strlen($newpass) < 6 || strlen($newpass) > 30)
	{
		$return .= 'A senha deve ter entre 6 e 30 caracteres <br>';
	}
	if($newpass == $pass) $return .= 'A nova senha deve ser diferente da senha antiga <br>';
	if($newpass != $renpass) $return .= 'Confirmar senha não correspondem<br>';
	if(strlen($return) != 0)
	{
		echo $return;
		return false;
	}
	else
	{
		$app     = 'DanDanTang';
		$error   = 0;
		$pass    = strtoupper(md5($pass));
		$newpass = strtoupper(md5($newpass));
		$q = q("Select TOP 1 UserId From {$dbmember}.dbo.Mem_UserInfo Where UserID =".$_SESSION['UserId']." and password='{$pass}'");
	if(qn($q) == 1) $error=1;
	
		
		if($error <= 0)
		{
			$return .= 'A informação não está correcta <br>';
			echo $return;
			return false;
		}
		if($error == 1)
		{
			q("update {$dbmember}.dbo.Mem_UserInfo set password='{$newpass}' Where UserID =".$_SESSION['UserId']." ");
			session_destroy();
			echo '<script type="text/javascript">alert("Senha Altera com Sucesso");</script>';
			echo '<script type="text/javascript">window.location="login.php";</script>';
			return false;
		} else
		{
			echo 'Error '.__LINE__;
			return false;
		}
	}
}


function ChangeMailUser()
{
	global $dbtank;
	if(!isset($_POST)) die('Error '.__LINE__);
	$newpass = EscapeString($_POST['np']);
	$renpass = EscapeString($_POST['rnp']);
	$user = $_SESSION['UserName'];
	$return = '';
	if($newpass == null || $renpass == null)
	{
		$return .= 'Please enter full form <br>';
	}
	if($newpass != $renpass) $return .= 'Confirmar email não correspondem<br>';
	if(strlen($return) != 0)
	{
		echo $return;
		return false;
	}
	else
	{
		$app     = 'DanDanTang';
		$error   = 0;
		$error=1;
	
		
		if($error <= 0)
		{
			$return .= 'A informação não está correcta <br>';
			echo $return;
			return false;
		}
		if($error == 1)
		{
			q("update {$dbtank}.dbo.sys_users_detail set email='{$newpass}' Where UserID =".$_SESSION['UserIdTank']." ");
			session_destroy();
			echo '<script type="text/javascript">alert("Email Alterado com Sucesso");</script>';
			echo '<script type="text/javascript">window.location="login.php";</script>';
			return false;
		} else
		{
			echo 'Error '.__LINE__;
			return false;
		}
	}
}
function GetLinkLogin()
{
	global $LinkLogin,$Play;
	if(!isset($_POST['name'])) die();
	echo $LinkLogin[$_POST['name']].$Play[$_SESSION['IsVip']].'?u='.$_SESSION['UserName'].'&p='.$_SESSION['PassWord'];
	exit();
}
function getpet()
{
	global $dbtank;
	$q = q("Select A.ID,A.Level,B.Name,B.StarLevel,B.Pic From {$dbtank}.dbo.Sys_Users_Pet A Left Join {$dbtank}.dbo.Pet_Template_Info B ON A.TemplateID = B.TemplateID WHERE A.Place > -1 AND A.IsExit = 'True' And A.UserId = (Select Top 1 UserId From {$dbtank}.dbo.Sys_Users_Detail Where UserName = '".$_SESSION['UserName']."')");
	$info = array();
	while($r = qa($q)) {
		$info[] = $r;
	}
	echo json_encode($info);
}
function delPet()
{
	global $dbtank;
	if(!isset($_POST['pid']) || !is_numeric($_POST['pid'])) die('Error '.__LINE__);
	$Pid = $_POST['pid'];
	$q = q("Select TOP 1 ID From {$dbtank}.dbo.Sys_Users_Pet Where UserID = (Select UserID From {$dbtank}.dbo.Sys_Users_Detail Where UserName = '".$_SESSION['UserName']."') And ID = '{$Pid}'");
	if(qn($q) != 1) die('PET you selected does not exist.');
	q("Delete From {$dbtank}.dbo.Sys_Users_Pet Where ID = '{$Pid}'");
	#LogShop($Pid,4);
	echo 'Delete Pet successfull.';
	return false;
}
function ChangeTimeOnlineToCash()
{
	global $dbtank,$RateTimeToCoin;
	$timeonline = GetTimeOnline();
	if($timeonline > 0) {
		$Coin = $timeonline*$RateTimeToCoin;
		q("Update Webshop_Account Set Coin += '{$Coin}' Where UserName = '".$_SESSION['UserName']."'");
		q("Update {$dbtank}.dbo.Sys_Users_Detail Set ChangeOnline += '".($timeonline*60)."' Where UserName = '".$_SESSION['UserName']."' AND IsExist = 'True'");
		LogShop($timeonline,2);
		echo 'true';
	} else echo 'false';
}
function GetTopWin()
{
	global $dbtank;
	$query = q("Select TOP 500 UserID,NickName,Win,Lost=Total-Win from {$dbtank}.dbo.Sys_Users_Detail Where IsExist='True' Order by Win DESC");
	//$info  = array();
	$stt = 0;
	//$text = '{"data":[';
	$textArray=array();
	while($r = qa($query)) {
		//$text .= '{"UserName":"'.EscapeString(addslashes($r['UserName'])).'","Win":'.$r['Win'].',"Lost":'.$r['Lost'].',"Top":'.$stt.'},';
		$stt++;
		//array_push($textArray,('UserName'=>utf8_encode($r['NickName']),'Win'=>$r['Win'],'Lost'=>$r['Lost'],'Top'=>$stt));
		$textArray[]=array('NickName'=>($r['NickName']),'Win'=>$r['Win'],'Lost'=>$r['Lost'],'Top'=>$stt,'UserID'=>$r['UserID']);
	}
	//$text = rtrim($text,',');
	//$text .= ']}';
	echo '{"data":'.json_encode($textArray).'}';
	//echo $text;
	exit();
}
function GetTopFc()
{
	global $dbtank;
	$query = q("Select TOP 500 NickName,FightPower from {$dbtank}.dbo.Sys_Users_Detail Where IsExist='True' Order by FightPower DESC");
	//$info  = array();
	$stt = 0;
	//$text = '{"data":[';
	$textArray=array();
	while($r = qa($query)) {
		//$text .= '{"UserName":"'.EscapeString(addslashes($r['UserName'])).'","Win":'.$r['Win'].',"Lost":'.$r['Lost'].',"Top":'.$stt.'},';
		$stt++;
		//array_push($textArray,('UserName'=>utf8_encode($r['NickName']),'Win'=>$r['Win'],'Lost'=>$r['Lost'],'Top'=>$stt));
		$textArray[]=array('NickName'=>($r['NickName']),'FightPower'=>$r['FightPower'],'Top'=>$stt);
	}
	//$text = rtrim($text,',');
	//$text .= ']}';
	echo '{"data":'.json_encode($textArray).'}';
	//echo $text;
	exit();
}
function ChangeNickName()
{
	global $dbtank;
	$NickName = addslashes(EscapeString($_POST['nn']));
	$ReNickName = addslashes(EscapeString($_POST['rnn']));
	$return = '';
	if($NickName != $ReNickName)
		$return .= 'Os novos nicks não conferem, por favor cheque';
	if(stripos(strtolower($NickName),'gm') !== false || stripos(strtolower($NickName),'adm') !== false || stripos($NickName,',') !== false || stripos($NickName,'.') !== false|| stripos(strtolower($NickName),'mod') !== false)
		$return .= 'Caracters Invalidos';
	$q = q("SELECT TOP 1 UserID From {$dbtank}.dbo.Sys_Users_Detail Where NickName = '{$NickName}'");
	if(qn($q) == 1)
		$return .= 'Este nome ja esta sendo usado, por favor escolha outro';
	$q = q("SELECT TOP 1 UserID From {$dbtank}.dbo.Sys_Users_Detail Where State = '1' AND IsExist = 'True' AND UserName = '".$_SESSION['UserName']."'");
	if(qn($q) == 1)
		$return .= 'Por favor, saia do jogo antes de executar esta operação';
	
	//if(loadCoin($_SESSION['UserId']) < 5)
		//$return .= 'Not engough coin !';
	
	if(strlen($return) != 0) {
		echo $return;
		return false;
	}
	//echo'<script type="text/javascript">alert("'.$aaaa.'");</script>';
	q("UPDATE {$dbtank}.dbo.Sys_Users_Detail SET NickName = N'{$NickName}' Where UserName = '".$_SESSION['UserName']."'");
	//q("UPDATE Webshop_Account SET Coin -= '5' Where UserName = '".$_SESSION['UserName']."'"); 
	session_destroy();
	echo '<script type="text/javascript">alert("Mudança de nome Concluida, voce será redirecionado para fazer o login novamente!");window.location="login.php";</script>';
	return false;
}

function cupons()
{
	global $dbtank;
	$gold = (int)EscapeString($_POST['gold']);
	$money = (int)EscapeString($_POST['cupon']);
	$gifttoken = (int)EscapeString($_POST['gift']);
	$return = '';
	$q = q("SELECT TOP 1 UserID From {$dbtank}.dbo.Sys_Users_Detail Where State = '1' AND IsExist = 'True' AND UserName = '".$_SESSION['UserName']."'");
	if(qn($q) == 1)
		$return .= 'Por favor, saia do jogo antes de executar esta operação';
	
	//if(loadCoin($_SESSION['UserId']) < 5)
		//$return .= 'Not engough coin !';
	
	if(strlen($return) != 0) {
		echo '<script type="text/javascript">alert("'.$return.'");</script>';
		return false;
	}
	q("UPDATE {$dbtank}.dbo.Sys_Users_Detail set gold={$gold},Money={$money},GiftToken={$gifttoken} Where UserName = '".$_SESSION['UserName']."'");
	//q("UPDATE Webshop_Account SET Coin -= '5' Where UserName = '".$_SESSION['UserName']."'"); 
	echo '<script type="text/javascript">alert("Concluido, Bom Jogo!");</script>';
	return false;
}

function DeletePassword()
{
	global $dbtank;
	$username = EscapeString($_POST['username']);
	$return = '';
	$q = q("SELECT TOP 1 UserID From {$dbtank}.dbo.Sys_Users_Detail Where State = '1' AND IsExist = 'True' AND UserName = '".$username."'");
	if(qn($q) == 1)
		$return .= 'Por favor, saia do jogo antes de executar esta operação';
	
	//if(loadCoin($_SESSION['UserId']) < 5)
		//$return .= 'Not engough coin !';
	
	if(strlen($return) != 0) {
		echo '<script type="text/javascript">alert("'.$return.'");</script>';
		return false;
	}
	q("UPDATE {$dbtank}.dbo.Sys_Users_Detail set passwordtwo='' Where UserName = '".$username."'");
	//q("UPDATE Webshop_Account SET Coin -= '5' Where UserName = '".$_SESSION['UserName']."'"); 
	echo '<script type="text/javascript">alert("Concluido!");</script>';
	return false;
}




function clearmail()
{
	global $dbtank;
	$return = '';
	$q = q("SELECT TOP 1 UserID  From {$dbtank}.dbo.Sys_Users_Detail Where State = '1' AND IsExist = 'True' AND UserName = '".$_SESSION['UserName']."'");
	if(qn($q) == 1)
		$return .= 'Por favor, saia do jogo antes de executar esta operação';
	
	//if(loadCoin($_SESSION['UserId']) < 5)
		//$return .= 'Not engough coin !';
	
	if(strlen($return) != 0) {
		echo '<script type="text/javascript">alert("'.$return.'");</script>';
		return false;
	}
	q("UPDATE {$dbtank}.dbo.User_Messages set isExist=0 Where ReceiverID = (SELECT  UserID  From {$dbtank}.dbo.Sys_Users_Detail Where UserName = '".$_SESSION['UserName']."') ");
	//q("UPDATE Webshop_Account SET Coin -= '5' Where UserName = '".$_SESSION['UserName']."'"); 
	echo '<script type="text/javascript">alert("Email Limpo, Bom Jogo!");</script>';
	return false;
}

function notification()
{
	global $dbtank;
	$notification=EscapeString($_POST['notification']);
	$return = '';
	$q = q("SELECT TOP 1 UserID  From {$dbtank}.dbo.Sys_Users_Detail Where State = '1' AND IsExist = 'True' AND UserName = '".$_SESSION['UserName']."'");
	if(qn($q) == 1)
		$return .= 'Por favor, saia do jogo antes de executar esta operação';
	
	//if(loadCoin($_SESSION['UserId']) < 5)
		//$return .= 'Not engough coin !';
	
	if(strlen($return) != 0) {
		echo '<script type="text/javascript">alert("'.$return.'");</script>';
		return false;
	}
	q("UPDATE {$dbtank}.dbo.Sys_Users_Detail set notification={$notification} where userid={$_SESSION['UserIdTank']}");
	$_SESSION['notification']=$notification;
	return false;
}