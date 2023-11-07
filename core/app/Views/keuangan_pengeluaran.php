  <?php
  require('link/header.php');
  ?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Manajemen Pengeluaran Dana</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url()?>Dashboard">Dashboard</a></li>
          <li class="breadcrumb-item active">Manajemen Pengeluaran Dana</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Pengeluaran Dana</h5>
              <p>Manajemen Pengeluaran Dana merupakan halaman untuk mengetahui berapa dana yang keluar berdasarkan baik keseluruhan, per bulan atau per hari</p>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jenis Transaksi</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no=0;
                  $jumlahTransaksi = 0;
                  foreach($dataPengeluaran as $d){
                  $no++;
                  ?>
                  <tr>
                    <th><?=$no;?></th>
                    <th><?=$d['tanggal'];?></th>
                    <th><?=$d['namaTransaksi'];?></th>
                    <th><?=$d['namaBarang'];?></th>
                    <th><?=$d['jumlah'];?></th>
                    <th><?=rupiah($d['nilaiTransaksiModal']);?></th>
                    <th><?=$d['keterangan'];?></th>
                  </tr>
                  <?php
                  $jumlahTransaksi = $jumlahTransaksi + $d['nilaiTransaksiModal'];
                  }
                  ?>
                </tbody>
              </table>
              <h3>Jumlah Transaksi : <?=rupiah($jumlahTransaksi);?></h3> 
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <?php
  require('link/footer.php');
  ?>
