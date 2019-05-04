<?php
include('global.php');
$incl = '';
if(isset($_GET['page'])) {
	$page = $_GET['page'];
} else $page = '';
switch ($page)
{
	case 'bagweb':
		$incl = 'bagweb.php';
		break;
		case 'recoveritem':
		$incl = 'recoveritem.php';
		break;
		case 'notification':
		$incl = 'notification.php';
		break;
		case 'sendNotification':
		$incl='sendNotification.php';
		break;
		case 'kickar':
		$incl='kickar.php';
		break;
		case 'generatepass':
		$incl = 'generatepass.php';
		break;
		case 'removepass':
		$incl = 'deletepass.php';
		break;
		case 'topFc':
		$incl = 'topFc.php';
		break;
	case 'changepass':
		$incl = 'changepass.php';
		break;
	case 'changemail':
		$incl = 'changemail.php';
		break;
	case 'slserver':
		$incl = 'selectserver.php';
		break;
	case 'topup':
		$incl = 'topup.php';
		break;
	case 'noticias':
		$incl = 'noticias.php';
		break;
	case 'pet':
		$incl = 'deletepet.php';
		break;
		case 'cupon':
		$incl = 'cupon.php';
		break;
		case 'clearmail':
		$incl = 'clearmail.php';
		break;
		case 'recover':
		$incl = 'recover.php';
		break;
		case 'clearBag':
		$incl = 'clearBag.php';
		break;
	case 'cnick':
		$incl = 'changenickname.php';
		break;
	case 'getpass':
		$incl = 'getnewpass.php';
		break;
	case 'topevent':
		$incl = 'eventtop.php';
		break;
		case 'enviaritens':
		$incl = 'http://ww1.gamesnexus.com.br:8092/Default.aspx';
		break;
	default:
		break;
}
if($incl != '' && $incl!='http://ww1.gamesnexus.com.br:8092/Default.aspx/') include('module/'.$incl);
?>