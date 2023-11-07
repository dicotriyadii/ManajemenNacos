  <?php
  require('link/header.php');
  ?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Manajemen User</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url()?>Dashboard">Dashboard</a></li>
          <li class="breadcrumb-item active">Manajemen User</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data User</h5>
              <p>Manajemen User merupakan halaman untuk mengelola data User</p>
              <!-- Table with stripped rows -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahUser">Tambah User</button>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Hak Akses</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no=0;
                  foreach($dataUser as $d){
                  $no++;
                  ?>
                  <tr>
                    <th><?=$no;?></th>
                    <th><?=$d['username'];?></th>
                    <td><?=$d['nama'];?></td>
                    <td><?=$d['namaAkses'];?></td>
                    <td>
                      <a data-bs-toggle="modal" data-bs-target="#editUser<?=$d['userId']?>"><i class="bi bi-pencil" style="font-size:25px;color: gray"></i></a>
                      <a data-bs-toggle="modal" data-bs-target="#gantiPassword"><i class="bi bi-lock" style="font-size:25px;color: orange"></i></a>
                      <a href="<?=base_url()?>HapusUser/<?=$d['userId']?>"><i class="bi bi-person-x" style="font-size:30px;color: red"></i></a>
                    </td>
                  </tr>
                  <!-- Modal Edit User -->
                  <div class="modal fade" id="editUser" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Edit User</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                          <form method="POST" action="<?=base_url()?>EditUser<?=$d['userId']?>" enctype="multipart/form-data">  
                            <div class="modal-body">
                              <input type="text" name="userId" class="form-control" id="floatingInput" value="<?=$d['userId']?>" hidden>
                              <div class="form-floating mb-3">
                                <input type="text" name="username" class="form-control" id="floatingInput" value="<?=$d['username']?>">
                                <label for="floatingInput">Username</label>
                              </div>
                              <div class="form-floating mb-3">
                                <input type="text" name="nama" class="form-control" id="floatingInput" value="<?=$d['nama']?>">
                                <label for="floatingInput">Nama</label>
                              </div>
                              <div class="form-floating mb-3">
                                <select name="hakAkses" class="form-control">
                                  <option value="<?=$d['idAkses']?>"><?=$d['namaAkses']?></option>
                                  <?php
                                  foreach($dataHakAkses as $da){?>
                                  <option value="<?=$da['idAkses']?>"><?=$da['namaAkses']?></option>
                                  <?php
                                  }
                                  ?>
                                </select>
                                <label for="floatingInput">Hak Akses</label>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Edit User</button>
                              </div>
                            </div>
                          </div>
                        </form>          
                      </div>
                    </div>
                  </div>
                  <!-- Modal Ganti Password -->
                  <div class="modal fade" id="gantiPassword" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Ganti Password</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                          <form method="POST" action="<?=base_url()?>GantiPassword" enctype="multipart/form-data">  
                            <div class="modal-body">
                              <input type="text" name="userId" class="form-control" id="floatingInput" value="<?=$d['userId']?>" hidden>
                              <div class="form-floating mb-3">
                                <input type="password" name="passwordLama" class="form-control" id="floatingInput" placeholder="Masukkan Password Lama">
                                <label for="floatingInput">Password Lama</label>
                              </div>
                              <div class="form-floating mb-3">
                                <input type="password" name="passwordBaru" class="form-control" id="floatingInput" placeholder="Masukkan Password Baru">
                                <label for="floatingInput">Password Baru</label>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Ganti Password</button>
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
  <!-- Modal Tambah User -->
  <div class="modal fade" id="tambahUser" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <form method="POST" action="<?=base_url()?>TambahUser" enctype="multipart/form-data">  
            <div class="modal-body">
              <div class="form-floating mb-3">
                <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Masukkan Username">
                <label for="floatingInput">Username</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" name="nama" class="form-control" id="floatingInput" placeholder="Masukkan nama">
                <label for="floatingInput">Nama</label>
              </div>
              <div class="form-floating mb-3">
                <select name="hakAkses" class="form-control">
                  <option value="">- Pilih Hak Akses -</option>
                  <?php
                  foreach($dataHakAkses as $da){?>
                  <option value="<?=$da['idAkses']?>"><?=$da['namaAkses']?></option>
                  <?php
                  }
                  ?>
                </select>
                <label for="floatingInput">Hak Akses</label>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah User</button>
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
