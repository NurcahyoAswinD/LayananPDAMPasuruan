<center>
	<h3> Data Pasangbaru 
		<a href="<?=base_url()?>pasangbaru/create" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-plus"></span></a>
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
			<div class="btn-group" data-toggle="buttons" data-job="pasangbaru">
				<label class="btn btn-md btn-default" data-value="proses"> Proses
					<input type="checkbox" data-trigger="filter" data-filter="status" autocomplete="off" value="proses">
				</label>
				<label class="btn btn-md btn-default" data-value="survey"> Survey
					<input type="checkbox" data-trigger="filter" data-filter="status" autocomplete="off" value="survey">
				</label>
				<label class="btn btn-md btn-default" data-value="accept"> Accept
					<input type="checkbox" data-trigger="filter" data-filter="status" autocomplete="off" value="accept">
				</label>
				<label class="btn btn-md btn-default" data-value="reject"> Reject
					<input type="checkbox" data-trigger="filter" data-filter="status" autocomplete="off" value="reject">
				</label>
			</div>
		</div>
	</div>
</div>
<?php if (empty($hasil)) {?>
<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>Tidak ada Data pasangbaru!!</strong>
</div>
<?php }else {?>
<div class="row">
	<div class="col-sm-12">
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<?php foreach ($hasil as $data):?>
				<div class="panel panel-pasangbaru panel-info" data-id="<?=$data->id_daftar?>" data-status="<?=$data->status?>">
					<div class="panel-heading" role="tab" id="heading<?=$data->id_daftar?>">
						<h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$data->id_daftar?>" aria-expanded="true" aria-controls="collapse<?=$data->id_daftar?>">
							<a role="button" >
								<?=$data->id_daftar?>
								<span class="label label-success"><?=ucfirst($data->status)?></span>
							</a>
						</h4>
					</div>
					<div id="collapse<?=$data->id_daftar?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$data->id_daftar?>">
						<div class="panel-body">
							<div class="caption">
								<h3 class="text-center"><?=$data->id_daftar?></h3>
								<p>Nama: <?=$data->namalengkap?></p>
								<p>Alamat: <?=$data->alamatrumah?></p>
								<p>Pekerjaan: <?=$data->pekerjaan?></p>
								<p>Penghuni Tetap: <?=$data->penghunitetap?></p>
								<p>Penghuni Tidak Tetap: <?=$data->penghunitidaktetap?></p>
								<p>Jenis Bangunan: <?=$data->jnsbangunan?></p>
								<p>Jumlah Kran: <?=$data->jmlkran?></p>
								<p>Jual Air: <?=$data->jualair?></p>
								<p>Alamat Penagihan: <?=$data->alamatpenagihan?></p>
								<p>Foto KK: 
									<a href="<?=base_url()?>uploads/attachment/<?=$data->fotoKK?>" class="btn btn-success btn-md" download>Download</a>
								</p>
								<p>Foto Ktp: 
									<a href="<?=base_url()?>uploads/attachment/<?=$data->fotoKtp?>" class="btn btn-success btn-md" download>Download</a>
								</p>
								<p>Map: 
									<span class="glyphicon glyphicon-map-marker showmap" data-map="map<?=$data->id_daftar?>"></span>
									<div id="map<?=$data->id_daftar?>" style="height:300px;display:none" data-lat="<?=$data->latitude?>" data-long="<?=$data->longitude?>"></div>
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
												$arr = ["proses","survey","accept","reject"];
												if($data->status != "proses"){
													$arr = array_diff($arr, array("proses"));
												}
												$arr = array_diff($arr, array($data->status));?>
												<?php foreach ($arr as $key => $value): ?>
													<li><a href="<?=base_url()?>pasangbaru/statusUpdate/<?=$data->id_daftar?>/<?=$value?>"><?=ucfirst($value)?></a></li>
												<?php endforeach ?>
											</ul>
										</div>
									<?php else: ?>
										<?=ucfirst($data->status)?> || By: <?=ucfirst($data->nama)?> (<?=$data->nip?>)
									<?php endif ?>
									<h4 class="text-right"><small>Tanggal Daftar: <?=$data->tanggaldaftar?></small></h4>
								</div>
							</div>
							<div class="panel-footer">
								<button type="button" class="btn btn-default" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$data->id_daftar?>" aria-expanded="true" aria-controls="collapse<?=$data->id_daftar?>">Tutup</button>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach;?>
		</div>
	</div>
</div>
<?php } ?>