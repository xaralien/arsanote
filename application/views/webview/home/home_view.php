<section class="wrapper home">
  <div class="container">
    <div class="justify-content-start">
      <?php if ($this->session->userdata('user_logged_in')) : ?>
        <h1 class="allwork">Halo, <?php echo $this->session->userdata('name'); ?>!</h1>
        <p class="allwork">Semangat bekerja!!</p>
      <?php endif; ?>
    </div>
  </div>
  <?php if ($recently != null) { ?>
    <div class="allwork">
      <div class="container mt-5">
        <div class="d-flex justify-content-start">
          <p class="allwork text-dark">Recent</p>
        </div>
        <div class="row">
          <?php
          foreach ($recently as $r) {
          ?>
            <div class="col-sm-4">
              <a href="<?= base_url('board/allboard/' . $r->id) ?>">
                <div class="card">
                  <img src="<?= base_url('upload/workspace/' . $r->thumbnail) ?>" class="card-img-top img-fluid" alt="...">
                  <!-- <img src="<?php echo base_url() ?>assets/image/tabs-1.jpg" class="card-img-top img-fluid" alt="..."> -->
                  <div class="justify-content-start p-2">
                    <p class="my-0"><?= $r->title ?></p>
                    <!-- <?php
                          $description = $r->description;

                          if (strlen($description) > 95) {
                            $truncatedDescription = substr($description, 0, 95) . '...';
                          } else {
                            $truncatedDescription = $description;
                          }
                          ?>
                    <p class="my-0"><?= $truncatedDescription  ?></p> -->
                  </div>
                </div>
              </a>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  <?php
  }
  ?>
  <div class="allwork">
    <div class="container mt-5">
      <div class="d-flex justify-content-between">
        <p class="allwork text-dark">Workspace</p>
        <a href="<?= base_url('workspace') ?>">See All Project</a>
      </div>
      <div class="row">
        <?php
        foreach ($newest_workspace as $w) {
        ?>
          <div class="col-sm-4">
            <a href="<?= base_url('board/allboard/' . $w->id) ?>">
              <div class="card">
                <img src="<?= base_url('upload/workspace/' . $w->thumbnail) ?>" class="card-img-top img-fluid" alt="...">
                <!-- <img src="<?php echo base_url() ?>assets/image/tabs-1.jpg" class="card-img-top img-fluid" alt="..."> -->
                <div class="justify-content-start p-2">
                  <p class="my-0"><?= $w->title ?></p>
                  <!-- <?php
                        $description = $w->description;

                        if (strlen($description) > 95) {
                          $truncatedDescription = substr($description, 0, 95) . '...';
                        } else {
                          $truncatedDescription = $description;
                        }
                        ?>
                  <p class="my-0"><?= $truncatedDescription  ?></p> -->
                </div>
              </div>
            </a>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
</section>