	<footer class="footer mt-5">
      <div class="container">
        <span class="">Copyright &copy; 2020 GANESHA KNOWLEDGE | OFFICIAL</span>
      </div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/script.js'); ?>"></script>

    <script>
    <?php if($this->session->flashdata('message')=='Harap periksa kembali form!'): ?>
      alert("<?= $this->session->flashdata('message') ?>");
      $('#modalDaftar').modal('show');
    <?php elseif($this->session->flashdata('message')=='Email tidak terdaftar!'): ?>
      alert("<?= $this->session->flashdata('message') ?>");
      $('#modalLogin').modal('show');
    <?php elseif($this->session->flashdata('message')=='Password Salah!'): ?>
      alert("<?= $this->session->flashdata('message') ?>");
      $('#modalLogin').modal('show');
    <?php elseif($this->session->flashdata('message')): ?>
      alert("<?= $this->session->flashdata('message') ?>");
    <?php endif; ?>
    </script>

  </body>
</html>

