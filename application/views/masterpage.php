<!DOCTYPE html>
<html>
<head>
	<title>PDAM Pasuruan</title>
	<meta charset=utf-8> 
	<meta content="IE=edge" http-equiv=X-UA-Compatible> 
	<meta content="width=device-width,initial-scale=1" name=viewport> 
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('root/css/bootstrap.css')?>">
</head>
<body>
	<!-- Start Header -->
	<?php
	if (!$this->session->userdata('group')) {
		redirect(base_url(),'refresh');
	}
	?>
	<?php if($this->session->userdata('group')==1):?>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">PDAM Pasuruan</a>
			</div>
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li><?php echo anchor('pasangbaru','Pasang Baru');?></li>
					<li><?php echo anchor('pengaduan','Pengaduan');?></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php if($this->session->userdata('username')) { ?>
					<li><a nohref><span class="glyphicon glyphicon-user"></span> <?=$this->session->userdata('username')?></a></li>
					<li><?php echo anchor('Welcome/logout', '<span class="glyphicon glyphicon-log-out"></span> Logout');?></li>
					<?php } else { ?>
					<li><?php echo anchor(base_url(), 'Login');?></li>
					<?php } ?>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
<?php endif; ?>
	<!-- --------------- -->

	<!-- Start content -->
	<div class="container-fluid">
		<?=$content?>
	</div>
	<!-- --------------- -->

	<!-- Start footer -->
	<hr>
	<div class="panel panel-default">
		<div class="panel-footer text-center">
			&copy; PDAM Pasuruan 2017 | <?=anchor('https://www.facebook.com/PDAM.KotaPasuruan/?fref=ts','Facebook');?> | <?=anchor('https://www.pdampasuruan.com/','Website');?>
		</div>
	</div>
	<script type="text/javascript" src="<?php echo base_url('root/js/jquery-3.1.1.min.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('root/js/bootstrap.min.js')?>"></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAX0ZpR_tQcK5469ibGcaguVIrm0RnD2Q"></script>
	<script type="text/javascript" src="<?php echo base_url('root/js/custom.js')?>"></script>
	<!-- --------------- -->
</body>
</html>