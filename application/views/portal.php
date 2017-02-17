<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset=utf-8> 
	<meta content="IE=edge" http-equiv=X-UA-Compatible> 
	<meta content="width=device-width,initial-scale=1" name=viewport> 
	<link rel="stylesheet" type="text/css" href="<?=base_url('root/css/bootstrap.css')?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('root/css/style.css')?>">
	<title>Portal PDAM Pasuruan</title>
</head>
<body>
	<!-- -header- -->
	<div class="bg-head container-fluid">
		<div class="row cservice">
			<div class="col-xs-4 col-md-2 logo-container vertical-align">
				<img src="<?=base_url()?>gambar/gam1.png" class="img-responsive img-logo" alt="Image">
			</div>
			<div class="icon-service col-xs-8 col-md-10 ">
				<div class="phone-label">
					<h3>Customer Service</h3>
					<h3><span class="glyphicon glyphicon-phone"></span> (0343) 410 411</h3>
				</div>
			</div>
		</div>
	</div>
	<div class="bg-blue container-fluid">
		<div class="col-xs-12 col-md-12 portalseparator">&nbsp;</div>
		<div class="row">
			<div class="col-xs-4 col-md-2 col-md-offset-1 portalmenu text-center" data-link="<?=base_url()?>pasangbaru/create">
				<span class="glyphicon glyphicon-arrow-down"></span><br>
				<label>Pasang Baru</label>
			</div>
			<div class="col-xs-4 col-md-2 col-md-offset-2 portalmenu text-center" data-link="<?=base_url()?>pengaduan/create">
				<span class="glyphicon glyphicon-wrench"></span><br>
				<label for="">Pengaduan</label>
			</div>
			<div class="col-xs-4 col-md-2 col-md-offset-2 portalmenu text-center" data-link="<?=base_url()?>laporan">
				<span class="glyphicon glyphicon-list"></span><br>
				Laporan Saya
			</div>
		</div>
		<div class="col-xs-12 portalseparator">&nbsp;</div>
		<div class="row">
			<div class="col-xs-8 col-md-2 col-md-offset-1 portalmenu text-center">
				<span class="glyphicon glyphicon-globe"></span><br>
				<label for="">pdampasuruan.com</label>
			</div>
			<div class="col-xs-4 col-md-2 col-md-offset-6 portalmenu text-center" data-link="<?=base_url()?>welcome/logout">
				<span class="glyphicon glyphicon-log-out"></span>
				<br/>
				Log Out
			</div>
		</div>
	</div>
	<script type="text/javascript" src="<?=base_url('root/js/jquery-3.1.1.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('root/js/bootstrap.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('root/js/custom.js')?>"></script>
</body>
</html>