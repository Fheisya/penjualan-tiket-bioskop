<?= $this->include('layout/header'); ?>
    <div class="wrapper">
      <!-- Sidebar -->
      <?= $this->include('layout/sidebar'); ?>
      <!-- End Sidebar -->

      <div class="main-panel">
      <?= $this->include('layout/navbar'); ?>

        <div class="container">
        <?= $this->renderSection('content'); ?>
        </div>

        <?= $this->include('layout/footer'); ?>