<div class="container mt-5">
    
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title"><?= $data['mhs']['nama']; ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?= $data['mhs']['nrp']; ?></h6>
        <p class="card-text"><?= $data['mhs']['email']; ?></p>
        <p class="card-text"><?= $data['mhs']['jurusan']; ?></p>
        <a href="<?= BASEURL; ?>/mahasiswa" class="card-link">Kembali</a>
      </div>
    </div>

    <h3>Matakuliah yang diambil</h3>

    <?php foreach( $data['dmk2'] as $dmk2 ) : ?>
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title"><?= $dmk2['nama_mk']; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted">Kode : <?= $dmk2['kode']; ?></h6>
            <p class="card-text">SKS -> <?= $dmk2['sks']; ?></p>
          </div>
        </div>
        <br>
    <?php endforeach; ?>
</div>