<?php
  require('link/header.php');
  ?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Manajemen Menu</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url()?>Dashboard">Dashboard</a></li>
          <li class="breadcrumb-item active">Manajemen Menu</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Menu</h5>
              <p>Manajemen Menu merupakan halaman untuk mengelola menu yang ada baik itu menambah, merubah dan menghapus data menu</p>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahMenu">Tambah Menu</button>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Menu</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no=0;
                  foreach($dataMenu as $d){
                  $no++;
                  ?>
                  <tr>
                    <th><?=$no;?></th>
                    <th><?=$d['namaMenu'];?></th>
                    <th><?=$d['harga'];?></th>
                    <th><?=$d['stok'];?></th>
                    <td>
                      <a data-bs-toggle="modal" data-bs-target="#editMenu<?=$d['idMenu']?>"><i class="bi bi-pencil" style="font-size:25px;color: gray"></i></a>
                      <a href="<?=base_url()?>HapusMenu/<?=$d['idMenu']?>"><i class="bi bi-person-x" style="font-size:30px;color: red"></i></a>
                    </td>
                  </tr>
                  <!-- Modal Edit Menu -->
                  <div class="modal fade" id="editMenu<?=$d['idMenu']?>" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Edit Menu</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                          <form method="POST" action="<?=base_url()?>EditMenu" enctype="multipart/form-data">  
                            <div class="modal-body">
                              <input type="text" name="idMenu" class="form-control" id="floatingInput" value="<?=$d['idMenu']?>" hidden>
                              <div class="form-floating mb-3">
                                <input type="text" name="namaMenu" class="form-control" id="floatingInput" value="<?=$d['namaMenu']?>">
                                <label for="floatingInput">Menu</label>
                              </div>
                              <div class="form-floating mb-3">
                                <input type="text" name="harga" class="form-control" id="floatingInput" value="<?=$d['harga']?>">
                                <label for="floatingInput">Harga</label>
                              </div>
                              <div class="form-floating mb-3">
                                <input type="text" name="stok" class="form-control" id="floatingInput" value="<?=$d['stok']?>">
                                <label for="floatingInput">Stok</label>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Edit Menu</button>
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
  <div class="modal fade" id="tambahMenu" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Menu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <form method="POST" action="<?=base_url()?>TambahMenu" enctype="multipart/form-data">  
            <div class="modal-body">
              <div class="form-floating mb-3">
                <input type="text" name="namaMenu" class="form-control" id="floatingInput" placeholder="Masukkan Menu">
                <label for="floatingInput">Menu</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" name="harga" class="form-control" id="floatingInput" placeholder="Masukkan Menu">
                <label for="floatingInput">Harga</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" name="stok" class="form-control" id="floatingInput" placeholder="Masukkan Menu">
                <label for="floatingInput">Stok</label>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Menu</button>
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
