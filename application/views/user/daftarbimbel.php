<div class="container">
  <div class="col-lg-12 mt-5" style="border: 1px solid #ccc;">
    <div class="row p-5">
      <div class="col-lg-12">
        <h2 class="txt-primary text-center">Daftar Bimbel</h2>
        <hr class="garisbawah">
        <div class="row mt-5">
          <div class="col-lg-12">
            <div class="progress" style="height: 40px;">
              <div class="progress-bar bg-success" role="progressbar" style="width: 50%;" id="progressBar">
                <b class="lead" id="progressText">Step 1</b>
              </div>
            </div>
          </div>
        </div>
        <form action="<?= base_url('user/daftarbimbelproses') ?>" enctype="multipart/form-data" method="post">
          <div id="first">
            <!-- AWAL FIRST -->
            <div class="row mt-5">
              <div class="col-lg-12 mb-4 text-center">
                <h2>Isi Fomulir</h2>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>" required>
                  <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="form-group">
                  <input type="text" name="alamat" class="form-control" placeholder="Alamat Tinggal" value="<?= set_value('alamat'); ?>" required>
                  <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="form-group">
                  <input type="text" name="tempatlahir" class="form-control" placeholder="Tempat Lahir" value="<?= set_value('tempatlahir'); ?>" required>
                  <?= form_error('tempatlahir', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="form-group">
                  <input type="date" name="tanggallahir" class="form-control" placeholder="Tanggal Lahir" value="<?= set_value('tanggallahir'); ?>" required>
                  <?= form_error('tanggallahir', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" id="customRadio1" name="jk" class="custom-control-input" value="Laki - Laki" selected>
                  <label class="custom-control-label" for="customRadio1">Laki - Laki</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" id="customRadio2" name="jk"  value="Perempuan" class="custom-control-input">
                  <label class="custom-control-label" for="customRadio2">Perempuan</label>
                </div>
                <?= form_error('jk', '<small class="text-danger">', '</small>'); ?>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <input type="text" name="telepon" class="form-control" placeholder="No Telepon" value="<?= set_value('telepon'); ?>" required>
                  <?= form_error('telepon', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="form-group">
                  <input type="text" name="namaortu" class="form-control" placeholder="Nama Orang Tua" value="<?= set_value('namaortu'); ?>" required>
                  <?= form_error('namaortu', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="form-group">
                  <input type="text" name="asalsekolah" class="form-control" placeholder="Asal Sekolah" value="<?= set_value('asalsekolah'); ?>">
                  <?= form_error('asalsekolah', '<small class="text-danger">', '</small>'); ?>
                </div>

                <select id="kelas" class="custom-select my-select" name="kelas">
                  <option value="" selected>Pilih Kelas</option>
                  <?php foreach ($kelas as $i => $row) : ?>
                    <?php if ($row['id'] == set_value('kelas')) : ?>
                      <option value="<?= $row['id'] ?>" data-harga="<?= $row['harga'] ?>" selected><?= $row['nama'] ?></option>
                    <?php else : ?>
                      <option value="<?= $row['id'] ?>" data-harga="<?= $row['harga'] ?>"><?= $row['nama'] ?></option>
                    <?php endif; ?>

                  <?php endforeach; ?>
                </select>
                <?= form_error('kelas', '<small class="text-danger">', '</small>'); ?>
              </div>
            </div> <!-- AKHIR FIRST -->
            <div class="col-lg-12 text-center">
              <button class="btn btn-primary" id="next-1" type="button">Lanjut</button>
            </div>
          </div>

          <div id="second">
            <!-- AWAL SECOND -->
            <div class="row mt-5">
              <div class="col-lg-12 mb-4 text-center">
                <h2>Upload Berkas & Pembayaran</h2>
              </div>
              <div class="col-lg-12">
                <!-- <div class="form-group">
                  <label for="upload_berkas">Upload Berkas :</label>
                  <input type="file" name="" class="form-control" placeholder="Upload Berkas" id="upload_berkas">
                </div> -->

                <label>Pembayaran:</label><br>
                <button class="btn btn-outline-primary" type="button" id="btnBayar">Bayar Sekarang!</button>
                <button class="btn btn-outline-primary" type="button" id="btnNanti">Bayar Nanti</button>
                <div id="pay" class="mt-2">
                  <div class="card">
                    <div class="card-body">
                      <img src="<?= base_url('assets/img/bca.png'); ?>" style="width: 130px;">
                      <p>BCA</p>
                      <p>238904832 an/ PT.Ganesha</p>
                      <p>Segera Transfer Uang Sebesar <b id="harga-total"></b></p>
                    </div>
                  </div>
                  <div class="form-group mt-2">
                    <label for="upload_pembayaran">Upload Bukti Pembayaran :</label>
                    <input type="file" name="foto" class="form-control" placeholder="Upload Berkas" id="upload_pembayaran">
                  </div>
                </div>

                <div class="col-lg-12 text-center">
                  <button class="btn btn-danger" id="prev-2" type="button">Kembali</button>
                  <button class="btn btn-primary" id="submit" type="submit">Submit</button>
                </div>
              </div>
            </div>
          </div> <!-- AKHIR SECOND -->


        </form>


        <div class="row">

        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $("#pay").show();
  $('#kelas').on('change', function() {
    var harga = $('#kelas option:selected').data('harga');
    $('#harga-total').html('Rp. ' + harga);
    console.log(harga);
  });
</script>