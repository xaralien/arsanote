  <section class="galeryhead text-center">
      <div class="wrapper-body">
          <div class="card-live">
              <div class="row">
                  <div class="col-md-8 col-sm-12">
                      <img class="img-fluid wrapper-image" src="<?php echo base_url() ?>assets/image/portfolio/portfolio-2.jpg" alt="">
                  </div>
                  <div class="col-md-4 col-sm-12 text-start wrapper-title">
                      <h2 class="judulacara text-start">Acara hari ini</h2>
                      <p class="text-start">Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi
                          rerum ut vero! Nemo culpa, vel eum
                          eveniet ratione, voluptas ullam itaque possimus neque asperiores quisquam in laboriosam?
                          Deserunt,
                          facere natus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio,
                          necessitatibus. Quam repellendus molestias fugiat recusandae qui, quibusdam voluptatibus aliquam
                          maiores, odio minus architecto ipsam vel, deleniti deserunt illum veniam in.</p>


                      <div class="d-flex align-items-center justify-content-center">
                          <div class="col-lg-12 d-grid">
                              <a href="#about" class="btn btn-primary">Watch now</a>
                          </div>


                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <section class="container-fluid">
      <div class="wrapper-body">
          <div class="row height d-flex justify-content-center align-items-center">

              <div class="col-md-12">

                  <div class="form" id="st">
                      <i class="bi bi-search"></i>
                      <?php if ($this->uri->segment(2) == 'search'){?>
                        <input type="text" class="form-control form-input" id="search" value="<?php echo $this->input->get('st')?>">
                      <?php }else{?>
                        <input type="text" class="form-control form-input" id="search" placeholder="Search anything...">
                      <?php } ?>
                      <span class="left-pan"><i class="fa fa-microphone"></i></span>
                  </div>

              </div>

          </div>
      </div>
      </div>

  </section>

  <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

          <div class="row" data-aos="fade-up" data-aos-delay="100">
              <div class="col-lg-12 d-flex justify-content-center">
                  <ul id="portfolio-flters">
                      <!-- <li data-filter="*" class="filter-active" data-value="all">All</li> -->
                      <input type="button" value="all" id="type0"/> 

                      <?php $i=1; foreach ($type_gallery as $tipe) { ?>
                 
       
                          <input type="button" value="<?php echo $tipe->name ?>" id="type<?php echo $i; ?>"/> 

                      <?php $i++; } ?>
                      <!-- <li data-filter=".filter-app">App</li>
                      <li data-filter=".filter-card">Card</li>
                      <li data-filter=".filter-web">Web</li> -->
                  </ul>
              </div>
          </div>

          <div class="section-title">
              <h2 class="text-center">Gallery</h2>
              <p class="text-center">Check our Portfolio</p>
              <p class="text-center">lorem jsdssk</p>
          </div>

          <div class="gallery">
            <?php foreach($getFile as $gf) { ?>
                <?php if ($gf->type_file == 'jpeg' || $gf->type_file == 'jpg' || $gf->type_file == 'png') {?>
              <div class="gallery-item">
                  <figure>
                      <img src="../../../../uploadFile_alumni/<?php echo $gf->file ?>" class="img-fluid" alt="" />
                      <figcaption><?php echo $gf->title ?></figcaption>
                  </figure>
              </div>
              <?php }else if ($gf->type_file == 'mp4' || $gf->type_file == 'mkv' || $gf->type_file == '3gp'){ ?>
                <div class="gallery-item">
                  <figure>
                        <video width="410" height="270" controls>
                        <source src="../../../../uploadFile_alumni/<?php echo $gf->file ?>" type="video/mp4">
                        Your browser does not support the video tag.
                        </video> 
                      <figcaption><?php echo $gf->title ?></figcaption>
                  </figure>
              </div>
              <?php }else{ ?>
                <div class="gallery-item">
                  <figure>
                    <iframe src="<?php echo $gf->link ?>" allowfullscreen></iframe>
                    <figcaption><?php echo $gf->title ?></figcaption>
                   </figure>
              </div>
              <?php } } ?>
          </div>
      </div>
            <div class="row">
                 <div class="col">

                     <?php echo $pagination; ?>
                 </div>
             </div>
  </section>