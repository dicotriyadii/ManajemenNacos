  <?php
  require('link/header.php');
  ?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Manajemen Penjualan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url()?>Dashboard">Dashboard</a></li>
          <li class="breadcrumb-item active">Manajemen Penjualan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Penjualan</h5>
              <p>Manajemen Penjualan merupakan halaman untuk mengetahui berapa penjualan berdasarkan baik keseluruhan, per bulan atau per hari</p>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jenis Transaksi</th>
                    <th scope="col">Barang</th>
                    <th scope="col">Harga Jual</th>
                    <th scope="col">Harga Modal</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Status</th>
                    <th scope="col">Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no=0;
                  $jumlahTransaksi  = 0;
                  $jumlahModal      = 0;
                  $jumlahKeuntungan = 0;
                  foreach($dataPenjualan as $d){
                  $no++;
                  ?>
                  <tr>
                    <th><?=$no;?></th>
                    <th><?=$d['tanggal'];?></th>
                    <th><?=$d['namaTransaksi'];?></th>
                    <th><?=$d['namaBarang'];?></th>
                    <th><?=rupiah($d['nilaiTransaksiJual']);?></th>
                    <th><?=rupiah($d['nilaiTransaksiModal']);?></th>
                    <th><?=$d['jumlah'];?></th>
                    <th>
                      <?php
                      if($d['idStatus'] == 2){?>
                        <p style="color:green;"><a href="<?=base_url()?>UpdateStatus/<?=$d['idKeuangan']?>/3"><i class="bi bi-x-circle-fill" style="font-size:20px;color: red"></i><?=$d['namaStatus'];?></p>
                      <?php
                      }else{?>
                        <p style="color:red;"><a href="<?=base_url()?>UpdateStatus/<?=$d['idKeuangan']?>/2"><i class="bi bi-check-circle-fill" style="font-size:20px;color: green"></i></a> <?=$d['namaStatus'];?></p>
                      <?php
                      }
                      ?>
                    </th>
                    <th><?=$d['keterangan'];?></th>
                  </tr> 
                  <?php
                  $jumlahTransaksi  = $jumlahTransaksi + $d['nilaiTransaksiJual'];
                  $jumlahModal      = $jumlahModal + $d['nilaiTransaksiModal'];
                  $jumlahKeuntungan = $jumlahTransaksi - $jumlahModal;
                  }
                  ?>
                </tbody>
              </table>
              <h3>Total Transaksi : <?=rupiah($jumlahTransaksi);?></h3> 
              <h3>Modal : <?=rupiah($jumlahModal);?></h3>  
              <h3>Keuntungan : <?=rupiah($jumlahKeuntungan);?></h3>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <?php
  require('link/footer.php');
  ?>
