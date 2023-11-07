  <?php
  require('link/header.php');
  ?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Manajemen Modal Dana</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url()?>Dashboard">Dashboard</a></li>
          <li class="breadcrumb-item active">Manajemen Modal Dana</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Modal Dana</h5>
              <p>Manajemen Modal Dana merupakan halaman untuk mengetahui berapa modal berdasarkan baik keseluruhan, per bulan atau per hari</p>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahAkses">Tambah Modal</button>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jenis Transaksi</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no=0;
                  $jumlahTransaksi = 0;
                  foreach($dataModal as $d){
                  $no++;
                  ?>
                  <tr>
                    <th><?=$no;?></th>
                    <th><?=$d['tanggal'];?></th>
                    <th><?=$d['namaTransaksi'];?></th>
                    <th><?=rupiah($d['nominalModal']);?></th>
                    <th><?=$d['keterangan'];?></th>
                    <td>
                      <a data-bs-toggle="modal" data-bs-target="#editKeuangan<?=$d['idKeuangan']?>"><i class="bi bi-pencil" style="font-size:25px;color: gray"></i></a>
                      <a href="#" data-bs-toggle="modal" data-bs-target="#hapus<?=$d['idKeuangan']?>"><i class="bi bi-file-earmark-x" style="font-size:30px;color: red"></i></a>
                    </td>
                  </tr>
                  <!-- Modal Edit Akses -->
                  <div class="modal fade" id="editKeuangan<?=$d['idKeuangan']?>" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Edit Akses</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                          <form method="POST" action="<?=base_url()?>EditKeuangan" enctype="multipart/form-data">  
                            <div class="modal-body">
                              <input type="text" name="idKeuangan" class="form-control" id="floatingInput" value="<?=$d['idKeuangan']?>" hidden>
                              <div class="form-floating mb-3">
                                <input type="date" name="tanggal" class="form-control" id="floatingInput" value="<?=$d['tanggal']?>">
                                <label for="floatingInput">Tanggal</label>
                              </div>
                              <div class="form-floating mb-3">
                                <input type="text" name="nominalModal" class="form-control" id="floatingInput" value="<?=$d['nominalModal']?>">
                                <label for="floatingInput">Nominal Modal</label>
                              </div>
                              <div class="form-floating mb-3">
                              <textarea name="keterangan" class="form-control" id="floatingInput" style="height:100px;"><?=$d['keterangan']?></textarea>
                                <label for="floatingInput">Keterangan</label>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Edit Modal</button>
                              </div>
                            </div>
                          </div>
                        </form>          
                      </div>
                    </div>
                  </div>
                  <!-- Modal Hapus -->
                  <div class="modal fade" id="hapus<?=$d['idKeuangan']?>" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Hapus Data</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                            <div class="modal-body">
                              <p>Apakah anda yakin menghapus data ini ? </p>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                <a href="<?=base_url()?>HapusKeuangan/<?=$d['idKeuangan']?>"><button type="submit" class="btn btn-primary">Iya</button></a>
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
                  <?php
                  $jumlahTransaksi = $jumlahTransaksi + $d['nominalModal'];
                  }
                  ?>
                </tbody>
              </table>
              <h3>Jumlah Transaksi : <?=rupiah($jumlahTransaksi);?></h1> 
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- Modal Tambah Akses -->
  <div class="modal fade" id="tambahAkses" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Modal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <form method="POST" action="<?=base_url()?>TambahModal" enctype="multipart/form-data">  
            <div class="modal-body">
              <div class="form-floating mb-3">
                <input type="date" name="tanggal" class="form-control" id="floatingInput" placeholder="Masukkan Nominal Modal">
                <label for="floatingInput">Tanggal</label>
              </div>
              <div class="form-floating mb-3">
                <input type="number" name="nominalModal" class="form-control" id="floatingInput" placeholder="Masukkan Nominal Modal">
                <label for="floatingInput">Nominal Modal</label>
              </div>
              <div class="form-floating mb-3">
                <textarea name="keterangan" class="form-control" id="floatingInput" style="height:100px;"></textarea>
                <label for="floatingInput">Keterangan</label>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Modal</button>
              </div>
            </div>
          </div>
        </form>          
      </div>
    </div>
  </div>
  <?php
  require('link/footer.php');
  ?>
