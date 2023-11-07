  <?php
  require('link/header.php');
  ?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Manajemen Master Akses</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url()?>Dashboard">Dashboard</a></li>
          <li class="breadcrumb-item active">Manajemen Master Akses</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12"> 

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Master Akses</h5>
              <p>Manajemen Master Akses merupakan halaman untuk mengelola data master akses</p>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahAkses">Tambah Akses</button>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Akses</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no=0;
                  foreach($dataAkses as $d){
                  $no++;
                  ?>
                  <tr>
                    <th><?=$no;?></th>
                    <th><?=$d['namaAkses'];?></th>
                    <td>
                      <a data-bs-toggle="modal" data-bs-target="#editAkses<?=$d['idAkses']?>"><i class="bi bi-pencil" style="font-size:25px;color: gray"></i></a>
                      <a href="<?=base_url()?>HapusAkses/<?=$d['idAkses']?>"><i class="bi bi-person-x" style="font-size:30px;color: red"></i></a>
                    </td>
                  </tr>
                  <!-- Modal Edit Akses -->
                  <div class="modal fade" id="editAkses<?=$d['idAkses']?>" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Edit Akses</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                          <form method="POST" action="<?=base_url()?>EditAkses" enctype="multipart/form-data">  
                            <div class="modal-body">
                              <input type="text" name="idAkses" class="form-control" id="floatingInput" value="<?=$d['idAkses']?>" hidden>
                              <div class="form-floating mb-3">
                                <input type="text" name="akses" class="form-control" id="floatingInput" value="<?=$d['namaAkses']?>">
                                <label for="floatingInput">Akses</label>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Edit Akses</button>
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
    <!-- Modal Tambah Akses -->
    <div class="modal fade" id="tambahAkses" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Akses</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <form method="POST" action="<?=base_url()?>TambahAkses" enctype="multipart/form-data">  
            <div class="modal-body">
              <div class="form-floating mb-3">
                <input type="text" name="akses" class="form-control" id="floatingInput" placeholder="Masukkan Akses">
                <label for="floatingInput">Akses</label>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Akses</button>
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
