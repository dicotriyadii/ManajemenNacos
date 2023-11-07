  <?php
  require('link/header.php');
  ?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Manajemen Master Status</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url()?>Dashboard">Dashboard</a></li>
          <li class="breadcrumb-item active">Manajemen Master Status</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Master Status</h5>
              <p>Manajemen Master Status merupakan halaman untuk mengelola data master Status</p>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahStatus">Tambah Status</button>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no=0;
                  foreach($dataStatus as $d){
                  $no++;
                  ?>
                  <tr>
                    <th><?=$no;?></th>
                    <th><?=$d['namaStatus'];?></th>
                    <td>
                      <a data-bs-toggle="modal" data-bs-target="#editStatus<?=$d['idStatus']?>"><i class="bi bi-pencil" style="font-size:25px;color: gray"></i></a>
                      <a href="<?=base_url()?>HapusStatus/<?=$d['idStatus']?>"><i class="bi bi-person-x" style="font-size:30px;color: red"></i></a>
                    </td>
                  </tr>
                  <!-- Modal Edit Status -->
                  <div class="modal fade" id="editStatus<?=$d['idStatus']?>" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Edit Status</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                          <form method="POST" action="<?=base_url()?>EditStatus" enctype="multipart/form-data">  
                            <div class="modal-body">
                              <input type="text" name="idStatus" class="form-control" id="floatingInput" value="<?=$d['idStatus']?>" hidden>
                              <div class="form-floating mb-3">
                                <input type="text" name="status" class="form-control" id="floatingInput" value="<?=$d['namaStatus']?>">
                                <label for="floatingInput">Status</label>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Edit Status</button>
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
  <!-- Modal Tambah Status -->
  <div class="modal fade" id="tambahStatus" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Status</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <form method="POST" action="<?=base_url()?>TambahStatus" enctype="multipart/form-data">  
            <div class="modal-body">
              <div class="form-floating mb-3">
                <input type="text" name="status" class="form-control" id="floatingInput" placeholder="Masukkan Status">
                <label for="floatingInput">Status</label>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Status</button>
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
