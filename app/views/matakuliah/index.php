<div class="container mt-3">

    <div class="row">
      <div class="col-lg-6">
        <?php Flasher::flash(); ?>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-lg-6">
        <button type="button" class="btn btn-primary tombolTambahDataMK" data-toggle="modal" data-target="#formModal">
          Tambah Data Matakuliah
        </button>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-lg-6">
        <form action="<?= BASEURL; ?>/matakuliah/cari" method="post">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="cari matakuliah.." name="keyword" id="keyword" autocomplete="off">
            <div class="input-group-append">
              <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  
    <div class="row">
        <div class="col-lg-6">
          <h3>Daftar Matakuliah</h3>
          <ul class="list-group">
            <?php foreach( $data['mk'] as $mk ) : ?>
              <li class="list-group-item">
                  <?= $mk['nama_mk']; ?>
                  <a href="<?= BASEURL; ?>/matakuliah/hapus/<?= $mk['id']; ?>" class="badge badge-danger float-right" onclick="return confirm('yakin?');">hapus</a>
                  <a href="<?= BASEURL; ?>/matakuliah/ubah/<?= $mk['id']; ?>" class="badge badge-success float-right tampilModalUbahMK" data-toggle="modal" data-target="#formModal" data-id="<?= $mk['id']; ?>">ubah</a>
                  <a href="<?= BASEURL; ?>/matakuliah/detail/<?= $mk['id']; ?>" class="badge badge-primary float-right">detail</a>
              </li>
            <?php endforeach; ?>
          </ul>      
        </div>
    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Data Matakuliah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form action="<?= BASEURL; ?>/matakuliah/tambah" method="post">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label for="kode">Kode</label>
            <input type="text" class="form-control" id="kode" name="kode" autocomplete="off" required>
          </div>

          <div class="form-group">
            <label for="nama_mk">Nama MK</label>
            <input type="text" class="form-control" id="nama_mk" name="nama_mk" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="sks">SKS</label>
            <input type="number" class="form-control" id="sks" name="sks" autocomplete="off">
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




