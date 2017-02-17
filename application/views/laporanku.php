<h3>Laporan</h3>
<?php if (empty($hasil)) {?>
<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>Anda tidak memiliki laporan.</strong>
</div>
<?php } else { ?>
 <div>
 	
 </div>
<div class="row">
	<div class="col-sm-12">
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			
			<?php 
			foreach ($hasil as $data):
			?>		
				<div class="panel panel-pengaduan panel-info" data-id="<?=$data->id?>">
					<div class="panel-heading" role="tab" id="heading<?=$data->id?>">
						<h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$data->id?>" aria-expanded="true" aria-controls="collapse<?=$data->id?>">
							<a role="button" >
								<?=ucfirst($data->tipe)?> : <?=$data->id?>
								<span class="label label-success"><?=ucfirst($data->status)?></span>
							</a>
						</h4>
					</div>
					<div id="collapse<?=$data->id?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$data->id?>">
						<div class="panel-body">

							<div class="caption">
								<h3 class="text-center" ><?=$data->id?></h3>
								<p>Map: 
									<span class="glyphicon glyphicon-map-marker showmap" data-map="map<?=$data->id?>"></span>
									<div id="map<?=$data->id?>" style="height:300px;display:none" data-lat="<?=$data->latitude?>" data-long="<?=$data->longitude?>"></div>
								</p>
								<div class="form-group">
									<label for="">Status</label>:
									<?=$data->status?>
									<h4 class="text-right"><small>Tanggal Submit: <?=$data->tanggal?></small></h4>
								</div>
							</div>
							<div class="panel-footer">
								<button type="button" class="btn btn-default" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$data->id?>" aria-expanded="true" aria-controls="collapse<?=$data->id?>">Tutup</button>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<?php } ?>
<a href="<?=base_url()?>portaluser" class="btn btn-warning btn-md">Kembali</a>