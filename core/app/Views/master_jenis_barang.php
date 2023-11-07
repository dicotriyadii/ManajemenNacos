  <?php
  require('link/header.php');
  ?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Manajemen Master Jenis Barang</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url()?>Dashboard">Dashboard</a></li>
          <li class="breadcrumb-item active">Manajemen Master Jenis Barang</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Master Jenis Barang</h5>
              <p>Manajemen Master Jenis Barang merupakan halaman untuk mengelola data master Jenis Barang</p>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahJenisBarang">Tambah Jenis Barang</button>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Jenis Barang</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no=0;
                  foreach($dataJenisBarang as $d){
                  $no++;
                  ?>
                  <tr>
                    <th><?=$no;?></th>
                    <th><?=$d['namaJenisBarang'];?></th>
                    <td>
                      <a data-bs-toggle="modal" data-bs-target="#editJenisBarang<?=$d['idJenisBarang']?>"><i class="bi bi-pencil" style="font-size:25px;color: gray"></i></a>
                      <a href="<?=base_url()?>HapusJenisBarang/<?=$d['idJenisBarang']?>"><i class="bi bi-person-x" style="font-size:30px;color: red"></i></a>
                    </td>
                  </tr>
                  <!-- Modal Edit Jenis Barang -->
                  <div class="modal fade" id="editJenisBarang<?=$d['idJenisBarang']?>" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Edit Jenis Barang</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                          <form method="POST" action="<?=base_url()?>EditJenisBarang" enctype="multipart/form-data">  
                            <div class="modal-body">
                              <input type="text" name="idJenisBarang" class="form-control" id="floatingInput" value="<?=$d['idJenisBarang']?>" hidden>
                              <div class="form-floating mb-3">
                                <input type="text" name="jenisBarang" class="form-control" id="floatingInput" value="<?=$d['namaJenisBarang']?>">
                                <label for="floatingInput">Jenis Barang</label>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Edit Jenis Barang</button>
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
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- Modal Tambah Jenis Barang -->
  <div class="modal fade" id="tambahJenisBarang" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Jenis Barang</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <form method="POST" action="<?=base_url()?>TambahJenisBarang" enctype="multipart/form-data">  
            <div class="modal-body">
              <div class="form-floating mb-3">
                <input type="text" name="jenisBarang" class="form-control" id="floatingInput" placeholder="Masukkan Jenis Barang">
                <label for="floatingInput">Jenis Barang</label>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Jenis Barang</button>
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
