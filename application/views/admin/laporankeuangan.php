
<div class="container">
  <div class="col-lg-12 mt-5" style="border: 1px solid #ccc;">
    <div class="row p-5">
      <div class="col-lg-12">
        <h2 class="txt-primary text-center">Laporan Keuangan</h2>
        <hr class="garisbawah">
        <div class="row mt-5">
          <div class="col-lg-12">
            <table class="table table-striped w-100 keuangan" border="3" bordercolor="white">
              <thead>
                <tr class="text-center">
                  <th style="width: 5%">No</th>
                  <th style="width: 15%">Nama Siswa</th>
                  <th style="width: 20%">Pemabayaran Bimbel</th>
                  <th style="width: 20%">Jumlah yang dibayar</th>
                  <th style="width: 20%">Keterangan (Lunas/Belum)</th>
                  <th>Bukti Pembayaran</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($siswa as $i => $row) :
                ?>
                <tr>
                  <td><?= $i+1 ?></td>
                  <td><?= $row['nama'] ?></td>
                  <td>Rp. <?= $row['total_pembayaran'] ?></td>
                  <td>Rp. <?= $row['total_pembayaran'] ?></td>
                  <td>
                    <?php if($row['status']== '1')  : ?>
                    Lunas
                    <?php else: ?>
                    Belum Lunas
                    <?php endif; ?>
                  </td>
                  <td>
                    <?php if($row['pembayaran']== '')  : ?>
                    <button class="btn btn-secondary btn-sm" disabled>Belum Bayar</button>
                    <?php else: ?>
                      <?php if($row['status']== '1')  : ?>
                      <button class="btn btn-primary btn-sm" disabled>Sudah Lunas</button>
                      <?php else: ?>
                      <button class="btn btn-primary btn-sm btn-lihat" type="button" data-toggle="modal" data-target="#lihatPembayaran" data-id="<?= $row['id'] ?>" data-harga="<?= $row['total_pembayaran'] ?>" data-kelas="<?= $row['kelas_id'] ?>" data-nama="<?= $row['nama'] ?>" data-pembayaran="<?= $row['pembayaran'] ?>" >Lihat Pembayaran</button>
                      <?php endif; ?>
                    
                    <?php endif; ?>
                  
                  </td>
                </tr>
                <?php endforeach;
                ?>
              </tbody>


            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="lihatPembayaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?= base_url('admin/terimabayar')?>" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="namauser">Lihat Pembayaran (Nama User)</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div class="modal-body">
          <div class="form-group">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <h5 class="text-center">Jumlah yang Harus dibayar:</h5>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-lg-5">
                <div class="">
                  <input type="text" id="harga" class="form-control text-center" value="Rp. 2.000.000" readonly="" style="font-weight: 600; font-size: 20px;">
                  <input type="hidden" id="id-siswa" name="id">
                  <input type="hidden" id="id-kelas" name="kelas">
                </div>
              </div>
            </div>    
          </div>
          <div class="form-group">
            <div class="col-lg-12 text-center">
              <p>Bukti Pembayaran:</p>
              <img id="bukti" src="<?= base_url('assets/img/struk.jpg'); ?>" class="w-100">
            </div>
          </div>
        </div>
        
        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Terima Pembayaran</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>

$('.btn-lihat').click(function(){
  var id = $(this).data('id');
  var nama = $(this).data('nama');
  var harga = $(this).data('harga');
  var pembayaran = $(this).data('pembayaran');
  var kelas = $(this).data('kelas');

  $('#namauser').html('Lihat Pembayaran ('+nama+')');
  $('#harga').val('Rp. '+harga);
  $('#id-siswa').val(id);
  $('#id-kelas').val(kelas);
  $("#bukti").attr("src","<?= base_url('')?>"+pembayaran);

});

</script>