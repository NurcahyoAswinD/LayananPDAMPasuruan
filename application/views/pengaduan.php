<center>
	<h3> Data Pengaduan 
		<a href="<?=base_url()?>pengaduan/create" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-plus"></span></a>
	</h3>
</center>
<div class="row">
	<div class="col-sm-12">
		<div class="form-group">
			<label>Filter by ID :</label>
			<input type="text" class="form-control" id="idsearch">
		</div>
		<div class="form-group">
			<label>Status : </label>
			<div class="btn-group" data-toggle="buttons" data-job="pengaduan">
				<label class="btn btn-md btn-default" data-value="proses"> Proses
					<input type="checkbox" data-trigger="filter" data-filter="status" autocomplete="off" value="proses">
				</label>
				<label class="btn btn-md btn-default" data-value="survey"> Survey
					<input type="checkbox" data-trigger="filter" data-filter="status" autocomplete="off" value="survey">
				</label>
				<label class="btn btn-md btn-default" data-value="accept"> Accept
					<input type="checkbox" data-trigger="filter" data-filter="status" autocomplete="off" value="accept">
				</label>
			</div>
		</div>
		<div class="form-group">
			<label>Kerusakan : </label>
			<div class="btn-group" data-toggle="buttons" data-job="pengaduan">
				<label class="btn btn-md btn-info" data-value="ringan"> Ringan
					<input type="checkbox" data-trigger="filter" data-filter="kerusakan" autocomplete="off" value="ringan">
				</label>
				<label class="btn btn-md btn-warning" data-value="sedang"> Sedang
					<input type="checkbox" data-trigger="filter" data-filter="kerusakan" autocomplete="off" value="sedang">
				</label>
				<label class="btn btn-md btn-danger" data-value="berat"> Berat
					<input type="checkbox" data-trigger="filter" data-filter="kerusakan" autocomplete="off" value="berat">
				</label>
			</div>
		</div>
	</div>
</div>
<?php if (empty($hasil)) {?>
<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>Tidak ada Data Pengaduan!!</strong>
</div>
<?php }else {?>
<div class="row">
	<div class="col-sm-12">
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<?php foreach ($hasil as $data):?>
				<?php
				if($data->kerusakan=="berat"){
					$cl="danger";
				}else if($data->kerusakan=="sedang"){
					$cl="warning";
				}else{
					$cl="info";
				}
				?>

				<div class="panel panel-pengaduan panel-<?=$cl?>" data-id="<?=$data->id_pengaduan?>" data-kerusakan="<?=$data->kerusakan?>" data-status="<?=$data->status?>">
					<div class="panel-heading" role="tab" id="heading<?=$data->id_pengaduan?>">
						<h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$data->id_pengaduan?>" aria-expanded="true" aria-controls="collapse<?=$data->id_pengaduan?>">
							<a role="button" >
								<?=$data->id_pengaduan?>
								<span class="label label-success"><?=ucfirst($data->status)?></span>
							</a>
						</h4>
					</div>
					<div id="collapse<?=$data->id_pengaduan?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$data->id_pengaduan?>">
						<div class="panel-body">
							<div class="thumbnail">
								<img src="<?=base_url()?>uploads/<?=$data->pic?>" alt="" class="img-rounded img-responsive" width="200" height="300">
							</div>
							<div class="caption">
								<h3 class="text-center" style="border-bottom:<?=$cl?> solid 1px;"><?=$data->id_pengaduan?> <small>(Kerusakan : <?=$data->kerusakan?>)</small></h3>
								<div class="well">
									<?=$data->keterangan?>
								</div>
								<p>Nama: <?=$data->namalengkap?></p>
								<p>Alamat: <?=$data->alamat?></p>
								<p>Map: 
									<span class="glyphicon glyphicon-map-marker showmap" data-map="map<?=$data->id_pengaduan?>"></span>
									<div id="map<?=$data->id_pengaduan?>" style="height:300px;display:none" data-lat="<?=$data->latitude?>" data-long="<?=$data->longitude?>"></div>
								</p>
								<div class="form-group">
									<label for="">Status</label>: 
									<?php if (($this->session->userdata('nip')==$data->nip || $data->nip == null) && ($data->status == "proses" || $data->status == "survey")): ?>
										<div class="btn-group">
											<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<?=ucfirst($data->status)?> <span class="caret"></span>
											</button>
											<ul class="dropdown-menu">
												<?php
												$arr = ["proses","survey","accept"];
												if($data->status != "proses"){
													$arr = array_diff($arr, array("proses"));
												}
												$arr = array_diff($arr, array($data->status));?>
												<?php foreach ($arr as $key => $value): ?>
													<li><a href="<?=base_url()?>pengaduan/statusUpdate/<?=$data->id_pengaduan?>/<?=$value?>"><?=ucfirst($value)?></a></li>
												<?php endforeach ?>
											</ul>
										</div>
									<?php else: ?>
										<?=ucfirst($data->status)?> || By: <?=ucfirst($data->nama)?> (<?=$data->nip?>)
									<?php endif ?>
									<h4 class="text-right"><small>Tanggal Pengaduan: <?=$data->tanggalpengaduan?></small></h4>
								</div>
							</div>
							<div class="panel-footer">
								<button type="button" class="btn btn-default" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$data->id_pengaduan?>" aria-expanded="true" aria-controls="collapse<?=$data->id_pengaduan?>">Tutup</button>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach;?>
		</div>
	</div>
</div>
<?php } ?>