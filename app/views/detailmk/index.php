<div class="container mt-3">

    <div class="row">
      <div class="col-lg-6">
        <?php Flasher::flash(); ?>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-lg-6">
        <button type="button" class="btn btn-primary tombolTambahDataDMK" data-toggle="modal" data-target="#formModal">
          Tambah Data DetailMK
        </button>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-lg-6">
        <form action="<?= BASEURL; ?>/detailmk/cari" method="post">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="cari mahasiswa.." name="keyword" id="keyword" autocomplete="off">
            <div class="input-group-append">
              <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  
    <div class="row">
        <div class="col-lg-6">
          <h3>Daftar DetailMK</h3>

          <table class="table table-bordered">
            <thead class="table-light">
              <tr>
                <th scope="col">NRP</th>
                <th scope="col">Nama Mahasiswa</th>
                <th scope="col">Kode Matakuliah</th>
                <th scope="col">Nama Matakuliah</th>
                <th scope="col">SKS</th>
                <!-- <th scope="col">Action</th> -->
              </tr>
            </thead>
            <?php foreach( $data['dmk'] as $dmk ) : ?>
            <tbody>
              <td><?= $dmk['nrp']?></td>
              <td><?= $dmk['nama']?></td>
              <td><?= $dmk['kode']?></td>
              <td><?= $dmk['nama_mk']?></td>
              <td><?= $dmk['sks']?></td>
              <!-- <td>
                <a href="<?= BASEURL; ?>/detailmk/detail/<?= $dmk['id']; ?>" class="badge badge-primary float-right">detail</a>
              </td> -->
            </tbody>
            <?php endforeach; ?>
          </table>   
        </div>
    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Data DetailMK</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form action="<?= BASEURL; ?>/detailmk/tambah" method="post">
          <input type="hidden" name="id" id="id">

          <div class="form-group">
            <?php  
            $conn = mysqli_connect("localhost", "root", "", "phpmvc")
            ?>
            <label for="id_mk">Mata Kuliah</label>
            <select class="form-control" id="id_mk" name="id_mk">
            <option disabled selected> Pilih </option>
              <?php 
                $sql=mysqli_query($conn, "SELECT * FROM matakuliah");
                while ($data=mysqli_fetch_array($sql)) {
              ?>
              <option value="<?=$data['id']?>"><?=$data['nama_mk']?></option>
              <?php
              }
              ?>
            </select>
          </div>

          <div class="form-group">
            <label for="id_mhs">Mahasiswa</label>
            <select class="form-control" id="id_mhs" name="id_mhs">
            <option disabled selected> Pilih </option>
              <?php 
                $sql=mysqli_query($conn, "SELECT * FROM mahasiswa");
                while ($data=mysqli_fetch_array($sql)) {
              ?>
              <option value="<?=$data['id']?>"><?=$data['nrp']." - ".$data['nama']?></option>
              <?php
              }
              ?>
            </select>
          </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>




