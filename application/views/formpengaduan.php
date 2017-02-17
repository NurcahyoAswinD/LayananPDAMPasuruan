<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<h1 align="center">Pengaduan</h1>
		<div><?= validation_errors() ?></div>
		<form class="form-horizontal" action="<?= base_url('pengaduan/create')?>" method="post" enctype="multipart/form-data">

			<?php
			$id_user = set_value('id_user');
			$query2 = $this->db->query("SELECT `id_user` FROM `users` WHERE 'id_user=".$id_user."'");	
			echo $id_user;
			?>
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Tanggal Pengaduan</label>
				<div class="col-sm-10">
					<input type="date" class="form-control" name="tanggalpengaduan" placeholder="Masukan Tanggal" value="<?= date('Y-m-d') ?>" id="ex10">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Nama Lengkap</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="namalengkap" placeholder="Masukan Nama Lengkap" value="<?= $this->session->userdata('nama') ?>" id="ex10">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Alamat</label>
				<div class="col-sm-10">
					<textarea class="form-control" name="alamat" value="<?= set_value('alamat')?>" id="ex10" placeholder="Masukan Alamat"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label>Koordinat Map</label>
				<input type="hidden" id="latitude" name="latitude" required>
				<input type="hidden" id="longitude" name="longitude" required>
				<div class="panel-body" style="height:300px;" id="map-canvas">Click Me!</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Gambar</label>
				<div class="col-sm-10">
					<input type="file" class="form-control" name="userfile" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Jenis Kerusakan</label>
				<div class="col-md-10">
					<label>
						<input type="radio" name="kerusakan" value="berat" checked>
						Berat
					</label>
					<label>
						<input type="radio" name="kerusakan" value="sedang">
						Sedang
					</label>
					<label>
						<input type="radio" name="kerusakan" value="ringan">
						Ringan
					</label>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Keterangan</label>
				<div class="col-md-10">
					<textarea placeholder="Silahkan jelaskan kerusakannya" name="keterangan" required class="form-control"></textarea>
				</div>
			</div>
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-default">Simpan</button>
				<?php if ($this->session->userdata('group')==2): ?>
					<a href="<?=base_url()?>portaluser/" class="btn btn-md btn-warning">Kembali</a>
				<?php endif ?>
			</div>
		</div>
	</form>
</div>
</div>
