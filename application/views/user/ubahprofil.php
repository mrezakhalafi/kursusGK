

<div class="container">
  <div class="col-lg-12 mt-5" style="border: 1px solid #ccc;">
    <div class="row p-5">
      <div class="col-lg-12">
        <h2 class="txt-primary text-center">Ubah Profil</h2>
        <hr class="garisbawah">
        <form action="<?= base_url('user/ubahprofilproses') ?> " method="post">
          <div class="row mt-5">
          
            <div class="col-lg-6">
              <div class="form-group">
                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= $user['nama'] ?>">
                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
              </div>

              <div class="form-group">
                <input type="text" name="alamat" class="form-control" placeholder="Alamat Lengkap" value="<?= $user['alamat'] ?>">
                <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
              </div>

              <div class="form-group">
                <input type="text" name="tempatlahir" class="form-control" placeholder="Tempat Lahir" value="<?= $user['tempat_lahir'] ?>">
                <?= form_error('tempatlahir', '<small class="text-danger">', '</small>'); ?>
              </div>

              <div class="form-group">
                <input type="date" name="tanggallahir" class="form-control" placeholder="Tanggal Lahir" value="<?= $user['tanggal_lahir'] ?>">
                <?= form_error('tanggallahir', '<small class="text-danger">', '</small>'); ?>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <input type="text" name="telepon" class="form-control" placeholder="No Telepon" value="<?= $user['no_telp'] ?>">
                <?= form_error('telepon', '<small class="text-danger">', '</small>'); ?>
              </div>

              <div class="form-group">
                <input type="text" name="namaortu" class="form-control" placeholder="Nama Orang Tua" value="<?= $user['nama_ortu'] ?>">
                <?= form_error('namaortu', '<small class="text-danger">', '</small>'); ?>
              </div>

              <div class="form-group">
                <input type="text" name="asalsekolah" class="form-control" placeholder="Asal Sekolah" value="<?= $user['asal_sekolah'] ?>">
                <?= form_error('asalsekolah', '<small class="text-danger">', '</small>'); ?>
              </div>

              <p>Jenis Kelamin</p>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio1" name="jk" class="custom-control-input" value="Laki - Laki" 
                <?php if($user['jenis_kelamin']=='Laki - Laki'): ?>
                checked
                <?php endif; ?>
                >
                <label class="custom-control-label" for="customRadio1">Laki - Laki</label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio2" name="jk"  value="Perempuan" class="custom-control-input"
                <?php if($user['jenis_kelamin']=='Perempuan'): ?>
                checked
                <?php endif; ?>
                >
                <label class="custom-control-label" for="customRadio2">Perempuan</label>
              </div>
              <?= form_error('jk', '<small class="text-danger">', '</small>'); ?>
            </div>
          </div>
        
        

          <div class="row">
            <div class="col-lg-12 text-center">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

