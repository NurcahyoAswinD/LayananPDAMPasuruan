<h2 class="text-center">Pasang Baru</h2>
<div class="container-fluid">
  <form class="" action="<?= base_url('pasangbaru/create')?>" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-4 col-md-offset-2">
        <div class="form-group">
          <label for="tgldftr">Tanggal Daftar</label>
          <input type="date" class="form-control" id="tanggaldaftar" name="tanggaldaftar">
        </div>
        <div class="form-group">
          <label for="nmlgkp">Nama Lengkap</label>
          <input type="text" class="form-control" id="namalengkap" name="namalengkap">
        </div>
        <div class="form-group">
          <label for="almtrmh">Alamat Rumah</label>
          <input type="text" class="form-control" id="alamatrumah" name="alamatrumah">
        </div>
        <div class="form-group">
          <label for="pkjn">Pekerjaan</label>
          <input type="text" class="form-control" id="pekerjaan" name="pekerjaan">
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="pnghttp">Penghuni Tetap</label>
              <input type="number" class="form-control" id="penghunitetap" name="penghunitetap">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="pghtdkttp">Penghuni Tidak Tetap</label>
              <input type="number" class="form-control" id="penghunitidaktetap" name="penghunitidaktetap">
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="almtrmh">Jenis Bangunan</label>
          <div class="row">
            <div class="col-md-6"><input type="radio" name="jnsbangunan" value="perusahaan">Perusahaan</div>
            <div class="col-md-6"><input type="radio" name="jnsbangunan" value="kantor"> Kantor </div>  
            <div class="col-md-6"><input type="radio" name="jnsbangunan" value="tempat tinggal"> Tempat Tinggal</div>
            <div class="col-md-6"><input type="radio" name="jnsbangunan" value="asrama"> Asrama</div>
            <div class="col-md-6"><input type="radio" name="jnsbangunan" value="penginapan"> Penginapan</div>
            <div class="col-md-6"><input type="radio" name="jnsbangunan" value="hotel"> Hotel</div>
            <div class="col-md-6"><input type="radio" name="jnsbangunan" value="pabrik"> Pabrik</div>
            <div class="col-md-6"><input type="radio" name="jnsbangunan" value="rumah makan"> Rumah Makan</div>
            <div class="col-md-6"><input type="radio" name="jnsbangunan" value="rumah sakit"> Rumah Sakit</div>
            <div class="col-md-6"><input type="radio" name="jnsbangunan" value="poliklinik"> Poliklinik</div>
            <div class="col-md-6"><input type="radio" name="jnsbangunan" value="gereja"> Gereja</div>
            <div class="col-md-6"><input type="radio" name="jnsbangunan" value="masjid"> Masjid</div>
            <div class="col-md-6"><input type="radio" name="jnsbangunan" value="panti asuhan"> Panti Asuhan</div>
            <div class="col-md-6"><input type="radio" name="jnsbangunan" value="1" class="rad"/> DLL
              <div id="form1" style="display:none">
                <input name="jnsbangunandll" type="text" class="form-control" placeholder="Isi Jenis Bangunan">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="pghtdkttp">Jumlah Kran</label>
              <input type="number" class="form-control" id="jmlkran" name="jmlkran">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="pghtdkttp">Jual Air</label>
              <input type="text" class="form-control" id="jualair" name="jualair">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <label for="">Foto Ktp</label>
            <input type="file" name="fotoKtp" id="fotoKtp" class="form-control" required="required">
          </div>
          <div class="col-md-6">
            <label for="">Foto Kartu Keluarga</label>
            <input type="file" name="fotoKK" id="fotoKK" class="form-control" required="required">
          </div>
        </div>
        <div class="form-group">
          <label for="pghtdkttp">Alamat Penagihan</label>
          <textarea type="text" class="form-control" id="alamatpenagihan" required name="alamatpenagihan"></textarea>
        </div>
        <div class="form-group">
          <label>Koordinat Map</label>
          <input type="hidden" id="latitude" name="latitude" required>
          <input type="hidden" id="longitude" name="longitude" required>
          <div class="panel-body" style="height:300px;" id="map-canvas">Click Me!</div>
        </div>
        <button type="submit" class="btn btn-default" value="submit">Submit</button>
        <?php if ($this->session->userdata('group')==2): ?>
          <a href="<?=base_url()?>portaluser/" class="btn btn-md btn-warning">Kembali</a>
        <?php endif ?>
      </div>
    </form>
  </div>
</div>