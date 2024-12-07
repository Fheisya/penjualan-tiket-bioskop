<footer class="footer">
  <div class="container-fluid d-flex justify-content-between">
    <nav class="pull-left">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="http://www.themekita.com">
            ThemeKita
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"> Help </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"> Licenses </a>
        </li>
      </ul>
    </nav>
    <div class="copyright">
      2024, made with <i class="fa fa-heart heart text-danger"></i> by
      <a href="http://www.themekita.com">ThemeKita</a>
    </div>
    <div>
      Distributed by
      <a target="_blank" href="https://themewagon.com/">ThemeWagon</a>.
    </div>
  </div>
</footer>
</div>

<!-- Custom template | don't include it in your project! -->

<!-- End Custom template -->
</div>
<!--   Core JS Files   -->
<script src="<?= base_url(); ?>template/assets/js/core/jquery-3.7.1.min.js"></script>
<script src="<?= base_url(); ?>template/assets/js/core/popper.min.js"></script>
<script src="<?= base_url(); ?>template/assets/js/core/bootstrap.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="<?= base_url(); ?>template/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<!-- Chart JS -->
<script src="<?= base_url(); ?>template/assets/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="<?= base_url(); ?>template/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="<?= base_url(); ?>template/assets/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="<?= base_url(); ?>template/assets/js/plugin/datatables/datatables.min.js"></script>


<!-- jQuery Vector Maps -->
<script src="<?= base_url(); ?>template/assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
<script src="<?= base_url(); ?>template/assets/js/plugin/jsvectormap/world.js"></script>

<!-- Sweet Alert -->
<script src="<?= base_url(); ?>template/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

<script>
  <?php if (session()->getFlashdata('success')): ?>
    Swal.fire({
      icon: 'success',
      title: 'Berhasil!',
      text: '<?= session()->getFlashdata('success'); ?>',
      showConfirmButton: true
    });
  <?php endif; ?>

  <?php if (session()->getFlashdata('errors')): ?>
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: '<?= implode(", ", session()->getFlashdata('errors')); ?>',
      showConfirmButton: true
    });
  <?php endif; ?>
</script>



</body>

</html>