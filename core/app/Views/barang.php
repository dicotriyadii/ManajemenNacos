  <?php
  require('link/header.php');
  ?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Manajemen Stok Barang</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url()?>Dashboard">Dashboard</a></li>
          <li class="breadcrumb-item active">Manajemen Stok Barang</li>
        </ol>
      </nav>
    </div><!-- End Page Title --> 

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Stok Barang</h5>
              <p>Manajemen stok barang merupakan halaman untuk mengelola stok barang yang ada baik itu menambah, merubah, dan menghapus data barang</p>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahBarang">Tambah Barang</button>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jenis Barang</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Harga Modal</th>
                    <th scope="col">Harga Jual</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no=0;
                  foreach($dataBarang as $d){
                  $no++;
                  ?>
                  <tr>
                    <th><?=$no;?></th>
                    <th><?=$d['namaBarang'];?></th>
                    <th><?=$d['namaJenisBarang'];?></th>
                    <th><?=$d['stok'];?></th>
                    <th><?=rupiah($d['hargaModal']);?></th>
                    <th><?=rupiah($d['hargaJual']);?></th>
                    <td>
                      <a data-bs-toggle="modal" data-bs-target="#editBarang<?=$d['idBarang']?>"><i class="bi bi-pencil" style="font-size:25px;color: gray"></i></a>
                      <a href="<?=base_url()?>HapusBarang/<?=$d['idBarang']?>"><i class="bi bi-person-x" style="font-size:30px;color: red"></i></a>
                    </td>
                  </tr>
                  <!-- Modal Edit Barang -->
                  <div class="modal fade" id="editBarang<?=$d['idBarang']?>" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Edit Barang</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                          <form method="POST" action="<?=base_url()?>EditBarang" enctype="multipart/form-data">  
                            <div class="modal-body">
                              <input type="text" name="idBarang" class="form-control" id="floatingInput" value="<?=$d['idBarang']?>" hidden>
                              <div class="form-floating mb-3">
                                <input type="text" name="namaBarang" class="form-control" id="floatingInput" value="<?=$d['namaBarang']?>">
                                <label for="floatingInput">Barang</label>
                              </div>
                              <div class="form-floating mb-3">
                                <select name="jenisBarang" class="form-control">
                                  <option value="<?=$d['idJenisBarang']?>"><?=$d['namaJenisBarang']?></option>
                                  <?php
                                  foreach($dataJenisBarang as $db){?>
                                  <option value="<?=$db['idJenisBarang']?>"><?=$db['namaJenisBarang']?></option>
                                  <?php
                                  }
                                  ?>
                                </select>
                                <label for="floatingInput">Jenis Barang</label>
                              </div>
                              <div class="form-floating mb-3">
                                <input type="text" name="stok" class="form-control" id="floatingInput" value="<?=$d['stok']?>">
                                <label for="floatingInput">Stok</label>
                              </div>
                              <div class="form-floating mb-3">
                                <input type="text" name="hargaJual" class="form-control" id="floatingInput" value="<?=$d['hargaJual']?>">
                                <label for="floatingInput">Harga</label>
                              </div>
                              <div class="form-floating mb-3">
                                <input type="text" name="hargaModal" class="form-control" id="floatingInput" value="<?=$d['hargaModal']?>">
                                <label for="floatingInput">Harga</label>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Edit Barang</button>
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
  <div class="modal fade" id="tambahBarang" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Barang</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <form method="POST" action="<?=base_url()?>TambahBarang" enctype="multipart/form-data">  
            <div class="modal-body">
              <div class="form-floating mb-3">
                <input type="text" name="namaBarang" class="form-control" id="floatingInput" placeholder="Masukkan Barang">
                <label for="floatingInput">Barang</label>
              </div>
              <div class="form-floating mb-3">
                <select name="jenisBarang" class="form-control">
                  <option value="">- Silahkan Pilih Jenis Barang -</option>
                  <?php
                  foreach($dataJenisBarang as $db){?>
                  <option value="<?=$db['idJenisBarang']?>"><?=$db['namaJenisBarang']?></option>
                  <?php
                  }
                  ?>
                </select>
                <label for="floatingInput">Jenis Barang</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" name="stok" class="form-control" id="floatingInput" placeholder="Masukkan Barang">
                <label for="floatingInput">Stok</label>
              </div>
              <div class="form-floating mb-3">
                <input type="number" name="hargaJual" class="form-control" id="floatingInput" placeholder="Masukkan Barang">
                <label for="floatingInput">Harga Jual</label>
              </div>
              <div class="form-floating mb-3">
                <input type="number" name="hargaModal" class="form-control" id="floatingInput" placeholder="Masukkan Barang">
                <label for="floatingInput">Harga Modal</label>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Barang</button>
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
