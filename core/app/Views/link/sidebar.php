  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?=base_url()?>Dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#keuangan" data-bs-toggle="collapse"  href="#">
          <i class="bi bi-currency-dollar"></i><span>Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="keuangan" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?=base_url()?>KeuanganPenjualan">
              <i class="bi bi-circle"></i><span>Penjualan</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url()?>KeuanganPengeluaran">
              <i class="bi bi-circle"></i><span>Pengeluaran</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url()?>KeuanganModal">
              <i class="bi bi-circle"></i><span>Modal</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?=base_url()?>Barang">
          <i class="bi bi-box"></i>
          <span>Barang</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#master" data-bs-toggle="collapse" href="#">
          <i class="bi bi-archive"></i><span>Master</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="master" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?=base_url()?>MasterAkses">
              <i class="bi bi-circle"></i><span>Akses</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url()?>MasterTransaksi">
              <i class="bi bi-circle"></i><span>Transaksi</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url()?>MasterStatus">
              <i class="bi bi-circle"></i><span>Status</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url()?>MasterJenisBarang">
              <i class="bi bi-circle"></i><span>Jenis Barang</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?=base_url()?>User">
          <i class="bi bi-person-gear"></i>
          <span>User</span>
        </a>
      </li><!-- End Dashboard Nav -->
    </ul>

  </aside><!-- End Sidebar-->