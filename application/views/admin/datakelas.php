
<div class="container">
  <div class="col-lg-12 mt-5" style="border: 1px solid #ccc;">
    <div class="row p-5">
      <div class="col-lg-12">
        <h2 class="txt-primary text-center">Data Kelas</h2>
        <hr class="garisbawah">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahKelas"><i class="fas fa-plus"></i> Tambah Kelas</button>
        <div class="row mt-5">
          <div class="col-lg-12">
            <table class="table table-striped w-100 kelas" border="3" bordercolor="white">
              <thead>
                <tr class="text-center">
                  <th>No</th>
                  <th>Nama Kelas</th>
                  <th>Tanggal Dibuat</th>
                  <th style="width: 15%">Jumlah Siswa</th>
               
                 
                </tr>
              </thead>
              <tbody>
                <?php foreach ($kelas as $i => $row) : 
                  $date = $row['created_at'];
                  $date = date("d M yy", strtotime($date));
                  ?>
                  <tr>
                    <td><?= $i+1 ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $date ?></td>
                    <td><?= $row['jumlah_siswa'] ?></td>
                  </tr>
                <?php endforeach; ?>
                
       
              </tbody>


            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?= base_url('admin/tambahkelas') ?>" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="nama_kelas">Nama Kelas</label>
            <input type="text" name="nama" class="form-control" id="nama_kelas">
            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
          </div>

          <div class="form-group">
            <label for="harga_kelas">Harga Kelas</label>
            <input type="text" name="harga" class="form-control" id="harga_kelas">
            <?= form_error('harga', '<small class="text-danger">', '</small>'); ?>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
      
    </div>
  </div>
</div>

<script>
<?php if($this->session->flashdata('message')=='Harap periksa kembali form!'): ?>
      alert("<?= $this->session->flashdata('message') ?>");
<?php endif; ?>
</script>