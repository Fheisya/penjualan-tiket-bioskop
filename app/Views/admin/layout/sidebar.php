<div class="sidebar-logo">
  <!-- Logo Header -->
  <div class="logo-header" data-background-color="dark">
    <a href="index.html" class="logo">
      <img
        src="<?= base_url(); ?>template/assets/img/kaiadmin/logo_light.png"
        alt="navbar brand"
        class="navbar-brand"
        height="70" />
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
<div class="sidebar-wrapper scrollbar scrollbar-inner">
  <div class="sidebar-content">
    <ul class="nav nav-secondary">
      <li class="nav-item <?= ($active == 'home') ? 'active' : '' ?>">
        <a href="/">
          <i class="fas fa-tachometer-alt"></i>
          <p>Dashboard</p>
        </a>
      </li>

      <li class="nav-section">
        <span class="sidebar-mini-icon">
          <i class="fa fa-ellipsis-h"></i>
        </span>
        <h4 class="text-section">Components</h4>
      </li>

      <li class="nav-item <?= ($active == 'film') ? 'active' : '' ?>">
        <a href="/admin/film">
          <i class="fas fa-film"></i>
          <p>Film</p>
        </a>
      </li>

      <li class="nav-item <?= ($active == 'bioskop') ? 'active' : '' ?>">
        <a href="/admin/bioskop">
          <i class="fas fa-theater-masks"></i>
          <p>Bioskop</p>
        </a>
      </li>

      <li class="nav-item <?= ($active == 'studio') ? 'active' : '' ?>">
        <a href="/admin/studio">
          <i class="fas fa-video"></i>
          <p>Studio</p>
        </a>
      </li>

      <li class="nav-item <?= ($active == 'jadwal') ? 'active' : '' ?>">
        <a href="/admin/jadwal">
          <i class="fas fa-calendar-alt"></i>
          <p>Jadwal</p>
        </a>
      </li>

      <li class="nav-item <?= ($active == 'pengguna') ? 'active' : '' ?>">
        <a href="/admin/pengguna">
          <i class="fas fa-users"></i>
          <p>Pengguna</p>
        </a>
      </li>

      <li class="nav-item <?= ($active == 'pemesanan') ? 'active' : '' ?>">
        <a href="/admin/pemesanan">
          <i class="fas fa-calendar-check"></i>
          <p>Pemesanan</p>
        </a>
      </li>

      <li class="nav-item <?= ($active == 'tiket') ? 'active' : '' ?>">
        <a href="/admin/tiket">
          <i class="fas fa-ticket-alt"></i>
          <p>Tiket</p>
        </a>
      </li>

      <li class="nav-item <?= ($active == 'pembayaran') ? 'active' : '' ?>">
        <a href="/admin/pembayaran">
          <i class="fas fa-money-check-alt"></i>
          <p>Pembayaran</p>
        </a>
      </li>
    </ul>
  </div>
</div>