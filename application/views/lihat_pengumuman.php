<main id="main">
<section id="services" class="services">

  <div class="container" data-aos="fade-up">
    <header class="section-header">
        <p></p>
    </header>
    <?php foreach ($pengumuman as $png) : ?>
    <div class="card shadow p-3 mb-5 bg-white rounded">
      <div class="card-header">
        Pengumuman
      </div>
      <div class="card-body">
          <small><?= date("d F Y", strtotime($png->created_date)) ?></small>
          <h5 class="card-title mt-2"><?= $png->judul_pengumuman ?></h5>
          <p class="card-text"><?= $png->deskripsi_pengumuman ?></p>
          <?php if(substr($png->file_pengumuman, -3) == "pdf"): ?>
              <embed src="<?= base_url('/uploads/'.$png->file_pengumuman)?>" frameborder="0" width="100%" height="600px">
          <?php else: ?>
              <img src="<?= base_url('/uploads/'.$png->file_pengumuman)?>" frameborder="0" width="100%" height="auto">
          <?php endif; ?>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</section>
</main>

