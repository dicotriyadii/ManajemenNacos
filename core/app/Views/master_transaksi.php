  <?php
  require('link/header.php');
  ?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Manajemen Master Transaksi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url()?>Dashboard">Dashboard</a></li>
          <li class="breadcrumb-item active">Manajemen Master Transaksi</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Master Transaksi</h5>
              <p>Manajemen Master Transaksi merupakan halaman untuk mengelola data master Transaksi</p>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahTransaksi">Tambah Transaksi</button>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Transaksi</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no=0;
                  foreach($dataTransaksi as $d){
                  $no++;
                  ?>
                  <tr>
                    <th><?=$no;?></th>
                    <th><?=$d['namaTransaksi'];?></th>
                    <td>
                      <a data-bs-toggle="modal" data-bs-target="#editTransaksi<?=$d['idTransaksi']?>"><i class="bi bi-pencil" style="font-size:25px;color: gray"></i></a>
                      <a href="<?=base_url()?>HapusTransaksi/<?=$d['idTransaksi']?>"><i class="bi bi-person-x" style="font-size:30px;color: red"></i></a>
                    </td>
                  </tr>
                  <!-- Modal Edit Transaksi -->
                  <div class="modal fade" id="editTransaksi<?=$d['idTransaksi']?>" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Edit Transaksi</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                          <form method="POST" action="<?=base_url()?>EditTransaksi" enctype="multipart/form-data">  
                            <div class="modal-body">
                              <input type="text" name="idTransaksi" class="form-control" id="floatingInput" value="<?=$d['idTransaksi']?>" hidden>
                              <div class="form-floating mb-3">
                                <input type="text" name="transaksi" class="form-control" id="floatingInput" value="<?=$d['namaTransaksi']?>">
                                <label for="floatingInput">Transaksi</label>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Edit Transaksi</button>
                              </div>
                            </div>
                          </div>
                        </form>          
                      </div>
                    </div>
                  </div>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
  </main><!-- End #main -->
  <!-- Modal Tambah Transaksi -->
  <div class="modal fade" id="tambahTransaksi" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Transaksi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <form method="POST" action="<?=base_url()?>TambahTransaksi" enctype="multipart/form-data">  
            <div class="modal-body">
              <div class="form-floating mb-3">
                <input type="text" name="transaksi" class="form-control" id="floatingInput" placeholder="Masukkan Transaksi">
                <label for="floatingInput">Transaksi</label>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Transaksi</button>
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
