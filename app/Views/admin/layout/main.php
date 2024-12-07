<?= $this->include('admin/layout/header'); ?>

<body>
  <div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar" data-background-color="dark">
      <?= $this->include('admin/layout/sidebar'); ?>
    </div>
    <!-- End Sidebar -->

    <div class="main-panel" style="max-height: 600px; overflow-y: auto;">
      <div class="main-header">
        <div class="main-header-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
              <img
                src="<?= base_url(); ?>template/assets/img/kaiadmin/"
                alt="navbar brand"
                class="navbar-brand"
                height="20" />
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->

        </div>
        <?= $this->include('admin/layout/navbar'); ?>
        <!-- Navbar Header -->
        <!-- End Navbar -->
      </div>

      <?= $this->renderSection('content') ?>
      <?= $this->include('admin/layout/footer'); ?>