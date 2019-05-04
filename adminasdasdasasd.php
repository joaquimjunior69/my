<?php
set_time_limit(0);
define('rewrewrwer','eqweqwe');
include('global.php');
$link = 'http://192.99.18.199/qest/tool/'; // link tool request
if(!isset($_SESSION['UserName']) || $_SESSION['UserName'] != ADMIN) die();
if(isset($_GET['type'])) {
	if($_GET['type'] == 'SendItemToAll') {
		co();
		$q = q("Select UserId From Webshop_Account");
		$time = date("Y-m-d H:i:s", time());
		while($info = qa($q)) {
			$query = "INSERT INTO Webshop_Bag (UserID,TemplateID,Count,TimeAdd,IsGet) VALUES ('".$info['UserId']."','".$_POST['Item']."','".$_POST['Count']."','".$time."','False')";
			q($query);
		}
		echo 'Send item success !!!';
		exit();
	} else include('AdminFunction.php');
}
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="UTF-8">
		<title>DDTankBrasil - Version 5.5 </title>
		<link rel="icon" type="image/png" href="http://i.imgur.com/pSwiz7O.png">
		<link rel="shortcut icon" href="favicon.ico" />
		<script type="text/javascript" src="./js/jquery-1.11.1.min.js"></script>
		<link rel="stylesheet" href="./css/bootstrap.min.css">
		<script src="./js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/toastr.css">
		<script src="./js/toastr.min.js"></script>
		<link href="./css/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="css/animate.css">
		<script src="js/wow.js"></script>
		<script type="text/javascript">
			new WOW().init();
			function ChangeContent() {
				type = $('#kou_typekick').val();
				$('#kou_contentdata').html(type);
				$('#kou_data_input').attr('placeholder','Enter '+type);
			}
			function ChangeAction() {
				if($('#evu_action').val() != 0) {
					$('#evu_ftvip').slideUp();
				}
				else {
					$('#evu_ftvip').slideDown();
				}
			}
			function SendRequest(data,type) {
				$.ajax({
					type: "POST",
					url : "admin.php?type="+type,
					data: data,
					success : function(data) {
						toastr.success(data, 'Notice');
					},
					error : function(){
						toastr.error('Can\'t send request, please contact developer.', 'Error !');
					}
				});
			}
			function SendNotice() {
				notice = $('#sn_message').val();
				SendRequest('notice='+notice,'SendNotice');
			}
			function KickOffUser() {
				Type = $('#kou_typekick').val();
				Data = $('#kou_data_input').val();
				Time = $('#kou_timeband').val();
				info = 'Type='+Type+'&Data='+Data+'&Time='+Time;
				SendRequest(info,'KickOffUser');
			}
			function EditVipUser() {
				User = $('#evu_user').val();
				Acti = $('#evu_action').val();
				Tvip = $('#evu_tvip').val();
				info = 'User='+User+'&Action='+Acti+'&Tvip='+Tvip;
				SendRequest(info,'EditVipUser');
			}
			function SendItemToVip() {
				Item = $('#sitv_templateID').val();
				Num  = $('#sitv_count').val();
				info = 'Item='+Item+'&Count='+Num;
				SendRequest(info,'SendItemToVip');
			}
			
			function SendItemToAll() {
				Item = $('#sita_templateID').val();
				Num  = $('#sita_count').val();
				info = 'Item='+Item+'&Count='+Num;
				SendRequest(info,'SendItemToAll');
			}
		</script>
		<style>@import url(http://fonts.googleapis.com/css?family=Ubuntu);
html{
  height: 100%;
}
body {
   min-height: 2000px;padding-top: 70px;
   font-family: 'Ubuntu', sans-serif;
   font-style:condensed;
   font-size: 14px;
  
   background-color: #2a2a2a;
   background-image: url("http://clashofclanshelper.com/index_files/bg_1.jpg");
   background-position: center center; 
   background-repeat: no-repeat, no-repeat, no-repeat;
   min-height: 100%;
}
</style>
	</head>
	<body>
		<div id="gwp-header">
			<nav class="wow zoomin navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="#"> Painel Tanksystem.net</a>
					</div>
				</div>
			</nav>
		</div>
		<div id="gwp-body">
			<div class="container">
				<div data-wow-delay="1s" id="boxmd8" class="wow bounceInDown col-md-12 form-shop">
					<center><h4 id="titlebox"><span class="glyphicon glyphicon-shopping-cart"></span> Painel admin</h4></center><hr>
					<div class="panel-group" id="accordion">
						<div class="panel panel-default">
						<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#SendNotice">
									Enviar noticia para o jogo
									</a>
								</h4>
							</div>
							<div id="SendNotice" class="panel-collapse collapse in">
								<div class="panel-body">
									<form role="form" action="" method="POST">
										<textarea name="sn_message" id="sn_message" class="form-control" rows="3"></textarea><br>
										<button type="button" onclick="SendNotice();" name="sendnotice" class="btn btn-primary">Enviar</button>
									</form>
								</div>
							</div> 
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#KickOffUser">
									Kickar ou banir usuario do jogo
									</a>
								</h4>
							</div>
							<div id="KickOffUser" class="panel-collapse collapse">
								<div class="panel-body">
									<form role="form" action="" method="POST">
										<div class="form-group">
											<label for="kou_typekick">Tipo</label>
											<select id="kou_typekick" name="kou_typekick" class="form-control" onchange="ChangeContent();">
												<option value="UserID">UserID</option>
												<option value="UserName">UserName</option>
												<option value="NickName">NickName</option>
											</select>
										</div>
										<div class="form-group">
											<label for="kou_data_input"><span id="kou_contentdata">UserID</span></label>
											<input type="text" name="kou_data_input" class="form-control" id="kou_data_input" placeholder="enter userid">
										</div>
										<div class="form-group">
											<label for="kou_timeband">Time band (day)</label>
											<input type="number" name="kou_timeband" class="form-control" id="kou_timeband" value="0">
										</div>
										<button type="button" onclick="KickOffUser();" name="kickoffuser" class="btn btn-default">Kick off user</button>
									</form>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#EditVipUser">
									Edit Vip User
									</a>
								</h4>
							</div>
							<div id="EditVipUser" class="panel-collapse collapse">
								<div class="panel-body">
									<form role="form" action="" method="POST">
										<div class="form-group">
											<label for="evu_user"><span id="contentdata">UserName</span></label>
											<input type="text" name="data_input" class="form-control" id="evu_user" placeholder="Enter username">
										</div>
										<div class="form-group">
											<label for="evu_action"><span id="contentdata">Action</span></label>
											<select id="evu_action" name="evu_action" class="form-control" onchange="ChangeAction();">
												<option value="0">Add Vip</option>
												<option value="1">Remove Vip</option>
											</select>
										</div>
										<div class="form-group" id="evu_ftvip">
											<label for="evu_tvip">Type Vip</label>
											<select id="evu_tvip" name="evu_tvip" class="form-control">
												<option value="30">Vip 1 (30 days)</option>
												<option value="60">Vip 2 (60 days)</option>
												<option value="90">Vip 3 (90 days)</option>
											</select>
										</div>
										<button type="button" onclick="EditVipUser();" name="editvipuser" class="btn btn-default">Enviar</button>
									</form>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#SendItemToVip">
									Enviar item para usuarios vip
									</a>
								</h4>
							</div>
							<div id="SendItemToVip" class="panel-collapse collapse">
								<div class="panel-body">
									<form role="form" action="" method="POST">
										<div class="form-group">
											<label for="sitv_templateID"><span id="contentdata">TemplateID</span></label>
											<input type="text" name="sitv_templateID" class="form-control" id="sitv_templateID" placeholder="Enter TemplateID">
										</div>
										<div class="form-group">
											<label for="sitv_count"><span id="contentdata">Count</span></label>
											<input type="number" name="sitv_count" class="form-control" id="sitv_count" value="0">
										</div>
										<button type="button" onclick="SendItemToVip();" name="senditemtovip" class="btn btn-default">Send Item</button>
									</form>
								</div>
							</div>
						</div>
						
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#SendItemToAll">
									Send Item To All
									</a>
								</h4>
							</div>
							<div id="SendItemToAll" class="panel-collapse collapse">
								<div class="panel-body">
									<form role="form" action="" method="POST">
										<div class="form-group">
											<label for="sita_templateID"><span id="contentdata">TemplateID</span></label>
											<input type="text" name="sita_templateID" class="form-control" id="sita_templateID" placeholder="Enter TemplateID">
										</div>
										<div class="form-group">
											<label for="sita_count"><span id="contentdata">Count</span></label>
											<input type="number" name="sita_count" class="form-control" id="sita_count" value="0">
										</div>
										<button type="button" onclick="SendItemToAll();" name="senditemtoall" class="btn btn-default">Send Item</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	<!--Code by bachugacon122 - bachugacon122@hotmail.com-->
</html>