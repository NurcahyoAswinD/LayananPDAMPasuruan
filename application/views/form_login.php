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
	<?php
	(isset($this->session->userdata['logged_in'])) ?><?=validation_errors()?></div>
	
	<div class="container" align="center">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="well">
					<img src="<?=base_url()?>gambar/gam1.png" class="img-responsive img-thumbnail" alt="Image" style="height:110px">
					<h4 class="form-signin-heading"><span class="glyphicon glyphicon-th-large"></span> LOGIN </h4>
					<?php if ($error): ?>
						<div class="alert alert-warning">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong>Error!</strong> Username atau Password Salah ...
						</div>
					<?php endif ?>
					<form class="form-signin" action="<?=base_url()?>" form method="post" name="login" >
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input type="text" id="username" name="username" class="form-control" placeholder="Username"  autofocus="on" style="height:40px" required>
							</div>
							<div class="input-group" style="margin-top: 5px;">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								<input type="password" id="passwd" name="password" class="form-control" placeholder="Password" autocomplete="off" style="height:40px" requuired>
							</div>
						</div>

						<button class="btn btn-lg btn-success btn-block" type="submit">Login</button>&nbsp
						<div class=""><?php echo "Belum Punya Akun?   "; echo anchor("register","Register");?></div>
					</form>
				</div>
			</div>
		</div>
	</div>

</body>
</html>