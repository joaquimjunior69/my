<?php
$item = array();
 //Lista de itens VIP
$item[] = array('TemplateID'=>'100100','Count'=>999); // only edit here
$item[] = array('TemplateID'=>'100100','Count'=>999); // only edit here
$item[] = array('TemplateID'=>'100100','Count'=>999); // only edit here
$item[] = array('TemplateID'=>'100100','Count'=>3); // only edit here
$item[] = array('TemplateID'=>'3011','Count'=>1); // only edit here
$item[] = array('TemplateID'=>'3010','Count'=>1); // only edit here
$item[] = array('TemplateID'=>'6010','Count'=>1); // only edit here
$item[] = array('TemplateID'=>'6013','Count'=>1); // only edit here
$item[] = array('TemplateID'=>'11160','Count'=>999); // only edit here
$item[] = array('TemplateID'=>'11160','Count'=>999); // only edit here
$item[] = array('TemplateID'=>'11160','Count'=>2); // only edit here
$item[] = array('TemplateID'=>'11917','Count'=>300); // only edit here
$item[] = array('TemplateID'=>'11906','Count'=>10); // only edit here
$item[] = array('TemplateID'=>'35190101','Count'=>10); // only edit here
$item[] = array('TemplateID'=>'15079','Count'=>1); // only edit here
$item[] = array('TemplateID'=>'13510','Count'=>1); // only edit here


$check = q("Select ID from WebShop_Log Where UserId = '{$uid}' AND Type = 1"); // type 1 is info vip **
if(qn($check) == 0) {
	$time = date("Y-m-d H:i:s", time());
	q("INSERT INTO WebShop_Log Values ('".$_SESSION['UserId']."','{$time}','Item for Vip User','1')");
	foreach($item as $val) {
		q("INSERT INTO Webshop_Bag (UserID,TemplateID,Count,TimeAdd,IsGet) VALUES ('".$_SESSION['UserId']."','".$val['TemplateID']."','".$val['Count']."','".$time."','False')");
	}
	echo '<script type="text/javascript">alert("Você agora é um Usuario VIP, verifique o seu pacote de itens na MOCHILA VIRTUAL e envie para o jogo");</script>';
}
?>