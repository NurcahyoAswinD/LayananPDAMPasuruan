<!DOCTYPE html>
<html>
<head>
	<title>PDAM Pasuruan</title>
	<meta charset=utf-8> 
	<meta content="IE=edge" http-equiv=X-UA-Compatible> 
	<meta content="width=device-width,initial-scale=1" name=viewport> 
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('root/css/bootstrap.css')?>">
	<style>
		body {
			padding-top: 60px;
		}
	</style>
</head>
<body>
	<div class="container" align="center">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="well">
					<img src="<?=base_url()?>gambar/gam1.png" class="img-responsive img-thumbnail" alt="Image" style="height: 100px">
					<h4 class="form-signin-heading"><span class="glyphicon glyphicon-th-large" style="color:black"></span> Register </h4>
					<?php if ($register): ?>
						<div class="alert alert-warning">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong>Error!</strong> Username sudah terdaftar ...
						</div>
					<?php endif ?>
					<form action="<?= base_url('index.php/register')?>" class="form-signin" form method="post" name="register" >
						<input type="hidden" name="users[privilege]" value="2">
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input type="text" id="nama" name="users[nama]" class="form-control" placeholder="Name" style="height:40px" required>
							</div>
							<div class="input-group" style="margin-top: 5px;">
								<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
								<input type="email" id="email" name="users[email]" class="form-control" placeholder="Email" autocomplete="off" style="height:40px" requuired>
							</div>
							<div class="input-group secret" style="margin-top: 5px; display: none;">
								<span class="input-group-addon"><span class="glyphicon glyphicon-registration-mark"></span></span>
								<input type="text" id="jabatan" name="pegawai[jabatan]" class="form-control" placeholder="Jabatan" autocomplete="off" style="height:40px" requuired>
							</div>
							<div class="input-group secret" style="margin-top: 5px; display: none;">
								<span class="input-group-addon"><span class="glyphicon glyphicon-tag"></span></span>
								<input type="text" id="nip" name="pegawai[nip]" class="form-control" placeholder="NIP" autocomplete="off" style="height:40px" requuired>
							</div>
							<div class="input-group" style="margin-top: 5px;">
								<span class="input-group-addon">@</span>
								<input type="text" id="username" name="users[username]" class="form-control" placeholder="Username" autocomplete="off" style="height:40px" requuired>
							</div>
							<div class="input-group" style="margin-top: 5px;">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								<input type="password" id="password" name="users[password]" class="form-control" placeholder="Password" autocomplete="off" style="height:40px" requuired>
							</div>
						</div>


						<input class="btn btn-lg btn-success btn-block" value="Daftar" type="submit">
						<div class="panel-footer"><?php echo "Sudah Punya Akun?   "; echo anchor(base_url(),"Login");?></div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="<?php echo base_url('root/js/jquery-3.1.1.min.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('root/js/bootstrap.min.js')?>"></script>
	<script type="text/javascript">
		$(".form-signin-heading").on("click",".glyphicon",function(){
			if($(this).css("color") == "rgb(0, 0, 0)"){
				$(this).css("color","gold");
				$("input[name=privilege]").val("1");
				$(".secret").show("slow");
				$("#jabatan").prop("disabled",false);
				$("#nip").prop("disabled",false);
			}else{
				$(this).css("color","black");
				$("input[name=privilege]").val("2");
				$(".secret").hide("slow");
				$("#jabatan").prop("disabled",true);
				$("#nip").prop("disabled",true);
			}
		});
	</script>
</body>
</html>