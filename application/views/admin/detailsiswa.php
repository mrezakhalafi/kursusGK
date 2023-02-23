
<div class="container">
  <div class="col-lg-12 mt-5" style="border: 1px solid #ccc;">
    <div class="row p-5">
      <div class="col-lg-12">
        <h2 class="txt-primary text-center">Data Siswa</h2>
        <hr class="garisbawah">
        <div class="row mt-5">
          <div class="col-lg-12">
            <div class="badge badge-secondary w-100" style="padding: 10px;">DATA PRIBADI</div>
              <div class="row">
                <div class="col-lg-6">
                  <pre>
                  Nama          : <?= $siswa['nama'] ?> 
                  Tempat Lahir  : <?= $siswa['tempat_lahir'] ?>    
                  Tanggal Lahir : <?= $siswa['tanggal_lahir'] ?> 
                  </pre>
                </div>
                <div class="col-lg-6">
                  <pre>
                  Alamat         : <?= $siswa['alamat'] ?> 
                  Jenis Kelamin  : <?= $siswa['jenis_kelamin'] ?> 
                  No Telepon     : <?= $siswa['no_telp'] ?> 
                  </pre>
                </div>
              </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="badge badge-secondary w-100" style="padding: 10px;">DATA AKADEMIK</div>
            <div class="row">
                <div class="col-lg-6">
                  <pre>
                  Kelas     : <?= $siswa['nama_kelas'] ?> 
                  <!-- Semester  : 1    -->
               
                  </pre>
                </div>
                <div class="col-lg-6">
                  <pre>
                  Asal Sekolah  : <?= $siswa['asal_sekolah'] ?> 
                  </pre>
                </div>
              </div>
          </div>
        </div>
        <div class="col-lg-12 text-center">
          <a href="<?= base_url('admin/datasiswa');?>"><button class="btn btn-primary">Kembali</button></a>
        </div>
      </div>
    </div>
  </div>
</div>