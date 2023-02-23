

<div class="container">
  <div class="col-lg-12 mt-5" style="border: 1px solid #ccc;">
    <div class="row p-5">
      <div class="col-lg-4">
        <img src="<?= base_url('assets/img/avatar.png'); ?>">
      </div>
      <div class="col-lg-8">
        <h5><?= $this->session->userdata('nama') ?></h5>
        <br>
        <p class="txt-primary"><?= $this->session->userdata('email') ?></p>
        <br>
        <p class="m-0">Jadi anggota sejak:</p>
        <?php 
        $timeStamp = $this->session->userdata('bergabung');
        $timeStamp = date( "d M yy", strtotime($timeStamp)); 
        
        ?>
        <p><?= $timeStamp ?></p>
        <div class="row">
          <div class="col-lg-12">
            <a href="<?= base_url('user/ubahprofil'); ?>"><button class="btn btn-primary">Ubah Profil</button></a>
            <a href="<?= base_url('user/pembayaran'); ?>"><button class="btn btn-primary ml-3">Pembayaran</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

