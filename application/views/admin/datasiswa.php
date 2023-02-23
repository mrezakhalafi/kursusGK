
<div class="container">
  <div class="col-lg-12 mt-5" style="border: 1px solid #ccc;">
    <div class="row p-5">
      <div class="col-lg-12">
        <h2 class="txt-primary text-center">Data Siswa</h2>
        <hr class="garisbawah">
        <div class="row mt-5">
          <div class="col-lg-12">
            <table class="table table-striped w-100 siswa" border="3" bordercolor="white">
              <thead>
                <tr class="text-center">
                  <th>ID Siswa</th>
                  <th>Nama Siswa</th>
                  <th>Tanggal Pendaftaran</th>
                  <th>Kelas</th>
                  <th>Status</th>
                  <th>Rekap Nilai</th>
                  <th>Status Pembayaran</th>
                 
                  
                </tr>
              </thead>
              <tbody>
              <?php 
              $i = 1;
              foreach($siswa as $row): 
                $date = $row['created_at'];
                $date = date("d M yy", strtotime($date));?>
              
                <tr>
                 <td><?= $i ?></td>
                 <td><?=$row['nama']?></td>
                 <td><?=$date?></td>
                 <td><?=$row['nama_kelas']?></td>
                 <td>
                 <?php if($row['status']==0):?>
                 Tidak Aktif
                 <?php else: ?>
                 Aktif 
                 <?php endif; ?>
                 </td>
                 <td><a href="<?= base_url('admin/detailsiswa/'.$row['id']); ?>" class="text-danger">Selengkap-nya</a></td>
                 <td>
                 <?php if($row['status']==1): ?>
                 <div class="badge badge-success">Lunas</div></td>
                 <?php else: ?>
                   <div class="badge badge-warning">Belum Lunas</div></td>               
                 <?php endif; ?>
                </tr>
              <?php 
              $i++;
              endforeach; ?>

         

              </tbody>


            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


