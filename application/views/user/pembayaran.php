

<div class="container">
  <div class="col-lg-12 mt-5" style="border: 1px solid #ccc;">
    <div class="row p-5">
      <div class="col-lg-12">
        <h2 class="txt-primary text-center">Pembayaran</h2>
        <hr class="garisbawah">
        <div class="row mt-5">
          <div class="col-lg-12">
            <table class="table table-striped w-100" border="3" bordercolor="white">
              <thead>
                <tr class="text-center">
                  <th>No</th>
                  <th>Siswa</th>
                  <th>Pembayaran</th>
                  <th style="width: 15%">Bayar (RP)</th>
                  <th style="width: 15%">Tgl Posting</th>
                  <th style="width: 25%">Jumlah yang dibayar (RP)</th>
                  <th style="width: 25%">Keteragan (Penyetor)</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($pembayaran as $i => $row) : 
                  $tanggal = $row['created_at'];
                  $tanggal = date( "d M yy", strtotime($tanggal));
                  
                  ?>
                
                <tr>
                  <td><?= $i+1 ?></td>
                  <td><?= $row['nama'] ?></td>
                  <td><?= $row['kelas']['nama'] ?></td>
                  <td>Rp. <?= $row['total_pembayaran'] ?></td>
                  <td><?= $tanggal ?></td>
                  <td>Rp. <?= $row['total_pembayaran'] ?></td>
                  
                  <td class="text-center">
                  <?php if($row['pembayaran'] == ""): ?>
                    <button class="btn btn-sm btn-outline-primary btn-bayar" data-toggle="modal" data-target="#modalpembayaran" data-id="<?= $row['id'] ?>" data-total="<?= $row['total_pembayaran'] ?>" data-nama="<?= $row['nama'] ?>" data-kelas="<?= $row['kelas']['nama'] ?>" >Bayar</button>
                  <?php else: ?>
                    <button class="btn btn-sm btn-outline-secondary" disabled>
                      Lunas
                    </button>
                    
                  <?php endif; ?>
                    
                  </td>
                </tr>
                <?php endforeach ; ?>
              </tbody>


            </table>
          </div>
        </div>

        <!-- MODAL LOGIN -->
        <div class="modal fade" id="modalpembayaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
            <form action="<?= base_url('User/pembayaranproses') ?>" enctype="multipart/form-data" method="POST">
              <div class="modal-body">
                <h4 class="txt-primary text-center">Pembayaran</h4>
                <hr class="garisbawah">
                <div class="mt-2">
                  <div class="card">
                     <div class="card-header">
                      <p id="nama">Atas nama : </p>
                      <p id="kelas">Kelas : </p>
                    </div>
                    <div class="card-body">
                      <img src="<?= base_url('assets/img/bca.png'); ?>" style="width: 130px;">
                      <p>BCA</p>
                      <p>238904832 an/ PT.Ganesha</p>
                      <p>Segera Transfer Uang Sebesar <b id="harga-total"></b></p>
                    </div>
                  </div>
                  <div class="form-group mt-2">
                    <label for="upload_pembayaran">Upload Bukti Pembayaran :</label>
                    <input type="file" name="foto" class="form-control" placeholder="Upload Berkas" id="upload_pembayaran" required>
                    <?= form_error('foto', '<small class="text-danger">', '</small>'); ?>
                    <input type="hidden" name="id" id="siswa-id">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
            </div>
            </form>
          </div>
        </div>
        <!-- AKHIR MODAL LOGIN -->

        <div class="row">
          <div class="col-lg-12 text-center">
            <a href="<?= base_url('user/profilsaya') ?>"><button class="btn btn-primary">Kembali</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>



  $('.btn-bayar').click(function(){
    var kelas = $(this).data('kelas');
    var nama = $(this).data('nama');
    var harga = $(this).data('total');
    var id = $(this).data('id');
    $('#nama').html('Atas nama : '+ nama);
    $('#kelas').html('Kelas : '+ kelas);
    $('#harga-total').html('Rp. '+ harga);
    $('#siswa-id').val(id);
    console.log(kelas);
  });

</script>
