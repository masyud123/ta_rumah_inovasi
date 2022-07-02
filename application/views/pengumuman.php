<main id="main">
<!-- ======= Team Section ======= -->
    
    <section id="team" class="team">

      <div class="container mt-5" data-aos="fade-up">

        <!-- ======= Services Section ======= -->
    <section id="services" class="services">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          
          <p>Pengumuman</p>
        </header>
        
        <div class="row gy-4">
          <?php foreach($pengumuman as $png) : ?>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-box blue">
              <i class="ri-information-line icon"></i>
              <h3><?php echo $png->judul_pengumuman ?></h3>
              <a href="<?php echo base_url('Pengumuman/lihat/' .$png->id_pengumuman) ?>" class="read-more">
                  <span>Baca Selengkapnya</span> 
                  <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
          <?php endforeach; ?>
        </div>


        
      </div>

    </section><!-- End Services Section -->

      </div>

    </section><!-- End Team Section -->
  </main>
